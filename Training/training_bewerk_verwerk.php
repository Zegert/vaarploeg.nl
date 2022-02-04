<?php
require_once '../Includes/config.php';
Head(3, "Training aanpassen");
try {
    UpdateTraining($_POST['ID'], $_POST['Datum'], $_POST['trainer'], $_POST['schipper'], $_POST['opstappers'], $_POST['Opmerking']);
    header("Location: ./index.php");
} catch (PDOException $e) {
    echo "Training kon niet worden geupdate. Error: " . $e->getMessage();
}