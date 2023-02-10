

<?php
include ('db.php');

if(!isset($_SESSION['IS_LOGIN'])){
    header('location:login.php');
    exit();
}else{
    echo "<h1>Welcome to Mishra Travels</h1>".$_SESSION['u_name'];
}
?>

<br/>
<button><a href="logout.php">Logout</a></button>
