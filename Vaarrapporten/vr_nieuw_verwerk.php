<?php
require_once '../Includes/config.php';
Head(1, "Nieuw vaarrapport");
InsertVaarrapport($_POST['schipper'], $_POST['opstappers'], $_POST['vaartuig'], $_POST['verbruik'], $_POST['urenstand'], $_POST['opmerking']);
if ($insertVaarrapport = true) {
    header("Location: ../home.php");
} else {
    echo $insertVaarrapport;
}