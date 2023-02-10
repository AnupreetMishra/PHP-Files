<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];


$conn = mysqli_connect("localhost","root","","ajax_data") or die("Connection Failed");

//$sql = "INSERT INTO students(first_name,last_name) VALUES ('{$first_name}','{$last_name}')";
$sql = "INSERT INTO `students` (`first_name`, `last_name`) VALUES ('{$first_name}', '{$last_name}')";
//$result = mysqli_query($conn,$sql) or die("SQL Query failed");


if(mysqli_query($conn,$sql)){
    echo "dont worry query is working";
}else{
    echo 0;
}
   

?>