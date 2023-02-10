<?php
include('db.php');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];

    if(mysqli_num_rows(mysqli_query($con,"select * from p_data where username='$username'"))>0){
        echo "Username already exits";
    }else{
        $password = password_hash($password,PASSWORD_DEFAULT);
        mysqli_query($con,"insert into p_data (name,username,password) values ('$name','$username','$password')");
        header('location:login.php');
        echo "Thank You For Registration";
    }
    
}

?>
<h1>Registration</h1>
<form method="post">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" required/></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" required/></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" required/></td>
        </tr>
        <tr>
            <td>Submit</td>
            <td><input type="submit" name="submit" required/></td>
        </tr>
    </table>
</form>