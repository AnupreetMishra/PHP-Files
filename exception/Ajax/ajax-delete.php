<?php
// echo 5;
// die();

$student_id = $_POST["id"];
// echo "$student_id";
// die();
$conn = mysqli_connect("localhost","root","","ajax_data") or die("Connection Failed");
$sql = "DELETE FROM `students` WHERE id = '$student_id'";
// echo "$sql";
// die();
if(mysqli_query($conn,$sql)){
    echo 1;
}
else{
    echo 0;
}

?>