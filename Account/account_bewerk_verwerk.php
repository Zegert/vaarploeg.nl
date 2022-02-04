<?php
require_once '../Includes/config.php';
Head($opstapper, "Account update");
$ID       = ID();
$rank     = Session();
$schipper = $_SESSION['schipper'];
try {

    UpdateAccount($ID, $_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['password'], $rank, $schipper);
    header("Location:./index.php");
} catch (PDOExeption $e) {
    echo "Account kon niet geupdate worden. Error:" . $e->getMessage();
}