<?php
include("temp.php");
$con =mysqli_connect("localhost","root","","attendance_system");




 if(isset($_POST['save_radio']))
 {
     $staff_id=$_POST['id'];
    $date  = $_POST['date'];
     $status  = $_POST['attendance_status'];
echo"$status";
    
 
      $query = "INSERT INTO intab (staff_id,date,attendance_status) VALUES ('$staff_id','$date','$status')";
     $query_run = mysqli_query($con, $query);

     if($query_run)
     {
         echo "Your Attendance Marked Successfully";
        
     }
     else{
         echo "Your Attendance is not Marked Successfully Try Again";
        
   }
}
 
 ?>