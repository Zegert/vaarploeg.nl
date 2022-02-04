<?php
require_once '../Includes/config.php';
Head(4, "Gebruiker verwijderd");
try {
    $ID = $_GET['ID'];
    DeleteItem("users", "ID", $ID);
    header("Location: index.php");
} catch (PDOException $e) {
    echo "Gebruiker niet verwijderd. Error: " . $e;
}