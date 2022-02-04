<?php
require '../Includes/config.php';
Head(3, "Schaderapport bewerk");
try {
    UpdateSchade($_POST['ID'], $_POST['Vaartuig'], $_POST['Schippers'], $_POST['Opmerking'], $_POST['Datum']);
    header("Location: ./index.php");
} catch (PDOException $e) {
    echo "Schaderapport niet geupdate. Error: " . $e->getMessage();
}