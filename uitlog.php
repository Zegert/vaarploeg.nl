<?php
require_once "./Includes/config.php";
$_SESSION['rang'] === 0;
$_SESSION['ID'] === 0;
session_destroy();
header("location:index.php");