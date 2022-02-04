<?php
require_once '../Includes/config.php';
Head(4, "Gebruiker bewerkt");

try {
    UpdateAccount($_POST["ID"], $_POST["username"], $_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['rang'], $_POST['schipper']);
    header("Location:./index.php");
} catch (PDOException $e) {
    echo "Gebruiker niet aangepast. Error: " . $e->getMessage();
}