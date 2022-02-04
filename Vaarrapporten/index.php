<?php
require_once '../Includes/config.php';
Head(1, "Nieuw vaarrapport");
?>

<form action='vr_nieuw_verwerk.php' method='POST'>
    <div class="container">
        <h5>Schipper(s)</h5>
        <div class="row">
            <?php
$stmt_schipper = SelectWhereBigger("users", "schipper", "null");
while ($row = $stmt_schipper->fetch()) {
    echo "<div class='col-2'>";
    echo "<div class='input-group mb-1'>";
    echo "<div class='input-group-text'>";
    echo "<input type='checkbox' class='form-check-input' name='schipper[]' onclick='return SchipperItemChecked();' value=" . $row['firstname'] . '>' . $row['firstname'] . '<br>';
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
        </div>
        <h5>Opstapper(s)</h5>
        <div class="row">
            <?php
$stmt_opstapper = SelectWhere("users", "schipper", "null");
while ($row = $stmt_opstapper->fetch()) {
    echo "<div class='col-2'>";
    echo "<div class='input-group mb-1'>";
    echo "<div class='input-group-text'>";
    echo "<input type='checkbox' class='form-check-input' name='opstappers[]' onclick='return OpstapperItemChecked();' value=" . $row['firstname'] . '>' . $row['firstname'] . '<br>';
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
        </div>
        <h5>Vaartuig</h5>
        <div class="row">
            <?php
$stmt_vaartuig = SelectAll("Vaartuigen", "Naam");
while ($row = $stmt_vaartuig->fetch()) {
    echo "<div class='col-2'>";
    echo "<div class='input-group mb-1'>";
    echo "<div class='input-group-text'>";
    echo "<input type='radio' class='form-check-input' name='vaartuig' value=" . $row['Naam'] . ' required >' . $row['Naam'] . '<br>';
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
        </div>
        <h5>Verbruik</h5>
        <input type='number' class='form-control' name='verbruik' maxlength='4' placeholder='Brandstofverbruik'
            required><br>

        <h5>Urenstand</h5>
        <input type='number' class='form-control' name='urenstand' maxlength='5' placeholder='Urenstand'><br>
        <h5>Bijzonderheden</h5>
        <textarea class='form-control' cols='70' name='opmerking' value='opmerking' maxlength='255'
            placeholder='Zet uw bijzonderheden hier neer...'></textarea><br>
        <input type='submit' value='Verzenden' class="btn btn-primary">
    </div>
</form>
</body>

<script type='text/javascript'>
function OpstapperItemChecked() {
    var checkboxes = document.getElementsByName('opstappers[]');
    var numberOfCheckedItems = 0;
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked)
            numberOfCheckedItems++;
    }
    if (numberOfCheckedItems > 6) {
        alert('Je kan maximaal 6 opstappers meenemen');
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