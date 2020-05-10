<?php
require_once 'database.php';
unset($_SESSION['logged_user']);
header("Location: /login.php");
?>
