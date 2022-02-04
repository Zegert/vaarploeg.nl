<?php
require_once '../Includes/config.php';
Head(3, "Vaarrapport bewerk");

$ID  = $_GET['ID'];
$row = SelectWhere("vaarrapporten", "ID", $ID)->fetch();

?>
<form action="vr_bewerk_verwerk.php" method="POST">
    <div class="container">
        <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
        <div class="row">
            <h5>Datum: </h5>
            <input type="text" class='form-control' name="Datum" value="<?php echo $row['Datum']; ?>">
        </div>
        <?php
echo "<div class='row'>";
echo "<h5>Schippers</h5>";
echo "</div>";
echo "Ingevulde schipper(s): " . $row['Schipper'] . "<br>";
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
echo "<h5>Opstappers</h5>";
echo "Ingevulde opstapper(s): " . $row['Opstappers'] . "<br>";
echo "<div class='row'>";
$result_opstappers = SelectWhere("users", "schipper", 0);
while ($row_opstappers = $result_opstappers->fetch()) {
    echo "<div class='col-2'>";
    echo "<div class='input-group mb-1'>";
    echo "<div class='input-group-text'>";
    echo "<input type='checkbox' name='Opstappers[]' onclick='return OpstapperItemChecked();' value=" . $row_opstappers['firstname'] . "> " . $row_opstappers['firstname'];
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
echo "</div>";
echo "<h5>Vaartuigen</h5>";
echo "Ingevuld vaartuig: " . $row['Vaartuig'] . "<br>";
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
?>
    </div>
    <label for="Verbruik">Verbruik: </label>
    <input type="text" class='form-control' name="Verbruik" value="<?php echo $row['Verbruik']; ?>"><br>
    <label for="Urenstand">Urenstand: </label>
    <input type="text" class='form-control' name="Urenstand" value="<?php echo $row['Urenstand']; ?>"><br>
    <h5>Bijzonderheden</h5>
    <input type="text" maxlength="255" class='form-control' name="Opmerking" value="<?php echo $row['Opmerking']; ?>"
        placeholder="Nog geen opmerking toegevoegd"><br>
    <input type="submit" value="Update" class="btn btn-primary" name="submit">
</form>
</body>
<script type="text/javascript">
function OpstapperItemChecked() {
    var checkboxes = document.getElementsByName("opstappers[]");
    var numberOfCheckedItems = 0;
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked)
            numberOfCheckedItems++;
    }
    if (numberOfCheckedItems > 6) {
        alert("Je kan maximaal 6 opstappers meenemen");
        return false;
    }
}

function SchipperItemChecked() {
    var checkboxes = document.getElementsByName('schipper[]');
    var numberOfCheckedItems = 0;
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked)
            numberOfCheckedItems++;
    }
    if (numberOfCheckedItems > 6) {
        alert('Je kan maximaal 6 schippers meenemen');
        return false;
    }
}
</script>

</html>