<?php
 $conn = new mysqli('localhost', 'root', '', 'php-blog');
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
?>