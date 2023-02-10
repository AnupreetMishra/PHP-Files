<?php

if(isset($_POST['submit'])){
  if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0){
    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    $filename = $_FILES["image"]["name"];
    $filetype = $_FILES["image"]["type"];
    $filesize = $_FILES["image"]["size"];
  
    
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
  
    
    $maxsize = 5 * 1024 * 1024;
    if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
  
    if(in_array($filetype, $allowed)){
      if(file_exists("upload/" . $filename)){
        echo $filename . " is already exists.";
      } else{
        move_uploaded_file($_FILES["image"]["tmp_name"], "upload/" . $filename);
        echo "Your file was uploaded successfully.";
      } 
    } else{
      echo "Error: There was a problem uploading your file. Please try again."; 
    }
  } else{
    echo "Error: " . $_FILES["image"]["error"];
  }

  
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "email_related";

  
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $name = $_POST['name'];
  $email = $_POST['email'];
  $image_name = $filename;

  $sql = "INSERT INTO varification (name, email, image_name) VALUES ('$name', '$email', '$image_name')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}


$to = 'anupreet.mishra@unthinkable.co';
$subject = 'New Image Uploaded';
$headers = "From: " . $_POST['email'] . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$message = '<html><body>';
$message .= '<p>A new image has been uploaded by '.$_POST['name'].'</p>';
$message .= '<p>Contact Information:</p>';
$message .= '<p>Name: '.$_POST['name'].'</p>';
$message .= '<p>Email: '.$_POST['email'].'</p>';
$message .= '<p>Image Name: '.$filename.'</p>';
$message .= '</body></html>';

mail($to, $subject, $message, $headers);

?>

<form action="" method="post" enctype="multipart/form-data">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email"><br>
  <label for="image">Image:</label><br>
  <input type="file" id="image" name="image"><br>
  <input type="submit" value="Submit" name="submit">
</form>