<?php
include('db.php');

function str_openssl_dec($str,$iv){
    $key = '123456!@#$%*&^';
    $chiper= "AES-128-CTR";
    // $ivLen=openssl_cipher_iv_length($chiper);
    
    $options=0;
    $str = openssl_decrypt($str,$chiper,$key,$options,$iv);
    return $str;
}
$res = mysqli_query($con,"select * from s_data order by id desc");

echo "<table border='1'>";
        echo "<tr><td>Id</td><td>Name</td><td>Email</td></tr>";
        while($row=mysqli_fetch_assoc($res)){

            $iv= hex2bin($row['iv']);
            $name = str_openssl_dec($row['name'],$iv);
            $email = str_openssl_dec($row['email'],$iv);
            echo "<tr><td>".$row['id']."</td><td>".$name."</td><td>".$email."</td></tr>";
        }

echo "</table>"        
?>