<?php
// $a = $_POST["name"];
// $b = $_POST["email"];
// $c = $_POST["password"];
// $d = $_POST["password"];

// echo $ "a";
// echo "<br>";
// echo $ "b";
// echo "<br>";
// echo $ "c";
// echo "<br>";
// echo $ "d";






// $name=$_POST["name"];  
 

// $email=$_POST["email"]; 


// $password=$_POST["password"];


// $conn = new mysqli('localhost','root','','form');
// if ($conn->connect_error){
//     die("Connection Failed:" .conn->connect_error)
// }
// else{
//     $stmt = $conn->prepare("insert into Login Form(name,email,password) values(?,?,?)");
//     $stmt->execute();
//     echo ("Login Successfully..");
//     $stmt->close();
//     $conn->close();

// }




// $conn = mysqli_connect("localhost","root", "test") or die("connection failed");
// $sql = "SELECT * FROM form";
// $result = mysqli_fetch($conn, $sql) or die("query failed");
// $row = mysqli_fetch_array($result);
// echo "<pre>";
// print_r($row);
// echo "</pre>;"
// echo $row[1] . "" . $row[2];



// $Servername = "localhost";
// $username = "root";
// $password = "";

// $conn =mysqli_connect($servername, $username, $password);
// if (!$conn){
//     die("sorry we failed to connect:" .mysqli_connect_error());
// }
// else{
//     echo "connection was successfull";
// }




// try{
    
        $name = $_POST['name'];
        $name = $_POST['email'];
        $name= $_POST['password'];
        
    
        $name = "localhost";
    
        $name = "root";
    
        $password = "";
    
        $db_name = "form";
    
        $conn = mysqli_connect($sname, $uname, $password, $db_name);
    
        if (!$conn) {
    
            die("Connection failed!".mysqli_connect_error());
    
        }
        else{
            echo "data base succesfully connected";
        }


        $sql2 = "INSERT INTO 'Login Form' (`name`, `email`, `password`) VALUES ('$email','$password','$name')";
        
      
      $myrequest=mysqli_query($conn,$sql2);

      if($myrequest){

        echo "successfully inserted";
      }
      else{
        echo "some error ".mysqli_error($conn);
      }


//      throw new Exception("Error Processing Request");
        
//     }
// catch(Exception $e)
// {
//     echo $e->getMessage();
// }

  

?>