<?php


include('db.php');

// if (!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
    //     header("Location: login.php");
    //     exit;
    // }
    
    // if (isset($_POST["post_id"]) && isset($_POST["comment"])) {
    session_start();
    $post_id = $_SESSION["pid"];
    $comment = $_SESSION["cmnt"];
    die("hi".$_SESSION["pid"]);

    $stmt = $conn->prepare("INSERT INTO comments (post_id, comment) VALUES (?, ?)");
    $stmt->bind_param("is", $post_id, $comment);
    if($stmt->execute()){
        echo "New comment added successfully";
    }else{
        echo "Error: " . $conn->error;
    }
// }
$conn->close();



    // include('db.php');

    // if (isset($_POST["post_id"]) && isset($_POST["comment"])) 
    // {
    //     $post_id = $_POST["post_id"];
    //     $comment = $_POST["comment"];
        
    //     // prevent sql injection by using prepared statements 
    //     $stmt = $conn->prepare("INSERT INTO comments (post_id, comment) VALUES (?, ?)");
    //     $stmt->bind_param("is", $post_id, $comment);
    //     if($stmt->execute()){
    //         echo "New comment added successfully";
    //     }else{
    //         echo "Error: " . $conn->error;
    //     }
    // }
    // $conn->close();
?>    