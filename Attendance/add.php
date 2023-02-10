<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark YOur Attendance Please</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: linear-gradient(to right, #c6ffdd, #fbd786, #f7797d);>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <?php 
                    if(isset($_SESSION['status']))
                    {
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Welcome</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                         unset($_SESSION['status']);
                    }
                ?>

                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Add Employee Details</h4>
                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="">Employee Name</label>
                                <input type="text" name="name" class="form-control" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Employee Id</label>
                                <input type="text" name="empId" class="form-control" />
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" />
                            </div>

                           

                            


                            <div class="form-group mb-3">
                                <label for="">Gender</label> <br>
                                <input type="radio" name="gender" value="Male" /> Male
                                <input type="radio" name="gender" value="Female" /> Female
                            </div>



                            <!-- <div class="form-group mb-3">
                                <label for="">Attendance Status</label> <br>
                                <input type="radio" name="status" value="Present" /> Present
                                <input type="radio" name="status" value="Absent" /> Absent
                            </div> -->
                            <div class="form-group mb-3">
                                <button type="submit" name="save_radio" class="btn btn-primary">Submit</button>
                                <!-- <a href="index.php"><button type="show" name="show" class="btn btn-primary">Show Attendance</button></a> -->
                            </div>
                        </form>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>