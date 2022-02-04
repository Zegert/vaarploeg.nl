<?php
require_once '../Includes/config.php';
Head(5, "Schade verwijder");

$ID     = $_GET["ID"];
$result = SelectWhere("schade", "ID", $ID);
$row    = $result->fetch();
echo "<h1>Weet u zeker dat u dit schaderapport wilt verwijderen?</h1>";
echo "<table class='table table-striped table-sm'>";
echo "<thead class='thead-dark'>";
echo "<tr>";
if (CheckRank($admin)) {
    echo "<th scope='col'> ID </th>";
}
echo "<th scope='col'> Datum </th>";
echo "<th scope='col'> Schipper </th>";
echo "<th scope='col'> Vaartuig </th>";
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
echo "<td>" . $row['vaartuig'] . "</td>";
echo "<td>" . $row['Opmerking'] . "</td>";
echo "</tr>";
echo "</tbody>";
echo "</table>";
echo '<td><a href="schade_verwijder_verwerk.php?ID=' . $row['ID'] . '" class="btn btn-primary"> Verwijderen</a></td>';

?>
</body>

</html>
