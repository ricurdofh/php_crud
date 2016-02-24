<?php
session_start();
include_once('../variables.php'); //Include Environment variables
session_unset();
session_destroy();
header('Location: ' . $SERVER . 'login.php');
?>