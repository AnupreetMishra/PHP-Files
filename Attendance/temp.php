<?php
$con =mysqli_connect("localhost","root","","attendance_system");
$query = "select * from demo";
$run = mysqli_query($con,$query);
?>







<body style="background-image: linear-gradient(to right, #c6ffdd, #fbd786, #f7797d);">




    <div class="container">

            <form action="sdata.php" method="POST">


            <div class="select">
                <label class="label" for="">Please select your correct id:</label>
                
                <select name="id" required>

                  <option name="id" value=""></option>


                    <?php
            while($data = mysqli_fetch_array($run)){
                echo "<option value='$data[0]'>$data[1]<option/>";
            }
            ?>
                </select>
            </div>
                <br>




                <div class="dt">
                <label for="birthday">Date:</label>

                <select>
                    <input type="date" id="date" name="date">
                </select>

                </div>
                <br>




                <div class="sts">
                <label for="Status">Attendance Status:</label>
                <br>
                <select name="attendance_status" required>

                    <option name="attendance_status" value="">Status</option>
                    <option name="attendance_status" value="Absent">Absent</option>
                    <option name="attendance_status" value="Present">Present</option>


                </select>

                </div>
                <div class="btn">

                <div class="form-group mb-3">
                    <button type="submit" name="save_radio" class="btn btn-primary">Submit</button>
                
                </div>
                
                </div>
               
                
              

                



            </form>

    </div> 
    
    
    <style>
        .container{
            margin: 155px 373px 0 371px;
            width: 494px;
            position: absolute;
            padding: 61px 0 0 105px;
            background-color: bisque;
            height: 239px;
            border-radius: 21px,solid;
            border: 2px solid bisque;
            border-radius: 172px;
        }
        .select{
            position: absolute;
            margin: 0 0 0 32px;
            padding: 15px 0 15px 0px;
        }
        .dt{
            position: absolute;
            margin: 20px 0 0 32px;
            padding: 15px 0 15px 0px;
                }
        .sts{
                position: absolute;
                margin: 20px 0 0 32px;
                padding: 36px 0 15px 0px;
            }
        .btn{
            position: absolute;
            margin: 62px 0 0 17px;
            background: darksalmon;
            }
          



    </style>
</body>


