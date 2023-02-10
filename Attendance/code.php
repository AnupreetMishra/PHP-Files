<?php
session_start();
$con = mysqli_connect("localhost","root","","attendance_system");

if(isset($_POST['save_radio']))
{
    $name  = $_POST['name'];
    $gender  = $_POST['gender'];
    $emp_id  = $_POST['empId'];
    $email  = $_POST['email'];
    
    // $date  = $_POST['Date'];

    $query = "INSERT INTO demo (emp_name,gender,emp_id,email) VALUES ('$name','$gender','$emp_id','$email')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Details  Successfully Saved";
        header("Location: add.php");
    }
    else{
        $_SESSION['status'] = "Your Attendance is not Marked Successfully Try Again";
        header("Location: add.php");
    }
}
?>

//create an API to fetch data datewise in php?
//$qw="select * from details where STR_TO_DATE(date,'%d/%m/%Y') <='$date'"


