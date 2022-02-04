<?php
require_once '../Includes/config.php';
Head(2, "Schaderapport bewerken");

$stmt = SelectWhere("schade", "ID", $_GET['ID']);
$row  = $stmt->fetch();

echo "<div class='container'>";
echo "<form action='schade_bewerk_verwerk.php' method='POST'>";
echo "<input type='hidden' name='ID' value='" . $row['ID'] . "'>";
echo "<div class='row'>";
echo "<h5>Vaartuigen</h5>";
echo "</div>";
echo "<div class='row'>";
echo "Ingevuld vaartuig: " . $row['vaartuig'];
echo "</div>";
echo "<div class='row'>";

$result_vaartuigen = SelectAll("Vaartuigen", "ID");
while ($row_vaartuig = $result_vaartuigen->fetch()) {
    echo "<div class='col-2'>";
    echo "<div class='input-group mb-1'>";
    echo "<div class='input-group-text'>";
    echo "<input type='radio' name='Vaartuig' value=" . $row_vaartuig['Naam'] . "> " . $row_vaartuig['Naam'];
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
echo "</div>";
echo "<div class='row'>";
echo "<h5>Schippers</h5>";
echo "</div>";
echo "<div class='row'>";
echo "Ingevulde schipper(s): " . $row['Schipper'];
echo "</div>";
echo "<div class='row'>";
$result_schippers = SelectWhereBigger("users", "schipper", 0);
while ($row_schipper = $result_schippers->fetch()) {
    echo "<div class='col-2'>";
    echo "<div class='input-group mb-1'>";
    echo "<div class='input-group-text'>";
    echo "<input type='checkbox' name='Schippers[]' onclick='return SchipperItemChecked();' value=" . $row_schipper['firstname'] . "> " . $row_schipper['firstname'];
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
echo "</div>";
?>
<div class="row">
    <h5>Datum: </h5>
    <input type="text" class='form-control' name="Datum" value="<?php echo $row['Datum']; ?>">
</div>
<div class="row">
    <h5>Bijzonderheden</h5>
</div>
<div class="row">
    <input type="text" maxlength="255" class='form-control' name="Opmerking" value="<?php echo $row['Opmerking']; ?>"
        placeholder="Nog geen opmerking toegevoegd"><br>
</div>
<div class="row">
    <input type="submit" value="Update" class="btn btn-primary" name="submit">
</div>
</form>
</div>
</body>

</html>