<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> -->
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Name</label>
                <div class="col-sm-8">
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" name="email" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="text" name="password" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Confirm Password</label>
                <div class="col-sm-8">
                    <input type="text" name="confirmpassword" class="form-control">
                </div>
            </div>




            <div class="form-group row">
                <div class="col-sm-12 mt-3">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>



<?php

error_reporting(E_ALL^E_NOTICE^E_WARNING);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "s_login";

//Create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn){
    die("Sorry we failed to connect:" .mysqli_connect_error());
}
else{
    echo "Connection was successfully stablished";
}



    // Error messages
    $nameEmptyErr = "";
    $emailEmptyErr = "";
    $nameErr = "";
    $emailErr = "";
    $password = "";
    $confirmpassword = "";
    if(isset($_POST["submit"])) {
        echo 'hi';
        // Set form variables
        $name           = checkInput($_POST["name"]);
        $email          = checkInput($_POST["email"]);
        $password         = checkInput($_POST["password"]);
        $confirmpassword   = checkInput($_POST["confirmpassword"]);
        die();
        
        // Name validation
        if(empty($name)){
            $nameEmptyErr = '<div class="error">
                Name can not be left blank.
            </div>';
        } // Allow letters and white space 
        else if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = '<div class="error">
                Only letters and white space allowed.
            </div>';
        } else {
            echo $name . '<br>';
        }
        // Email validation
        if(empty($email)){
            $emailEmptyErr = '<div class="error">
                Email can not be left blank.
            </div>';
        } // E-mail format validation
        else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
            $emailErr = '<div class="error">
                    Email format is not valid.
            </div>';
        } else {
            echo $email . '<br>';
        }

        
    }  
    function checkInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }    



// $fnameEmptyErr = "";
// $lnameEmptyErr = "";
// $emailEmptyErr = "";
// $passwordEmptyErr = "";
// $confirm_passwordEmptyErr = "";


// if(isset($_POST["submit"])){

//     $fname = checkInput($_POST["fname"]);
//     $lname = checkInput($_POST["lname"]);
//     $email = checkInput($_POST["email"]);
//     $password = checkInput($_POST["password"]);
//     $confirm_password = checkInput($_POST["confirm_password"]);

//     if(empty($fname)){
//         $nameEmptyErr = '<div class="error">
//         Name can not be left blank.</div>';
//     }

//     else if(!preg_match("/^[a-zA-Z ]*$/", $fname)) {
//         $fnameErr = '<div class="error">
//             Only letters and white space allowed.
//         </div>';
//     } else {
//         echo $fname . '<br>';
//     }

//     //last name

//     if(empty($lname)){
//         $nameEmptyErr = '<div class="error">
//         Name can not be left blank.</div>';
//     }

//     else if(!preg_match("/^[a-zA-Z ]*$/", $lname)) {
//         $lnameErr = '<div class="error">
//             Only letters and white space allowed.
//         </div>';
//     } else {
//         echo $lname . '<br>';
//     }

//     if(empty($email)){
//         $emailEmptyErr = '<div class="error">
//             Email can not be left blank.
//         </div>';
//     } // E-mail format validation
//     else if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
//         $emailErr = '<div class="error">
//                 Email format is not valid.
//         </div>';
//     } else {
//         echo $email . '<br>';
//     }
// // password and confirm password
//     if(strlen($password)==0)
//     {
//         $password_error = 'please password';
//         $is_valid_form = false;
//     }
//     else if($password!==$confirm_password){
//         $password_error = 'passowrd didnot matched with confirm password';
//         $confirm_password_error = 'passowrd didnot matched with confirm password';
//         $is_valid_form = false;
//     }

// }

///////////////////////////////

//    if($_Post['register'])
//    {
//     $fname = $_POST['fname'];
//     $lname = $_POST['lname'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $confirm_password = $_POST['confirm_password'];


//     if($fname != "" && $lname != "" && $email != "" && $password != "" && $confirm_password != "")
//     {


//         $query = "INSERT INTO form VALUES('$fname','$lname','$email','$password','$confirm_password')";
//         $data = mysqli_query($conn,$query);

//         if($data){
//             echo "Data insrted";
//         }else{
//             echo "Failed";
//         }
//     }else{
//         echo "Please fill the fields";

//     }    
//    }

// if(isset($_POST['Submit']))
// {

//     $fname=trim($_POST["emp_name"]);
//     $lname=trim($_POST["lname"]);
//     $email=trim($_POST["email"]);
//     $password=trim($_POST["password"]);
//     $confirm_password=trim($_POST["confirm_password"]);


//     if($fname =="") 
//     {
//         $errorMsg=  "error : You did not enter a First Name.";
//         $code= "1" ;
//     }


//     elseif($lname =="") 
//     {
//         $errorMsg=  "error : You did not enter your Last Name.";
//         $code= "2" ;
//     }

//     elseif($email == ""){
//         $errorMsg=  "error : You did not enter your Email.";
//         $code= "3";
//     } //check for valid email 
//     elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)){
//       $errorMsg= 'error : You did not enter a valid Email.';
//       $code= "3";
//     }
//     else{
//       echo "Success";
//       //final code will execute here.
//     }

    


// }  





?>