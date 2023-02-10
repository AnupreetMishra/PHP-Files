<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="file">
        <form action="" method="post" enctype="multipart/form-data">
              Select Image File to Upload:
            <input type="file" name="file">
            <input type="submit" name="submit" value="Upload">
    </form>
    </div>
</body>
</html>

<?php
// // if(isset($_FILES['image'])){
// //     echo "<pre>";
// //     print_r($_FILES);
// //     echo "<pre>";

// //     $file_name = $_FILES['image']['name'];
// //     $file_size = $_FILES['image']['size'];
// //     $file_tmp = $_FILES['image']['tmp_name'];
// //     $file_type = $_FILES['image']['type'];

// //     move_uploaded_file($file_tmp,"uploaded-files/". $file_name);
// // }


// // Database configuration

// $dbHost     = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName     = "s_login";

// // Create database connection
// $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// // Check connection
// if ($db->connect_error) {
//     die("Connection failed: " . $db->connect_error);
// }

// $statusMsg = '';

// $file_name = $_FILES['image']['name'];
// $file_size = $_FILES['image']['size'];
// $file_tmp = $_FILES['image']['tmp_name'];
// $file_type = $_FILES['image']['type'];

// if(isset($_POST["submit"]) && !empty($file_name))
// {

//     $allowed_types = array('jp', 'png', 'jpeg');
    
//         if(in_array($file_type,$allowed_types))
//         {
//             if(move_uploaded_file($file_tmp,"uploads/". $file_name))
//             {
//                 $insert = $db->query("INSERT into sever (file_name, uploaded_on) VALUES ('".$file_name."', NOW())");
//                 if($insert)
//                 {
//                     $statusMsg = "The file".$file_name."has been uploaded successfully.";

//                 }else
//                 {
//                     $statusMsg = "File upload failed";
//                 }


//             }else
//             {
//                 $statusMsg = " Sorry try again";
//             }
//         }else
//         {
//             $statusMsg = 'Sorry, only JPG,PNG, and JPEG files are allowed';
//         }


// }else
//     {
//         $statusMsg = 'Please select a file to upload.';
//     }


   


//     echo $statusMsg;

    




?>



<?php
if(isset($_POST['submit'])){
    $files = $_FILES['file'];

    $fileName = $files['name'];
    $fileSize =$files['size'];
    $fileTempLoc = $files['error'];

    $f = explode('.',$fileName);
    $fileExt = strtolower($f[1]);

    $allowedExt = array('jpg','jpeg','png');
    if(in_array($fileExt,$allowedExt)){
        if($fileSize<200000){
            $fileNewName = uniqid('TEST_',false);
           $dest = 'uploads/'.$fileNewName.'.'.$fileExt;
           move_uploaded_file($fileTempLoc,$dest);
           header('Location:Index.php?success=true'); 
        }else{
            echo "File size exceed";
        }

    }else{
        echo "file type not supported";
    }

}



?>
<?php

// if (isset($_POST['submit'])) {
//     // Check if the form was actually submitted
    
//     // Check if a file was selected for upload
//     if (!empty($_FILES['fileToUpload']['name'])) {
//       // Get the file details
//       $fileName = $_FILES['fileToUpload']['name'];
//       $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
//       $fileSize = $_FILES['fileToUpload']['size'];
//       $fileError = $_FILES['fileToUpload']['error'];
//       $fileType = $_FILES['fileToUpload']['type'];
      
//       // Extract the file extension
//       $fileExt = explode('.', $fileName);
//       $fileActualExt = strtolower(end($fileExt));
      
//       // Allowed file extensions
//       $allowed = array('jpg', 'jpeg', 'png', 'pdf');
      
//       // Check if the file extension is allowed
//       if (in_array($fileActualExt, $allowed)) {
//         // Check for any errors
//         if ($fileError === 0) {
//           // Check file size
//           if ($fileSize < 1000000) {
//             // Generate a unique file name
//             $fileNameNew = uniqid('', true).".".$fileActualExt;
            
//             // Set the destination folder
//             $fileDestination = 'uploads/'.$fileNameNew;
            
//             // Move the file to the destination folder
//             move_uploaded_file($fileTmpName, $fileDestination);
            
//             // File upload was successful
//             echo "Your file was uploaded successfully.";
//           } else {
//             // File size is too large
//             echo "Error: Your file is too large.";
//           }
//         } else {
//           // An error occurred while uploading the file
//           echo "Error: There was an error uploading your file. Please try again.";
//         }
//       } else {
//         // File type is not allowed
//         echo "Error: File type is not allowed. Please upload a JPG, JPEG, PNG, or PDF file.";
//       }
//     } else {
//       // No file was selected for upload
//       echo "Error: Please select a file to upload.";
    }
  }
  
?>
