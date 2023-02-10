<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', "");
define('DB_NAME','login');

///*****************database connection************///////

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);


////***********check connection stablshed or not****************************////

if($conn==false){
    die('Error: your connection was not established');
}
// else{
//     echo "Connection was established successfully";
// }
?>
 
