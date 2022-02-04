<?php
require_once '../Includes/config.php';
Head(1, "Account");

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
echo "<th scope='col'> Aanpassen </th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$ID     = ID();
$result = SelectWhere("users", "ID", $ID);
$row    = $result->fetch();
echo "<tr>";
echo "<td>" . $row["ID"] . "</td>";
echo "<td>" . $row['username'] . "</td>";
echo "<td>" . $row['firstname'] . "</td>";
echo "<td>" . $row['lastname'] . "</td>";
echo "<td>" . $row['password'] . "</td>";
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

switch ($row['rang']) {
    case ($row['rang'] = 1): echo "<td> Opstapper </td>";
        break;
    case ($row['rang'] = 2): echo "<td> Onderhoudscommissie </td>";
        break;
    case ($row['rang'] = 3): echo "<td> Schipper</td>";
        break;
    case ($row['rang'] = 4): echo "<td> CBH-lid </td>";
        break;
    case ($row['rang'] = 5): echo "<td> Admin </td>";
        break;
    default:echo "<td> Account gedeactiveerd </td>";
        break;
}
echo '<td><a href="account_bewerk.php"><i class="far fa-edit"></i></a></td>';
echo "</tr>";
echo "</tbody>";
echo "</table>";
?>
</body>

</html>