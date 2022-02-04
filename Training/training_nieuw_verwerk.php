<?php
require '../Includes/config.php';
Head("1", "Training aangemaakt");
try {
    InsertTraining($_POST['trainer'], $_POST['schipper'], $_POST['opstappers'], $_POST['opmerking']);
    header("Location: index.php");
} catch (PDOException $e) {
    echo "Training is niet toegevoegd. Error: " . $e->getMessage();
}