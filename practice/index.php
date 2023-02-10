<?php
include_once 'config.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fullname'];
    $mnumber = $_POST['mobilenumber'];
    $emailid = $_POST['emailid'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    //Serverside Validation
    if (empty($fname)) {
        $error = '<div class="error">
    Name can not be left blank.
    </div>';
        //   $error = "Enter your fullname !";
        $code = 1;
    }

    if (empty($fname)) {
        $error = '<div class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 58px 0px 0px 244px;position: absolute;">
    Name can not be left blank.
    </div>';
        //   $error = "Enter your fullname !";
        $code = 1;
    } elseif (empty($mnumber)) {
        $error = '<div class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 147px 0px 0px 244px;position: absolute;">
    Enter Your Mobile Number.
    </div>';
        $code = 2;
    } elseif (!is_numeric($mnumber)) {
        //   $error = "Mobile number must be numeric only!";
        $error = '<div class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 147px 0px 0px 244px;position: absolute;">
  Mobile number must be numeric only!
  </div>';
        $code = 2;
    } elseif (strlen($mnumber) != 10) {
        //   $error = "Mobile nuber should be 10 digit only!";
        $error = '<div class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 147px 0px 0px 244px;position: absolute;">
    Mobile number should be 10 digit only!
    </div>';

        $code = 2;
    } elseif (empty($emailid)) {
        //   $error = "Enter your email !";
        $error = '<div class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 236px 0px 0px 244px;position: absolute;">
    Enter Your Email !
    </div>';
        $code = 3;
    } elseif (
        !preg_match(
            '/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i',
            $emailid
        )
    ) {
        //   $error = "Enter valid email id !";
        $error = '<div class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 236px 0px 0px 244px;position: absolute;">
    Enter valid email id !
    </div>';
        $code = 3;
    } elseif (empty($password)) {
        //   $error = "Enter your password";
        $error = '<div class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 325px 0px 0px 244px;position: absolute;">
    Enter your password
    </div>';
        $code = 4;
    } elseif (strlen($password) < 6) {
        //   $error = "Password must be 6 characters long !";
        $error = '<div class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 325px 0px 0px 244px;position: absolute;">
    Password must be 6 characters long !
    </div>';

        $code = 4;
    } elseif (empty($cpassword)) {
        //   $error = "Enter your confirm password";
        $error = '<div class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 414px 0px 0px 244px;position: absolute;">
    Enter your confirm password
    </div>';
        $code = 5;
    } elseif (strlen($cpassword) < 6) {
        //   $error = "Confirm Password must be 6 characters long !";
        $error = '<div class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 414px 0px 0px 244px;position: absolute;">
    Confirm Password must be 6 characters long !
    </div>';

        $code = 5;
    } elseif ($cpassword != $password) {
        //   $error = "Password and Confirm Password doesnot match";
        $error = '<div class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 414px 0px 0px 244px;position: absolute;">
    Password and Confirm Password doesnot match
    </div>';
        $code = 5;
    } else {
        //Checking emailid and mobile number if already registered
        $ret = mysqli_query(
            $con,
            "select id from server where EmailId='$emailid' || MobileNumber='$mnumber'"
        );
        $result = mysqli_fetch_array($ret);
        if ($result > 0) {
            echo "<script>alert('This email already associated with another account');</script>";
        } else {
            $query = mysqli_query(
                $con,
                "insert into server(FullName,MobileNumber,EmailId,Password,RegDate) values('$fname','$mnumber','$emailid','$password',NOW())"
            );
            if ($query) {
                echo "<script>alert('Successfully Registered')</script>";
            } else {
                echo "<script>alert('Something went wrong. Please try again.')</script>";
                echo "<script>window.location.href = 'registration.php';</script>";
            }
        }
    }
}

if (isset($_FILES['image'])) {
    // echo "<pre>";
    // print_r($_FILES);
    // echo "<pre>";

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    move_uploaded_file($file_tmp, 'uploads/' . $file_name);
}

// // Display status message
// echo $statusMsg;$statusMsg = '';

// // File upload path
// $targetDir = "uploads/";
// $fileName = $_FILES["image"]["name"];
// $targetFilePath = $targetDir . $fileName;
// $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

