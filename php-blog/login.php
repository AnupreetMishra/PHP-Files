<?php
    session_start();
    include('db.php');

    $id = $_POST["post_id"];
    $_SESSION["pid"] = $id;
    
    $_SESSION["cmnt"] = $_POST["comment"];

    if (isset($_POST["name"]) && isset($_POST["password"])) {
        $name = $_POST["name"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE name = '$name'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION["logged_in"] = true;
                $_SESSION["name"] = $name;
                header("Location: comment.php");
                // echo "success";
                exit;
            } else {
                echo "Incorrect name or password please register first";
            }
        } else {
            echo "Incorrect name or password";
        }
    }
    $conn->close();
?>

<form method="POST" action="login.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <br>
    <input type="submit" value="Login">
</form>
