<?php
require_once '../Includes/config.php';
Head(2, "Schade");
echo "<a class='nieuw_link' href='schade_nieuw.php'>Nieuw schaderapport</a>";
echo "<table class='table table-striped table-sm'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
echo "<th scope='col'> ID </th>";
echo "<th scope='col'> Vaartuig </th>";
echo "<th scope='col'> Schipper </th>";
echo "<th scope='col'> Opmerking </th>";
echo "<th scope='col'> Datum </th>";
if (CheckRank($admin)) {
    echo "<th scope='col'> Aangemaakt </th>";
}
if (CheckRank($schipper)) {
    echo "<th scope='col'> Aanpassen </th>";
}
if (CheckRank($admin)) {
    echo "<th scope='col'> Verwijderen </th>";
}
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$stmt = SelectAll("schade", "ID", "DESC");
while ($row = $stmt->fetch()) {
    echo '<tr>';
    echo '<td>' . $row['ID'] . '</td>';
    echo '<td>' . $row['vaartuig'] . '</td>';
    echo '<td>' . $row['Schipper'] . '</td>';
    echo '<td>' . $row['Opmerking'] . '</td>';
    echo '<td>' . $row['Datum'] . '</td>';
    if (CheckRank($admin)) {
        echo "<td>" . CreatedBy($row['Created_by']) . "</td>";
    }
    if (CheckRank($schipper)) {
        echo '<td><a href="schade_bewerk.php?ID=' . $row['ID'] . '"><i class="far fa-edit"></a></td>';
    }
    if (CheckRank($admin)) {
        echo '<td><a href="schade_verwijder.php?ID=' . $row['ID'] . '"><i class="far fa-trash-alt"></a></td>';
    }
    echo '</tr>';
}
echo "</tbody>";
echo '</table>';
?>
</body>

</html>