// if(isset($_POST["submit"]) && !empty($_FILES["image"]["name"])){
//     // Allow certain file formats
//     $allowTypes = array('jpg','png','jpeg','gif','pdf');
//     if(in_array($fileType, $allowTypes)){
//         // Upload file to server
//         if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
//             // Insert image file name into database
//             $insert = $con->query("INSERT into server (file_name) VALUES ('".$fileName."')");
//             if($insert){
//                 $statusMsg = "The image ".$fileName. " has been uploaded successfully.";
//             }else{
//                 $statusMsg = "Image upload failed, please try again.";
//             }
//         }else{
//             $statusMsg = "Sorry, there was an error uploading your image.";
//         }
//     }else{
//         $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
//     }
// }else{
//     // $statusMsg = 'Please select a file to upload.';
// $statusMsg = '<span class="style-error" style="color: red;font-weight: 400;display: block;padding: 8px 0;font-size: 14px;margin: 615px 0px 0px 0px;position: absolute;">
// Please select a image to upload.
// </span>';
// }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User Registration</title>

    
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-dark p-t-10 p-b-50">
        <div class="wrapper wrapper--w900">
            <form method="post"  enctype="multipart/form-data">
                <div class="card card-6">
                    <div class="card-heading">
                        <h2 class="title">User Registration</h2>
                    </div>
                    <div class="card-body">
                        <p style="color:red;" align="center">
                            <?php if (isset($error)) {
                                echo $error;
                            } ?>
                        </p>

                        <div class="form-row">
                            <div class="name">Full name</div>
                            <div class="value">
                                <input id="name_input" type="text" name="fullname" class="input--style-6"
                                    value="<?php if (isset($fname)) {
                                        echo $fname;
                                    } ?>" <?php if (
    isset($code) &&
    $code == 1
) {
    echo 'autofocus';
} ?> />
                            </div>
                            <span class="name_text">Name can not be empty</span>
                        </div>
                        

                        <div class="form-row">
                            <div class="name">Mobile Number</div>
                            <div class="value">
                                <div class="input-group">
                                    <input id="number_input" type="text" name="mobilenumber" class="input--style-6"
                                        value="<?php if (isset($mnumber)) {
                                            echo $mnumber;
                                        } ?>" <?php if (
    isset($code) &&
    $code == 2
) {
    echo 'autofocus';
} ?> />
                                </div>
                                <span class="number_text">Number can not be empty</span>
                            </div>
                            
                        </div>

                        <div class="form-row">
                            <div class="name">Email id</div>
                            <div class="value">
                                <div class="input-group">
                                    <input id="email_input" type="text" name="emailid" class="input--style-6"
                                        value="<?php if (isset($emailid)) {
                                            echo $emailid;
                                        } ?>" <?php if (
    isset($code) &&
    $code == 3
) {
    echo 'autofocus';
} ?> />
                                </div>
                                <span class="email_text">Email can not be empty</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input id="password_input" type="password" name="password" class="input--style-6"
                                        value="<?php if (isset($password)) {
                                            echo $password;
                                        } ?>" <?php if (
    isset($code) &&
    $code == 4
) {
    echo 'autofocus';
} ?> />
                                </div>
                                <span class="password_text">Password can not be empty</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Confirm Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input id="cp_input" type="text" name="confirmpassword" class="input--style-6"
                                        value="<?php if (isset($cpassword)) {
                                            echo $cpassword;
                                        } ?>" <?php if (
    isset($code) &&
    $code == 5
) {
    echo 'autofocus';
} ?> />
                                </div>
                                <span class="cp_text">Confirm Password can be same as password</span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Upload Image</div>
                            <div class="value">
                                <div class="input-group">
                                    <input  type="file" name="image" accept=".jpg, .jpeg, .png" class="input--style-6" />
                                </div>
                                
                            </div>
                        </div>

                    </div>

                    

                    <div class="card-footer">
                        <button class="btn btn--radius-2 btn--blue-2" type="submit" name="submit">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script>
        
    $(document).ready(function () {
        $("#name_input").keyup(function() {
           if($(this).val() == ''){
             $('.name_text').show();
            }else{
              $('.name_text').hide();
            }
        });

        $("#number_input").keyup(function() {
           if($(this).val() == ''){
             $('.number_text').show();
            }else{
              $('.number_text').hide();
            }
        });

        $("#email_input").keyup(function() {
           if($(this).val() == ''){
             $('.email_text').show();
            }else{
              $('.email_text').hide();
            }
        });

        $("#password_input").keyup(function() {
           if($(this).val() == ''){
             $('.password_text').show();
            }else{
              $('.password_text').hide();
            }
        });

        $("#cp_input").keyup(function() {
           if($(this).val() == ''){
             $('.cp_text').show();
            }else{
              $('.cp_text').hide();
            }
        });
    });

//     $("input").keydown(function(){
//     $("p").hide();
//   });
    </script>
    <script src="vendor/jquery/jquery.js"></script>
    <script src="js/global.js"></script>


    <style>
        .name_text{
            position: absolute;
            margin: 41px 0 0 191px;
            color: red;
        }

        .number_text{
            margin: 3px 0 0 2px;
            position: absolute;
            color: red;
        }

        .email_text{
            position: absolute;
            margin: 3px;
            color: red;
        }
        .password_text{
            position: absolute;
            margin: 3px;
            color: red;
        }

        .cp_text{
            position: absolute;
            margin: 3px;
            color: red;
        }
    </style>
</body>
</html>