<?php
require '../Includes/config.php';
Head(5, "Training verwijder");
try {
    DeleteItem("training", "ID", $_GET['ID']);
    header('Location: ./index.php');
} catch (PDOException $e) {
    echo "Vaarrapport niet verwijderd. Error: " . $e->getMessage();
}