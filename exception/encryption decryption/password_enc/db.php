<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "secure_data";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);
?>