<?php
require_once '../Includes/config.php';
Head(3, "Schaderapport nieuw");
?>

<body>
    <div class="container">
        <h1>Maak een nieuw schaderapport aan.</h1>
        <form action='schade_nieuw_verwerk.php' method='POST'>
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
            <h5>Bijzonderheden</h5>
            <input type="text" maxlength="255" class='form-control' name="Opmerking" value=""
                placeholder="Beschrijf de schade"><br>
            <input type="submit" value="Verzenden" class="btn btn-primary" name="submit">
        </form>
    </div>
</body>

</html>