<?php
require_once '../Includes/config.php';
Head(5, "Schaderapport verwijder");
try {
    DeleteItem("schade", "ID", $_GET['ID']);
    header('Location: index.php');
} catch (PDOExeption $e) {
    echo "Schaderapport niet verwijderd. Error: " . $e->getMessage();
}