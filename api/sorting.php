<?php

$conn = mysqli_connect("localhost", "root", "", "attendance_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sort_name = "ASC";
$sort_email = "ASC";
$sort_attendance = "ASC";

if (isset($_GET['sort_name']) && $_GET['sort_name'] == "ASC") {
    $sort_name = "DESC";
}
if (isset($_GET['sort_email']) && $_GET['sort_email'] == "ASC") {
    $sort_email = "DESC";
}
if (isset($_GET['sort_attendance']) && $_GET['sort_attendance'] == "ASC") {
    $sort_attendance = "DESC";
}


$query = "SELECT demo.emp_name, demo.email, COUNT(intab.attendance_status) as attendance_count FROM demo INNER JOIN intab ON demo.id=intab.staff_id GROUP BY demo.emp_name, demo.email ";

if (isset($_GET['sort_name']) && $_GET['sort_name'] == "ASC") {
    $query .= " ORDER BY emp_name ASC ";
}elseif(isset($_GET['sort_name']) && $_GET['sort_name'] == "DESC"){
    $query .= " ORDER BY emp_name DESC ";
}

if (isset($_GET['sort_email']) && $_GET['sort_email'] == "ASC") {
    $query .= " ORDER BY email ASC ";
}elseif(isset($_GET['sort_email']) && $_GET['sort_email'] == "DESC"){
    $query .= " ORDER BY email DESC ";
}

if (isset($_GET['sort_attendance']) && $_GET['sort_attendance'] == "ASC") {
    $query .= " ORDER BY attendance_count ASC ";
}elseif(isset($_GET['sort_attendance']) && $_GET['sort_attendance'] == "DESC"){
    $query .= " ORDER BY attendance_count DESC ";
}


$result = mysqli_query($conn, $query);

echo "<table>";
echo "<tr>";
echo "<th><a href='?sort_name=$sort_name'>Name</a></th>";
echo "<th><a href='?sort_email=$sort_email'>Email</a></th>";
echo "<th><a href='?sort_attendance=$sort_attendance'>Attendance Count</a></th>";
while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['emp_name'] ."</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['attendance_count'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>