<?php
require '../Includes/config.php';
Head($admin, "Training verwijder");
$stmt = SelectWhere("training", "ID", $_GET['ID']);
$row  = $stmt->fetch();

echo "<h1>Weet u zeker dat u deze training wilt verwijderen?</h1>";

if (CheckRank($admin)) {
    echo "<table class='table table-striped table-sm'>";
    echo "<thead class='thead-dark'>";
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
echo "</thead>";
echo "<tbody>";
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
echo "</tr>";

echo "</table>";
echo '<td><a href="./training_verwijder_verwerk.php?ID=' . $row['ID'] . '" class="btn btn-primary"> Verwijderen</a></td>';

?>
</body>

</html>