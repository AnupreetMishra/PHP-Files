
<?php

include("db.php");
include("header.php");

?>


<div class="panel panel-default">

         <div class="panel panel-heading">
            <h2>   
            <a href="add.php" class="btn btn-success"> Add Employee</a>
            <a href="index.php" class="btn btn-info pull-right">Back</a>
            </h2>

            


            <div class="panel panel-body">
                <form action="" method="POST">
                    <table class="table table-striped">
                      <tr>  
                      <th>#Serial Number</th><th>Employee Name</th><th>Employee Id</th><th>Attendance Status</th>
                      </tr>
                        <?php $result=mysqli_query($con,"select * from attendance_records where date='$_POST[date]'");
                            $serialnumber = 0;
                            $counter = 0;
                            while($row=mysqli_fetch_array($result))
                            {
                                $serialnumber++;

                        ?>
                                  <tr>
                                 <td><?php echo $serialnumber; ?></td>
                                 <td><?php echo $row['emp_name']; ?>
                                </td>
                                 
                                 <td><?php echo $row['emp_id']; ?>
                                </td>
                                 <td>
                                    <input type="radio" name="attendance_status[<?php echo $counter;?>]" 
                                    <?php if($row['attendance_status']=="Present") 
                                     echo "checked=checked";?>
                                    value="Present">Present
                                    <input type="radio" name="attendance_status[<?php echo $counter;?>]" 
                                    <?php if($row['attendance_status']=="Absent") 
                                     echo "checked=checked";?>
                                    value="Absent">Absent
                                 </td>
                                 </tr>

                            <?php
                              $counter++;

                            }
                            ?>

                    
                    </table>
                    <input type="submit" name="submit" value="submit" class="btn btn-primary">
                </form>

            </div>
        </div>


</div>