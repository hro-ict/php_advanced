<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
$_SESSION['valid'] = false;

header("Location: index.php");
?>