<?php
$con = mysqli_connect("localhost","root","","ajax_login") or die("Connection Failed");
if($con==true){
    echo "true";
}else{
    echo "false";
}
?>