<?php
include("header.php");
include("db.php");
      

      $flag = 0;
        if(isset($_POST['submit']))
        {
           $result=mysqli_query($con,"insert into attendance(emp_name,emp_id,email)values('$_POST[name]','$_POST[empId]','$_POST[Email]')");
           if($result){
            $flag = 1;
           }

        }

?>


<div class="panel panel-default">

    <?php if($flag){ ?>
    <div class="alert alert-success">
        <strong>Employee Details is successfully insert</strong>
    </div>

    <?php } ?>
    
    <div class="panel-heading">
        <h2>
            <a href="add.php" class="btn btn-success">Add Employee</a>
            <a href="index.php" class="btn btn-info pull-right">Back</a>
        </h2>
    </div>

    <div class="panel-body">
        <form action="add.php" method="POST">
              <div class="form-group">
                 <label for="name">Employee Name</label>
                 <input type="text" name="name" id="name" class="form-control" required>
              </div> 
              
              <div class="form-group">
                 <label for="empId">Employee Id</label>
                 <input type="text" name="empId" id="empId" class="form-control" required>
              </div> 


              <div class="form-group">
                 <label for="Email">Email</label>
                 <input type="email" name="Email" id="Email" class="form-control" required>
              </div>
              <!-- <div class="form-group">
                   <label for="gender">Choose your gender:</label>

                    <select name="gender" id="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>

                </div>     -->
              

              <div class="form-group">
                 
                 <input type="submit" name="submit" value="submit" class="btn btn-primary" required>
              </div> 

        </form>
    </div>
</div>
