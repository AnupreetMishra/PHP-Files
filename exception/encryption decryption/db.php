<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "secure_data";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
// if ($con->connect_error) {
//     die("Connection failed: " . $con->connect_error);
// }
// echo "Connected successfully";



// $name = isset($_POST['name']) ? $_POST['name'] : '';
// $email = isset($_POST['email']) ? $_POST['email'] : '';




// if (!empty($name) && !empty($email)) {
//     $sql = "INSERT INTO s_data (name, email) VALUES ('$name', '$email')";
  
//     if ($con->query($sql) === TRUE) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $con->error;
//     }
//   } else {
//     echo " <br>Name and email cannot be empty";
//   }
  
?>
