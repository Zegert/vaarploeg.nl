<?php
require '../Includes/config.php';
Head(5, "Vaarrapport verwijder");
$ID     = $_GET["ID"];
$result = SelectWhere("vaarrapporten", "ID", $ID);
$row    = $result->fetch();
echo "<h1>Weet u zeker dat u dit vaarrapport wilt verwijderen?</h1>";
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
echo "</tr>";
echo "</thead>";
echo "<tbody>";
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
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo '<td><a href="vr_verwijder_verwerk.php?ID=' . $row['ID'] . '" class="btn btn-primary"> Verwijderen</a></td>';

?>
</body>

</html>