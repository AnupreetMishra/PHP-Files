<?php
include('db.php');
if(isset($_POST['submit'])){
    
    $username=$_POST['username'];
    $password=$_POST['password'];

    $res = mysqli_query($con,"select * from p_data where username='$username'");


    if(mysqli_num_rows($res)>0){
        $row = mysqli_fetch_assoc($res);
        $verify=password_verify($password,$row['password']);

        if($verify==1){
            $_SESSION['IS_LOGIN'] = true;
            $_SESSION['u_name']=$row['name'];
            header('Location: welcome.php');
            exit;

        }else{
            echo "Please Enter the correct Password";

        }
    }else{

        echo "Please Enter the Correct Username";

    }

    
    
}

?>
<h1>Login</h1>
<form method="post">
    <table>
        
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