<?php
require_once "../Includes/config.php";
Head(1, "Training aanmaken");
?>
<div class="container">
    <form action="./training_nieuw_verwerk.php" method="POST">
        <h1>Maak een nieuwe training aan.</h1>
        <h5>Trainer</h5>
        <div class="row">
            <?php
$stmt_schipper = SelectWhereBigger("users", "schipper", "null");
while ($row = $stmt_schipper->fetch()) {
    echo "<div class='col-2'>";
    echo "<div class='input-group mb-1'>";
    echo "<div class='input-group-text'>";
    echo "<input type='radio' class='form-check-input' name='trainer' onclick='return SchipperItemChecked();' value=" . $row['firstname'] . '>' . $row['firstname'] . '<br>';
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
        </div>
        <h5>Schipper(s) aanwezig</h5>
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
        <h5>Opstapper(s) aanwezig</h5>
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
        <h5>Bijzonderheden</h5>
        <textarea class='form-control' cols='70' name='opmerking' value='opmerking' maxlength='255'
            placeholder='Zet uw bijzonderheden hier neer...'></textarea><br>
        <input type='submit' value='Verzenden' class="btn btn-primary">
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
        if (numberOfCheckedItems > 20) {
            alert('Je kan maximaal 20 opstappers meenemen');
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