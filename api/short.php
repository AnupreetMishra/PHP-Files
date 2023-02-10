<?php

// Connect to database
$conn = mysqli_connect("localhost", "root", "", "attendance_system");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sort = "ASC";

if (isset($_GET['sort']) && $_GET['sort'] == "ASC") {
    $sort = "DESC";
}
// $query = "SELECT demo.emp_name, demo.email, COUNT(intab.attendance_status) as attendance_count FROM demo INNER JOIN intab ON demo.id=intab.staff_id GROUP BY demo.emp_name, demo.email ORDER BY attendance_count $sort, emp_name $sort, email $sort";
// $query = "SELECT demo.emp_name, demo.email, COUNT(intab.attendance_status) as attendance_count FROM demo INNER JOIN intab ON demo.id=intab.staff_id GROUP BY demo.emp_name, demo.email ORDER BY emp_name $sort, email $sort, attendance_count $sort";
$query = "SELECT demo.emp_name, demo.email, COUNT(intab.attendance_status) as attendance_count FROM demo INNER JOIN intab ON demo.id=intab.staff_id GROUP BY demo.emp_name, demo.email ORDER BY emp_name $sort, email $sort, attendance_count $sort";
$result = mysqli_query($conn, $query);


echo "<table>";
echo "<tr>";
echo "<th><a href='?sort=$sort'>Name</a></th>";
echo "<th><a href='?sort=$sort'>Email</a></th>";
echo "<th><a href='?sort=$sort'>Attendance Count</a></th>";
echo "</tr>";

while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['emp_name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['attendance_count'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>