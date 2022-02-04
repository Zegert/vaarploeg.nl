<?php
require '../Includes/config.php';
Head($schipper, "Schipper");

if (CheckRank($cbh)) {
    echo "<a class='nieuw_link' href='../Users/user_nieuw.php'>Nieuwe schipper</a>";
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
$stmt = SelectWhereBigger("users", "schipper", 0);
while ($row = $stmt->fetch()) {
    echo "<tr>";
    if (CheckRank($admin)) {
        echo "<td>" . $row['ID'] . "</td>";
    }
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['firstname'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    switch ($row['schipper']) {
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
        default:echo "<td> Opstapper </td>";
            break;
    }
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
