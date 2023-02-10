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
                
                    <table class="table table-striped">
                      <tr>  
                      <th>Serial Number</th>  <th>Dates</th> <th>Show All Attendance</th> 
                    
                      </tr>
                        <?php $result=mysqli_query($con,"select distinct created_at from attendance_records");
                            $serialnumber = 0;
                            
                            while($row=mysqli_fetch_array($result))
                            {
                                $serialnumber++;

                        ?>
                                  <tr>
                                 <td><?php echo $serialnumber; ?></td>
                                 <td><?php echo $row['created_at']; ?></td>
                                 <td>
                                    <form action="show_attendance.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['created_at'] ?>" name="created_at">
                                        <input type="submit" value="Show Attendance" class="btn btn-primary">
                                    </form>
                                 </td>
                                 
                                 
                                 
                                 </tr>

                            <?php
                              

                            }
                            ?>

                    
                    </table>
                

            </div>
        </div>


</div>