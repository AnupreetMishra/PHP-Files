<?php

$insert = false;
$update = false;
$delete = false;
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'crud_db';

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die('Sorry we failed to connect' . mysqli_connect_error());
}
if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `notes` WHERE `sno` = $sno";
    $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        //update the note
        $sno = $_POST['snoEdit'];
        $title = $_POST['titleEdit'];
        $description = $_POST['descriptionEdit'];

        //insert query for data inert by user***

        $sql = "UPDATE `notes` SET `title` = '$title' , `description` = '$description' WHERE `notes`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo 'We could not update your note successfully';
        }
    } else {
        $title = $_POST['title'];
        $description = $_POST['description'];

        //insert query for data inert by user***

        $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title ', '$description ')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            //echo "The record has been  inserted successfully<br> ";
            $insert = true;
        } else {
            echo 'The record has not inserted successfully because of this error ---> ' .
                mysqli_error($conn);
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Notes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">My Notebook</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact Us</a>
          </li>

        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- If DATA INSERTED THEN ALERT -->
  <?php if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show'role='alert'>
  <strong>Success!</strong> Your Note has been added successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
</div";
} ?>


  <?php if ($update) {
  echo "<div class='alert alert-success alert-dismissible fade show'role='alert'>
  <strong>Success!</strong> Your Note has been updated successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
</div";
} ?>


  <?php if ($delete) {
  echo "<div class='alert alert-success alert-dismissible fade show'role='alert'>
  <strong>Success!</strong> Your Note has been deleted successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>
  </button>
</div";
} ?>


  <div class="container">

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document"">
      <div class=" modal-content">
        <div class="modal-header">
          <h5 class="modal-title fs-5" id="editModalLabel">Edit Your Note</h5>
          <!-- <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"> -->
          </button>
        </div>
        <div class="container">
          <form class="form" action="/Crud/index.php" method="POST">
            <div class="modal-body">

              <input type="hidden" name="snoEdit" id="snoEdit">
              <div class="mb-3">
                <label for="title">Note Title</label>
                <input type="text" class="form-control" name="titleEdit" id="titleEdit" aria-describedby="emailHelp">

              </div>
              <div class="mb-3">
                <label for="desc">Note Description</label>
                <textarea class="form-control" name="descriptionEdit" id="descriptionEdit" rows="3"></textarea>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>









  <div class="container my-5">
    <h2>Add Notes</h2>
    <form action="/Crud/index.php?update=true" method="POST">
      <div class="mb-3">
        <label for="title">Note Title</label>
        <input type="text" class="form-control" name="title" id="title" aria-describedby="textHelp">

      </div>
      <div class="mb-3">
        <label for="descripton">Note Description</label>
        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Add Note</button>
    </form>
  </div>

  <div class="container my-5">



    <table class="table" id="myTable">

      <thead>

        <tr>

          <th scope="col">S.No</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
      </thead>

      <tbody>

        <!-- QUERY FOR REAULT WHICH IS INSERTED BY USER -->
        <?php
        $sql = 'SELECT * FROM `notes`';
        $result = mysqli_query($conn, $sql);
        $sno = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            echo "<tr>
          <th scope='row'>" .
                $sno .
                "</th>
          <td>" .
                $row['title'] .
                "</td>
          <td>" .
                $row['description'] .
                "</td>
          <td> <button  class='delete btn btn-sm btn-primary' id=d" .
                $row['sno'] .
                ">Delete</button> <button  class=' edit btn btn-sm btn-primary' id=" .
                $row['sno'] .
                ">Edit</button> </td>
        </tr>";
        }
        ?>


      </tbody>
    </table>


  </div>
  <hr>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>

  <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit",);
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;

        console.log(title, description);
        titleEdit.value = title;
        descriptionEdit.value = description;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })


    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit",);
        sno = e.target.id.substr(1,);

        if (confirm("Press a button!")) {
          console.log("Yes");
          window.location = `/Crud/index.php?delete=${sno}`;
        }
        else {
          console.log("No");
        }

      })
    })
  </script>

  <style>
    body {
      background-color: lightblue;
    }

    .form {
      margin: 100px 114px 0 117px;
    }

    .delete {
      margin: 0px 0px 9px 0px;
    }

    .edit {
      width: 61px;
    }
  </style>



</body>

</html>