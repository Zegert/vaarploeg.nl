<?php
require_once '../Includes/config.php';
Head(3, "Training aanpassen");
$row = SelectWhere("training", "ID", $_GET['ID'])->fetch();
?>
<div class="container">
    <form action="training_bewerk_verwerk.php" method="POST">
        <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
        <div class="row">
            <h5>Datum: </h5>
            <input type="text" class='form-control' name="Datum" value="<?php echo $row['Datum']; ?>">
        </div>
        <h5>Trainer</h5>
        <?php
echo "Ingevulde trainer: " . $row['trainer'];
echo "<div class='row'>";

$stmt_schipper = SelectWhereBigger("users", "schipper", "null");
while ($row_trainer = $stmt_schipper->fetch()) {
    echo "<div class='col-2'>";
    echo "<div class='input-group mb-1'>";
    echo "<div class='input-group-text'>";
    echo "<input type='radio' class='form-check-input' name='trainer' onclick='return SchipperItemChecked();' value=" . $row_trainer['firstname'] . '>' . $row_trainer['firstname'] . '<br>';
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
</div>
<h5>Schipper(s) aanwezig</h5>
<?php
echo "Ingevulde schippers: " . $row['schippers'];
echo "<div class='row'>";
$stmt_schipper = SelectWhereBigger("users", "schipper", "null");
while ($row_schipper = $stmt_schipper->fetch()) {
    echo "<div class='col-2'>";
    echo "<div class='input-group mb-1'>";
    echo "<div class='input-group-text'>";
    echo "<input type='checkbox' class='form-check-input' name='schipper[]' onclick='return SchipperItemChecked();' value=" . $row_schipper['firstname'] . '>' . $row_schipper['firstname'] . '<br>';
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
</div>
<h5>Opstapper(s) aanwezig</h5>
<?php
echo "Ingevulde opstappers: " . $row['opstappers'];
echo "<div class='row'>";
$stmt_opstapper = SelectWhere("users", "schipper", "null");
while ($row_opstapper = $stmt_opstapper->fetch()) {
    echo "<div class='col-2'>";
    echo "<div class='input-group mb-1'>";
    echo "<div class='input-group-text'>";
    echo "<input type='checkbox' class='form-check-input' name='opstappers[]' onclick='return OpstapperItemChecked();' value=" . $row_opstapper['firstname'] . '>' . $row_opstapper['firstname'] . '<br>';
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
</div>
<h5>Bijzonderheden</h5>
<input type="text" maxlength="255" class='form-control' name="Opmerking" value="<?php echo $row['Opmerking']; ?>"
    placeholder="Nog geen opmerking toegevoegd"><br>
<input type='submit' value='Verzenden' class="btn btn-primary">
</form>
</div>
</body>
<script type="text/javascript">
function OpstapperItemChecked() {
    var checkboxes = document.getElementsByName("opstappers[]");
    var numberOfCheckedItems = 0;
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked)
            numberOfCheckedItems++;
    }
    if (numberOfCheckedItems > 20) {
        alert("Je kan maximaal 20 opstappers meenemen");
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
    if (numberOfCheckedItems > 20) {
        alert('Je kan maximaal 20 schippers meenemen');
        return false;
    }
}
</script>

</html>