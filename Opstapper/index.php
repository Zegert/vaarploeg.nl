<?php
require_once '../Includes/config.php';
Head(3, "Opstapper");
if (CheckRank($cbh)) {
    echo "<a class='nieuw_link' href='../Users/user_nieuw.php'>Nieuwe opstapper</a>";
}
echo "<table class='table table-striped table-sm'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
if (CheckRank($admin)) {
    echo "<th scope='col'> ID </th>";
}
echo "<th scope='col'> Gebruikersnaam </th>";
echo "<th scope='col'> Voornaam </th>";
echo "<th scope='col'> Achternaam </th>";
echo "<th scope='col'> Positie </th>";
if (CheckRank($cbh)) {
    echo "<th scope='col'> Aanpassen </th>";
}
if (CheckRank($admin)) {
    echo "<th scope='col'> Verwijderen </th>";
}
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$stmt = SelectWhere("users", "schipper", 0);
while ($row = $stmt->fetch()) {
    echo "<tr>";
    if (CheckRank($admin)) {
        echo "<td>" . $row['ID'] . "</td>";
    }
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td> Opstapper </td>";
    if (CheckRank($cbh)) {
        echo '<td><a href="../Users/user_bewerk.php?ID=' . $row['ID'] . '"><i class="far fa-edit"></i></a></td>';
    }
    if (CheckRank($admin)) {
        echo '<td><a href="../Users/user_verwijder.php?ID=' . $row['ID'] . '"><i class="far fa-trash-alt"></i></a></td>';
    }
    echo "</tr>";
}
echo "</tbody";
echo "</table>";
?>
</body>

</html>