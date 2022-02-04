<?php
require_once '../Includes/config.php';
Head($cbh, "Gebruikers");

echo "<a class='nieuw_link' href='user_nieuw.php'>Nieuwe gebruiker</a>";
echo "<table class='table table-striped table-sm'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
if (CheckRank($admin)) {
    echo "<th scope='col'> ID </th>";
}
echo "<th scope='col'> Gebruikersnaam </th>";
echo "<th scope='col'> Voornaam </th>";
echo "<th scope='col'> Achternaam </th>";
echo "<th scope='col'> Wachtwoord </th>";
echo "<th scope='col'> Positie </th>";
echo "<th scope='col'> Rang </th>";
if (CheckRank($cbh)) {
    echo "<th> Aanpassen </th>";
}
if (CheckRank($cbh)) {
    echo "<th> Verwijderen </th>";
}
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$stmt = SelectAll("users", "rang");
while ($row = $stmt->fetch()) {
    echo "<tr>";
    if (CheckRank($admin)) {
        echo "<td>" . $row['ID'] . "</td>";
    }
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
        case ($row['schipper'] = 5): echo "<td> Admin </td>";
            break;
        default:echo "<td> Geen Positie </td>";
            break;
    }
    switch ($row['rang']) {
        case ($row['rang'] = 1): echo "<td> Opstapper </td>";
            break;
        case ($row['rang'] = 2): echo "<td> Onderhoudscommisie </td>";
            break;
        case ($row['rang'] = 3): echo "<td> Schipper </td>";
            break;
        case ($row['rang'] = 4): echo "<td> CBH-lid </td>";
            break;
        case ($row['rang'] = 5): echo "<td> Admin </td>";
            break;
        default:echo "<td> Account gedeactiveerd </td>";
            break;
    }
    if (CheckRank($cbh)) {
        echo '<td><a href="user_bewerk.php?ID=' . $row['ID'] . '"><i class="far fa-edit"></i></a></td>';
    }
    if (CheckRank($cbh)) {
        echo '<td><a href="user_verwijder.php?ID=' . $row['ID'] . '"><i class="far fa-trash-alt"></i></a></td>';
    }
    echo "</tr>";
}
echo "</table>";
?>
</body>

</html>