<?php
   include('db.php');

    //Retrieve all blog post details
    $sql = "SELECT post_id, title, favicon FROM blogs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $post_id = $row["post_id"];
            $title = $row["title"];
            $favicon = $row["favicon"];
            
            echo '<div class="post">
                    <div class="post-favicon">
                        <img src="'.$favicon.'" width="50px" height="50px">
                    </div>
                    <div class="post-title">
                        <a href="title-click.php?post_id='.$post_id.'">'.$title.'</a>
                    </div>
                </div>';
        }
    } else {
        echo "No results found.";
    }
    $conn->close();
?>

