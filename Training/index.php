<?php
require_once '../Includes/config.php';
Head($opstapper, "Trainingen");
echo "<a class='nieuw_link' href='./training_nieuw.php'>Nieuwe training</a>";
echo "<table class='table table-striped table-sm'>";
echo "<thead class='thead-dark'>";

if (CheckRank($admin)) {
    echo "<th scope='col'> ID </th>";
}
echo "<th scope='col'> Datum </th>";
echo "<th scope='col'> Trainer </th>";
echo "<th scope='col'> Schippers </th>";
echo "<th scope='col'> Opstappers </th>";
echo "<th scope='col'> Bijzonderheden </th>";
if (CheckRank($admin)) {
    echo "<th scope='col'> Gemaakt </th>";
}
if (CheckRank($schipper)) {
    echo "<th scope='col'> Aanpassen </th>";
}
if (CheckRank($admin)) {
    echo "<th scope='col'> Verwijderen </th>";
}
echo "</thead>";
echo "<tbody>";
$stmt = SelectAll("training", "ID", "DESC");
while ($row = $stmt->fetch()) {
    echo "<tr>";
    if (CheckRank($admin)) {
        echo "<td>" . $row['ID'] . "</td>";
    }
    echo "<td>" . $row['Datum'] . "</td>";
    echo "<td>" . $row['trainer'] . "</td>";
    echo "<td>" . $row['schippers'] . "</td>";
    echo "<td>" . $row['opstappers'] . "</td>";
    echo "<td>" . $row['Opmerking'] . "</td>";
    if (CheckRank($admin)) {
        echo "<td>" . CreatedBy($row['Created_by']) . "</td>";
    }
    if (CheckRank($schipper)) {
        echo '<td><a href="training_bewerk.php?ID=' . $row['ID'] . '"><i class="far fa-edit"></a></td>';
    }
    if (CheckRank($admin)) {
        echo '<td><a href="training_verwijder.php?ID=' . $row['ID'] . '"><i class="far fa-trash-alt"></i></a></td>';
    }
    echo "</tr>";
}
echo "</table>";
?>
</body>

</html>