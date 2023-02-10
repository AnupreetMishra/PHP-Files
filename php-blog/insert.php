<form action="insert.php" method="post" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>

    <label for="favicon">Favicon:</label>
    <input type="file" id="favicon" name="favicon" accept="image/*">

    <input type="submit" value="Create Blog">
</form>


<?php
    if (isset($_POST['title'], $_POST['description'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["favicon"]["name"]);

        //validate and sanitize user input
        $title = filter_var($title);
        $description = filter_var($description);
        
        if (move_uploaded_file($_FILES["favicon"]["tmp_name"], $target_file)) {
            $favicon = $target_file;
        }
        $conn = new mysqli('localhost', 'root', '', 'php-blog');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO blogs (title, description,favicon) VALUES (?,?,?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $title, $description,$favicon);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            header("Location: fetch.php");
        } else {
            echo "Error adding blog";
        }
        
        $stmt->close();
        $conn->close();
    }
?>
