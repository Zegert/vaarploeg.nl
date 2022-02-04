<?php
require_once '../Includes/config.php';
Head(4, "Gebruiker aangemaakt");
try {
    InsertAccount($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['password'], $_POST['rang'], $_POST['schipper']);
    header("Location:index.php");
} catch (PDOException $e) {
    echo "Nieuwe gebruiker niet toegevoegd. Error: " . $e;
    echo $_POST['username'] . "<br>";
    echo $_POST['firstname'] . "<br>";
    echo $_POST['lastname'] . "<br>";
    echo $_POST['password'] . "<br>";
    echo $_POST['rang'] . "<br>";
    echo $_POST['schipper'] . "<br>";
}