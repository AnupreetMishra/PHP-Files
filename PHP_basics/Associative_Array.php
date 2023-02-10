<?php
echo("This is associative array's examples <br>");
// access by index***********
$arr = array('Shubham','Anupreet','Mishra');
echo $arr[0];
echo"<br>"; 
echo $arr[1];
echo"<br>"; 
echo $arr[2];
echo"<br>";

//access by key and value ***********

$arr1 = array('Anupreet'=>23,
'Ankit'=>21,
'Anurag'=>22
);

foreach ($arr1 as $key => $value) {
     echo("<br> $value is the age of $key");
}

echo "This is multidimentional array";




?>