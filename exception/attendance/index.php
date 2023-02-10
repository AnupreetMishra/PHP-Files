<?php

include("db.php");
include("header.php");
   $flag=0;
   $update=0;
  if(isset($_POST['submit'])) 
   {
        $date = date("Y-m-d");

        $records = mysqli_query($con,"select * from attendance_records where date='$date';");
        $num = mysqli_num_rows($records);
        
        if($num)
        {

            foreach($_POST['attendance_status'] as $id=>$attendance_status)
            { 

                $emp_name = $_POST['emp_name'][$id];
                $emp_id = $_POST['emp_id'][$id];
                

                
                mysqli_query($con,"update attendance_records set emp_name='$emp_name',emp_id='$emp_id',attendance_status='$attendance_status',date='$date' where date='$date'");

                if($result)
                {
                    $update = 1;
                }
                


            }


        }
        else
        {



            foreach($_POST['attendance_status'] as $id=>$attendance_status)
            { 

                $emp_name = $_POST['emp_name'][$id];
                $emp_id = $_POST['emp_id'][$id];
                $date = date("Y-m-d H:i:sa");

                
                $result=mysqli_query(
                    $con,
                    "INSERT INTO `attendance_records` (`emp_name`, `emp_id`, `attendance_status`, `date`) VALUES ('$emp_name', '$emp_id', '$attendance_status', '$date')"
                );

                if($result)
                {
                    $flag = 1;
                }
                


            }

        }    


    
    }
   

 



?>


<div class="panel panel-default">

         <div class="panel panel-heading">
            <h2>   
            <a href="add.php" class="btn btn-success"> Add Employee</a>
            <a href="view_all.php" class="btn btn-info pull-right"> View All</a>
            </h2>

            <?php if($flag){?>

            <div class="alert alert-success">
                Attendance Date Inserted successfully
            </div>
            <?php } ?>


            <?php if($flag){?>

            <div class="alert alert-success">
                Attendance updated  successfully
            </div>
            <?php } ?>

             <h3><div name='date' class="well text-center">Date:<?php echo date("Y-m-d");?></div></h3>

            <div class="panel panel-body">
                <form action="index.php" method="POST">
                    <table class="table table-striped">
                      <tr>  
                      <th>#Serial Number</th><th>Employee Name</th><th>Employee Id</th><th>Attendance Status</th>
                      </tr>
                        <?php $result=mysqli_query($con,"select * from attendance");
                            $serialnumber = 0;
                            $counter = 0;
                            while($row=mysqli_fetch_array($result))
                            {
                                $serialnumber++;

                        ?>
                                  <tr>
                                 <td><?php echo $serialnumber; ?></td>
                                 <td><?php echo $row['emp_name']; ?>
                                 <input type="hidden" value="?php echo $row['emp_name']; ?>" name="emp_name[]">
                                </td>
                                 
                                 <td><?php echo $row['emp_id']; ?>
                                 <input type="hidden" value="?php echo $row['emp_id']; ?>" name="emp_id[]">
                                </td>
                                 <td>
                                    <input type="radio" name="attendance_status[<?php echo $counter;?>]" value="Present" 
                                     <?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Present" ){
                                        echo "checked=checked";
                                     }
                                     ?>
                                    
                                    required >Present
                                    <input type="radio" name="attendance_status[<?php echo $counter;?>]" value="Absent"
                                    <?php if(isset($_POST['attendance_status'][$counter]) && $_POST['attendance_status'][$counter]=="Absent" ){
                                        echo "checked=checked";
                                     }
                                     ?>
                                    required>Absent
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