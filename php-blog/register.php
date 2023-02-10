<form method="POST" action="register.php" enctype="multipart/form-data">
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>

  <label for="phone">Phone:</label>
  <input type="tel" id="phone" name="phone" required>

  <label for="password">Password:</label>
  <input type="password" id="password" name="password" required>

  <label for="image">Upload Image:</label>
  <input type="file" id="image" name="image" accept="image/*">

  <input type="submit" value="Register">
</form>



<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); 

    
    $conn = new mysqli("localhost", "root", "", "php-blog");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $file_name = $_FILES["image"]["name"];
        $file_tmp = $_FILES["image"]["tmp_name"];
        $folder_path = "uploads/";
        $path = $folder_path . $file_name;
        move_uploaded_file($file_tmp, $path);
        
        $insert = $conn->query("INSERT into users (name,email,phone,password,image) VALUES ('$name','$email','$phone','$password','$path')");
        
        if($insert){
            
            //$post_id = $_session['id'] ;
            session_start();
            $post_id = $_SESSION['id'];
            
            header("Location: title-click.php?post_id=".$post_id);
        }else{
            echo "File upload failed, please try again.";
        } 
    }
    else {
        echo "File is not an image.";
    }
    $conn->close();
}


?>



