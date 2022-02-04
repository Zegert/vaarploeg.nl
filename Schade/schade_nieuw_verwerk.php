<?php

require '../Includes/config.php';
Head(3, "Schaderapport nieuw");
try {
    InsertSchade($_POST['vaartuig'], $_POST['schipper'], $_POST['Opmerking']);
    header("location:index.php");
} catch (PDOException $e) {
    echo "Schaderapport kon niet worden toegevoegd. Error: " . $e->getMessage();
}