<?php


$conn = mysqli_connect("localhost", "root", "","attendance_system");


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(@$_GET["page"]&& @$_GET["row_per_page"]){
    $page=$_GET["page"];
    $row_per_page=$_GET["row_per_page"];
    $begin = ($page*$row_per_page)-$row_per_page;}



        // $mydate = $_POST['date'];
        // $sql = "SELECT emp_name FROM demo, INNER JOIN intab ON intab.staff_id=demo.id SUM(CASE WHEN attendance_status = 'present' THEN 1 ELSE 0 END) as days_present FROM intab GROUP BY employee_id, MONTH(date) LIMIT {$begin},{$row_per_page} ";
        
        
        
        $sql = "SELECT demo.emp_name, COUNT(intab.attendance_status) as 'Days Present'
                    FROM demo
                    INNER JOIN intab ON demo.id=intab.staff_id
                    WHERE  intab.attendance_status=' Present '
                    GROUP BY demo.emp_id
                    HAVING COUNT(intab.attendance_status) >=2 LIMIT {$begin},{$row_per_page}";
        
        $result = mysqli_query($conn, $sql);

        
        $employee_data = array();

        
        while($row = mysqli_fetch_assoc($result)) {
        $employee_data[] = $row;
        }

        
        echo json_encode($employee_data);

    
        mysqli_close($conn);

?>
