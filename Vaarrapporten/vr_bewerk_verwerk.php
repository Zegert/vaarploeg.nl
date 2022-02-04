<?php
require '../Includes/config.php';
Head(1, "Vaarrapport updaten");
try {
    UpdateVaarrapport($_POST["ID"], $_POST["Datum"], $_POST['Schippers'], $_POST["Opstappers"], $_POST["Vaartuig"], $_POST["Verbruik"], $_POST["Urenstand"], $_POST["Opmerking"]);
    Header("location:../home.php");
} catch (PDOEXception $e) {
    echo "Vaarrapport kon niet geupdate worden. Error: " . $e->getMessage();
}