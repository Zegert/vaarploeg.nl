<?php
require '../Includes/config.php';
Head(5, "Vaarrapport verwijderd");
try {
    $ID = $_GET['ID'];
    DeleteItem("vaarrapporten", "ID", $ID);
    header('Location: ../home.php');
} catch (PDOException $e) {
    echo "Vaarrapport niet verwijderd. Error: " . $e;
}