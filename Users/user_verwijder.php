<?php
require_once '../Includes/config.php';
Head(4, "Gebruiker verwijderen");

echo "<h4>Gebruiker verwijderen?</h4>";
echo "<table class='table table-striped table-sm'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
echo "<th scope='col'> ID </th>";
echo "<th scope='col'> Gebruikersnaam </th>";
echo "<th scope='col'> Voornaam </th>";
echo "<th scope='col'> Achternaam </th>";
echo "<th scope='col'> Wachtwoord </th>";
echo "<th scope='col'> Positie </th>";
echo "<th scope='col'> Rang </th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$ID   = $_GET['ID'];
$stmt = SelectWhere("users", "ID", $ID);
$row  = $stmt->fetch();
echo "<tr>";
echo "<td>" . $row["ID"] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['lastname'] . "</td>";
if (CheckRank($admin)) {
    echo "<td>" . $row['password'] . "</td>";
} else {
    echo "<td> Wachtwoord </td>";

}
switch ($row['schipper']) {
    case ($row['schipper'] = 0): echo "<td> Opstapper </td>";
        break;
    case ($row['schipper'] = 1): echo "<td> Dordrecht 0.18 </td>";
        break;
    case ($row['schipper'] = 2): echo "<td> Dordrecht 0.19 & 1.29</td>";
        break;
    case ($row['schipper'] = 3): echo "<td> Dordrecht 1.19 & 1.39 </td>";
        break;
    case ($row['schipper'] = 4): echo "<td> Dordrecht 1.49 </td>";
        break;
    default:echo "<td> Geen positie gevonden </td>";
        break;
}
echo "<td>" . $row['rang'] . "</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo "<a href='./user_verwijder_verwerk.php?ID=" . $row['ID'] . "' class='btn btn-primary'>Verwijderen</a>";
?>
</body>

</html>