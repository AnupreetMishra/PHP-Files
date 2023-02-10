<?php
    include('db.php');
    // include('fetch.php');
    
    // Check if the form is submitted
    if (isset($_POST["post_id"]) && isset($_POST["user"]) && isset($_POST["comment"])) {
        $post_id = $_POST["post_id"];
        $user = $_POST["user"];
        $comment = $_POST["comment"];

        $sql = "INSERT INTO comments (post_id, user, comment)
                VALUES ('$post_id', '$user', '$comment')";

        if ($conn->query($sql) === TRUE) {
            echo "Comment added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    // Check if the post_id is set
    if(isset($_GET["post_id"])) {
        $post_id = $_GET["post_id"];
        
        
        //Retrieve post details
        $sql = "SELECT description, favicon FROM blogs WHERE post_id = ".$post_id;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                
                $description = $row["description"];
                $favicon = $row["favicon"];
                
                echo '<div class="post">
                        <div class="post-favicon">
                            <img src="'.$favicon.'" width="50px" height="50px">
                        </div>
                        
                        <div class="post-description">
                            <p>'.$description.'</p>
                        </div>
                    </div>';
                    echo '<div class="post-interaction">
                            <div class="like-section">
                                <a href="#">Like</a>
                            </div>
                            <div class="comment-section">
                                <a id="comment" name="cmt" href="#">Comments</a>
                            </div>
                          </div>';
            }
        } else 
        {
           echo "No post found with id ".$post_id;
        }

        if(isset($_GET["post_id"])) {
            $post_id = $_GET["post_id"];
            session_start();
        $_SESSION['id']=$post_id;
            //Retrieve post details
            $sql = "SELECT description, favicon FROM blogs WHERE post_id = ".$post_id;
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
    
                    $favicon = $row["favicon"];
    
                    // Retrieve comments for the post
                    $sql = "SELECT comment FROM comments WHERE post_id = ".$post_id;
                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            
                            $comment = $row["comment"];
                            echo '<div class="comment">
                                    <div class="comment-user-favicon">
                                      <img src="'.$favicon.'" width="50px" height="50px">
                                    </div>
                                    
                                    <div class="comment-text">
                                        <p>'.$comment.'</p>
                                    </div>
                                  </div>';
                        }
                    } else {
                        echo "No comments found for post with id ".$post_id;
                    }
                }
            } else {
                echo "No post found with id ".$post_id;
            }
        }



}
   
?>

<form method="POST" action="login.php">

    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment"></textarea>
    <input type="" name="post_id" value="<?=$post_id?>">
    <input type="submit" value="Add Comment">

</form>
<!-- <script src="jquery-3.6.1.min.js"></script>
<script>

$(document).ready(function() {
  $('.comment-section #comment').on('click', function(e) {
    e.preventDefault();
    $.ajax({
      url: 'comment-section.php',
      type: 'GET',
      success: function(data) {
        $('.comment-section').append(data);
        $('#comment-form').on('submit', function(e) {
          e.preventDefault();
          var formData = $(this).serialize();
          $.ajax({
            url: 'submit-comment.php',
            type: 'POST',
            data: formData,
            success: function(response) {
              // handle success
            },
            error: function() {
              // handle error
            }
          });
        });
      },
      error: function() {
        // handle error
      }
    });
  });
});





</script> -->






