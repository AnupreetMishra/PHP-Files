<?php
mysqli_query($con,"insert into attendance(emp_name,emp_id,email)values('$_POST[name]','$_POST[empId]','$_POST[Email]')");
?>