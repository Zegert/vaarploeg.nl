<?php

$admin     = 5;
$cbh       = 4;
$schipper  = 3;
$onderhoud = 2;
$opstapper = 1;

function Session()
{
    session_start();
    session_regenerate_id();
    if (isset($_SESSION['Rank'])) {
        return $_SESSION['Rank'];
    } else {
        return 0;
    }
}

function ID()
{
    session_start();
    session_regenerate_id();
    return $_SESSION['ID'];
}
// Check if current user has the correct rank, if not set them back to the inlog page
function CheckRank($rank)
{
    // check functionality
    if (Session($rank)) {
        return false;
        // echo "Uitloggen";
    } else {
        return true;

    }
}

function CheckRankNav($rank, $showItem)
{
    if (Session($rank)) {
        $showItem;
    }
}

function SQLInjectionFormat($string)
{
    $formatted_string = preg_replace('~[\\\\/:*?"<>|]~', ' ', $string);
    return $formatted_string;
}

function CreatedBy($ID)
{
    if ($ID == null || $ID == 0) {
        $name = "Onbekend";
    } else {
        $user = SelectWhere("users", "ID", $ID)->fetch();
        $name = $user['firstname'] . " " . $user['lastname'];
    }
    return $name;
}

function Conn()
{
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    $dsn         = "mysql:host=DB_hose;dbname=DB_name";
    $DB_username = "DB_username";
    $DB_password = "DB_password";

    try {
        $conn = new PDO($dsn, $DB_username, $DB_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOExeption $e) {
        $error = "Geen connectie mogelijk. Error: " . $e->getMessage();
        return $error;}
}

function SelectAll($tablename, $orderitem, $AscDesc = "ASC")
{
    $stmt = Conn()->prepare("SELECT * FROM $tablename ORDER BY $orderitem $AscDesc");
    $stmt->execute();
    return $stmt;
}

function SelectWhere($tablename, $searchfield, $searchitem, $AscDesc = "ASC")
{
    $stmt = Conn()->prepare("SELECT * FROM $tablename WHERE $searchfield=? ORDER BY $searchfield $AscDesc");
    $stmt->execute([$searchitem]);
    return $stmt;
}

function SelectWhereBigger($tablename, $searchfield, $searchitem, $AscDesc = "ASC")
{
    $stmt = Conn()->prepare("SELECT * FROM $tablename WHERE $searchfield > ? ORDER BY $searchfield $AscDesc");
    $stmt->execute([$searchitem]);
    return $stmt;
}

function SelectWhereSmaller($tablename, $searchfield, $searchitem, $AscDesc = "ASC")
{
    $stmt = Conn()->prepare("SELECT * FROM $tablename WHERE $searchfield < ? ORDER BY $searchfield $AscDesc");
    $stmt->execute([$searchitem]);
    return $stmt;
}

// Adds a schipper or opstapper
function InsertSchipperOpstapper($tablename, $firstname, $lastname)
{
    $stmt = Conn()->prepare("INSERT INTO $tablename(`ID`, `Voornaam`, `Achternaam`) VALUES ( ?, ?, ?)");
    $stmt->execute([null, $firstname, $lastname]);
}

// Updates schipper account
function UpdateSchipperOpstapper($tablename, $firstname, $lastname, $updateID)
{
    try {
        $stmt = Conn()->prepare("UPDATE $tablename SET Voornaam=?, Achternaam=? WHERE ID = ?");
        $stmt->execute([$firstname, $lastname, $updateID]);
        $UpdateSchipperOpstapper = true;
        return $UpdateSchipperOpstapper;
    } catch (PDOException $UpdateSchipperOpstapper) {
        return $UpdateSchipperOpstapper;
    }
}

function InsertAccount($username, $firstname, $lastname, $password, $rank, $schipper)
{
    $username_clean  = SQLInjectionFormat($username);
    $firstname_clean = SQLInjectionFormat($firstname);
    $lastname_clean  = SQLInjectionFormat($lastname);
    if ($schipper = 0) {
        $stmt = Conn()->prepare("INSERT INTO users(ID, username, firstname, lastname, password, rang, schipper) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([null, $username_clean, $firstname_clean, $lastname_clean, $password_hashed, $rank, null]);
    } else {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt            = Conn()->prepare("INSERT INTO users(ID, username, firstname, lastname, password, rang, schipper) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([null, $username_clean, $firstname_clean, $lastname_clean, $password_hashed, $rank, $schipper]);
    }
}

// Updates a useraccount
function UpdateAccount($ID, $username, $firstname, $lastname, $password, $rank, $schipper)
{
    $username_clean  = SQLInjectionFormat($username);
    $firstname_clean = SQLInjectionFormat($firstname);
    $lastname_clean  = SQLInjectionFormat($lastname);
    if (CheckRank($admin)) {
        try {
            $stmt = Conn()->prepare("UPDATE users SET ID=?,username=?,firstname=?,lastname=?,rang=?,schipper=? WHERE ID=?");
            $stmt->execute([$ID, $username_clean, $firstname_clean, $lastname_clean, $rank, $schipper, $ID]);
            $updateAccount = true;
        } catch (PDOEXception $e) {
            $updateAccount = $e;
        }
    } else {
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = Conn()->prepare("UPDATE users SET ID=?,username=?,firstname=?,lastname=?,password=?,rang=?,schipper=? WHERE ID=?");
            $stmt->execute([$ID, $username, $firstname, $lastname, $password_hashed, $rank, $schipper, $ID]);
            $updateAccount = true;
        } catch (PDOEXception $e) {
            $updateAccount = $e;
        }
    }
    return $updateAccount;
}

// Inserts a vaarrapport into the database
function InsertVaarrapport($Schippers, $Opstappers, $Vaartuig, $Verbruik, $Urenstand, $Opmerking)
{
    $Datum              = date("d-m-Y");
    $Schippers          = implode(", ", $Schippers);
    $Opstappers         = implode(", ", $Opstappers);
    $CreatedBy          = ID();
    $OpmerkingFormatted = SQLInjectionFormat($Opmerking);
    $stmt               = Conn()->prepare("INSERT INTO vaarrapporten(ID, Datum, Schipper, Opstappers, Vaartuig, Verbruik, Urenstand, Opmerking, Created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([null, $Datum, $Schippers, $Opstappers, $Vaartuig, $Verbruik, $Urenstand, $OpmerkingFormatted, $CreatedBy]);
    $insertVaarrapport = true;
    return $insertVaarrapport;
}

function UpdateVaarrapport($ID, $Datum, $Schippers, $Opstappers, $Vaartuig, $Verbruik, $Urenstand, $Opmerking)
{
    $Schipper           = implode(', ', $Schippers);
    $Opstapper          = implode(', ', $Opstappers);
    $OpmerkingFormatted = SQLInjectionFormat($Opmerking);
    $UserID             = ID();
    $stmt               = Conn()->prepare("UPDATE vaarrapporten SET ID= ?, Datum= ?, Schipper= ?, Opstappers= ?, Vaartuig= ?, Verbruik= ?, Urenstand= ?, Opmerking=?, Created_by=? WHERE ID = ?");
    $stmt->execute([$ID, $Datum, $Schipper, $Opstapper, $Vaartuig, $Verbruik, $Urenstand, $OpmerkingFormatted, $UserID, $ID]);
    $updateVaarrapport = true;
    return $updateVaarrapport;
}

function InsertTraining($Trainer, $Schippers, $Opstappers, $Opmerking)
{
    $Datum              = date("d-m-Y");
    $Schipper           = implode(', ', $Schippers);
    $Opstapper          = implode(', ', $Opstappers);
    $OpmerkingFormatted = SQLInjectionFormat($Opmerking);
    $CreatedBy          = ID();
    $stmt               = Conn()->prepare("INSERT INTO training(ID, Datum, trainer, schippers, opstappers, Opmerking, Created_by) VALUES (?,?,?,?,?,?,?)");
    $stmt->execute([null, $Datum, $Trainer, $Schipper, $Opstapper, $OpmerkingFormatted, $CreatedBy]);
}

function UpdateTraining($ID, $Datum, $Trainer, $Schippers, $Opstappers, $Opmerking)
{
    $Schipper           = implode(', ', $Schippers);
    $Opstapper          = implode(', ', $Opstappers);
    $OpmerkingFormatted = SQLInjectionFormat($Opmerking);
    $CreatedBy          = ID();
    $stmt               = Conn()->prepare("UPDATE training SET ID=?,Datum=?,trainer=?,schippers=?,opstappers=?,Opmerking=?,Created_by=? WHERE ID=?");
    $stmt->execute([$ID, $Datum, $Trainer, $Schipper, $Opstapper, $OpmerkingFormatted, ID(), $ID]);
}

function InsertSchade($Vaartuig, $Schippers, $Opmerking)
{
    $Schipper           = implode(', ', $Schippers);
    $Datum              = date("d-m-Y");
    $OpmerkingFormatted = SQLInjectionFormat($Opmerking);
    $ID                 = ID();
    $stmt               = Conn()->prepare("INSERT INTO schade(ID, vaartuig, Schipper, Opmerking, Datum, Created_by) VALUES (?,?,?,?,?,?)");
    $stmt->execute([null, $Vaartuig, $Schipper, $OpmerkingFormatted, $Datum, $ID]);

    $to      = 'zboele@rbdordrecht.nl';
    $from    = 'From: Schaderapporten DRB';
    $subject = 'Nieuw schaderapport';
    $message = "Schipper: " . $Schipper . " Met vaartuig: " . $Vaartuig . " Met als opmerking: " . $OpmerkingFormatted . " Op: " . $Datum;
    mail($to, $subject, $message, $from);

}
function UpdateSchade($ID, $Vaartuig, $Schippers, $Opmerking, $Datum)
{
    $Schipper           = implode(', ', $Schippers);
    $OpmerkingFormatted = SQLInjectionFormat($Opmerking);
    $stmt               = Conn()->prepare("UPDATE schade SET ID=?,vaartuig=?,Schipper=?,Opmerking=?,Datum=?,Created_by=? WHERE ID=?");
    $stmt->execute([$ID, $Vaartuig, $Schipper, $OpmerkingFormatted, $Datum, ID(), $ID]);
}

// Deletes a item from the database
function DeleteItem($tablename, $orderitem, $deleteID)
{
    $stmt = Conn()->prepare("DELETE FROM $tablename WHERE $orderitem = ?");
    $stmt->execute([$deleteID]);
}

function Nav()
{
    // echo "<nav>";
    echo "<ul class='nav nav-pills nav-fill'>";
    echo "<li class='nav-item'><a class='nav-link' href='http://192.168.2.12/drb/DRB-LOG/home.php'>Vaarploeg.nl</a></li>";
    echo "<li class='nav-item'><a class='nav-link' href='http://192.168.2.12/drb/DRB-LOG/Account/'>Account</a></li>";
    if (CheckRank($admin)) {
        echo "<li class='nav-item'><a class='nav-link' href='http://192.168.2.12/drb/DRB-LOG/Users/'>Gebruikers</a></li>";
    }
    if (CheckRank($onderhoud)) {
        echo "<li class='nav-item'><a class='nav-link' href='http://192.168.2.12/drb/DRB-LOG/Schade/'>Schaderapporten<a/></li>";
    }
    if (CheckRank($schipper)) {
        echo "<li class='nav-item'><a class='nav-link' href='http://192.168.2.12/drb/DRB-LOG/Schipper/'>Schippers</a></li>";
        echo "<li class='nav-item'><a class='nav-link' href='http://192.168.2.12/drb/DRB-LOG/Opstapper/'>Opstappers</a></li>";
    }
    echo "<li class='nav-item'><a class='nav-link' href='http://192.168.2.12/drb/DRB-LOG/Vaarrapporten/'>Vaarrapporten</a></li>";
    echo "<li class='nav-item'><a class='nav-link' href='http://192.168.2.12/drb/DRB-LOG/Training/'>Trainingen</a></li>";
    echo "<li class='nav-item'><a class='nav-link' href='http://192.168.2.12/drb/DRB-LOG/uitlog.php'>Uitloggen</a></li>";
    echo "</ul>";
    // echo "</nav>";
}

function Head($rank, $title)
{
    CheckRank($rank);
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<meta http-equiv='X-UA-Compatible' content='ie=edge'>";
    echo "<title>" . $title . " || DRB vaarploeg log</title>";
    echo "<link rel='icon' href='http://192.168.2.12/drb/DRB-LOG/IMG/favicon.ico' type='image/x-icon' />";
    echo "<script src='https://kit.fontawesome.com/5acde6ec8d.js' crossorigin='anonymous'></script>";
    echo "<link href='https://bootswatch.com/4/lux/bootstrap.min.css' rel='stylesheet'>";
    echo "<link rel='stylesheet' type='text/css' href='http://192.168.2.12/drb/DRB-LOG/Includes/home.css'>";
    echo "<link rel='stylesheet' type='text/css' href='http://192.168.2.12/drb/DRB-LOG/Includes/style_nav.css'>";
    echo "</head>";
    echo "<body>";
    Nav();
}
