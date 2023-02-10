<!-- <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

   



<body>
   

<?php

// $con = mysqli_connect("localhost","root","","attendance_system");
 
 
 
// //   $page = $_GET["page"];
 
// //  if($page =="" || $page=="1"){
// //   $page1 = 0;

// // }else{
// //   $page1=($page*5)-5;
// // }
// // echo 'h';
// // die();

// // $res=mysql_query("select * from demo limit $page1,5");
// // while(mysql_fetch_array($res)){
// // echo data;
// // } 
    
   
   
   
   
   
// //    $a = $query_run/5;
// // $a =ceil($a);
// // echo "<br>"; echo "<br> $a";

// //        for($b=1;$b<=$a; $b++){
// //        





// // Retrieve the page number and items per page from the request
// $page = $_POST['page'];
// $itemsPerPage = $_POST['itemsPerPage'];



// // Calculate the offset and limit for the SQL query
// $offset = ($page - 1) * $itemsPerPage;
// $limit = $itemsPerPage;




// // Connect to the database (omitted for brevity)

// // Retrieve the data for the current page
// $query = "SELECT * FROM demo LIMIT $limit OFFSET $offset";
// $result = mysqli_query($conn, $query);




// // Return the data to the client
// $data = array();
// while ($row = mysqli_fetch_assoc($result)) {
//   $data[] = $row;
// }

// // Calculate the total number of items
// $totalItems = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM items"));

// // Return the data and total number of items to the client
// echo json_encode(array(
//   'data' => $data,
//   'totalItems' => $totalItems,
// ));








$array = [
  'key1' => 'value1',
  'key2' => 'value2',
  'key3' => 'value3',
];

$key = 'key2';

if (isset($array[$key])) {
  echo 'bye';
}

?>

   
</body>
</html> -->
