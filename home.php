<?php
require_once "./Includes/config.php";
Head(1, "Home");

echo "<table class='table table-striped table-sm'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
if (CheckRank($admin)) {
    echo "<th scope='col'> ID </th>";
}
echo "<th scope='col'> Datum </th>";
echo "<th scope='col'> Schipper </th>";
echo "<th scope='col'> Opstappers </th>";
echo "<th scope='col'> Vaartuig </th>";
echo "<th scope='col'> Verbruik </th>";
echo "<th scope='col'> Urenstand </th>";
echo "<th scope='col'> Bijzonderheden </th>";
if (CheckRank($admin)) {
    echo "<th scope='col'> Aangemaakt </th>";
}
if (CheckRank($admin)) {
    echo "<th scope='col'> Aanpassen </th>";
}
if (CheckRank($admin)) {
    echo "<th scope='col'> Verwijderen </th>";
}
echo "</tr>";
echo "</thead>";
echo "<tbody>";
$stmt = SelectAll("vaarrapporten", "ID", "DESC");
while ($row = $stmt->fetch()) {
    echo "<tr>";
    if (CheckRank($admin)) {
        echo "<td>" . $row['ID'] . "</td>";
    }
    echo "<td>" . $row['Datum'] . "</td>";
    echo "<td>" . $row['Schipper'] . "</td>";
    echo "<td>" . $row['Opstappers'] . "</td>";
    echo "<td>" . $row['Vaartuig'] . "</td>";
    echo "<td>" . $row['Verbruik'] . "</td>";
    echo "<td>" . $row['Urenstand'] . "</td>";
    echo "<td>" . $row['Opmerking'] . "</td>";
    if (CheckRank($admin)) {
        echo "<td>" . CreatedBy($row['Created_by']) . "</td>";
    }
    if (CheckRank($schipper)) {
        echo '<td><a href="Vaarrapporten/vr_bewerk.php?ID=' . $row['ID'] . '"><i class="far fa-edit"></i></a></td>';
    }
    if (CheckRank($admin)) {
        echo '<td><a href="./Vaarrapporten/vr_verwijder.php?ID=' . $row['ID'] . '"><i class="far fa-trash-alt"></i></a></td>';
    }
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
</body>

</html>
