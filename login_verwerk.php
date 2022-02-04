<?php
require_once './Includes/config.php';
// Session();
session_start();
$username = $_POST['inputUsername'];
$password = $_POST['inputPassword'];

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = SQLInjectionFormat($username);
$password = SQLInjectionFormat($password);

$result = SelectWhere("users", "username", $username);
$row    = $result->fetch();

if (password_verify($password, $row['password'])) {
    $_SESSION['ID']   = $row['ID'];
    $_SESSION['Rank'] = $row['rang'];
    if ($_SESSION['Rank'] >= 1) {
        header("Location: home.php");
    }
} else {
    header("Location:index.php");
}