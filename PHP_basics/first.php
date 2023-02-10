
<?php

// $age = 67;


// if ($age<25){
//     echo " You cant drive ";
    
// }
// elseif ($age>25 && $age<65){
//     echo "you can drive";
    
// }
// else{
//     echo "you cant";
    
// }

/*
$i = 0;
while ($i<5){
    echo $i+1;
    echo "<br>";
    $i++;
}


///
$x=1;
do{
    echo "The number is :$x<br>";
    $x++;
}while ($x<=5);


///

for ($x=0; $x<=10;$x++){
    echo "$x <br>";
}


$color = array("blue","black","green");
foreach($color as $value){
    echo "$value <br>";
}

*/
// function
//  function processMarks($arrMarks){
//     $sum = 0;
//     foreach($arrMarks as $value){
//         $sum = $sum+$value;
//     }
//     return $sum;
//  }

//  $anupreet = [72,73,74,75,76];
//  $harry =[81,82,83,84,89];
//  $sumMarks = processMarks($anupreet);
//  $sumMarksH = processMarks($harry);
//  echo "Total marks of Anupreet:$sumMarks<br>"; 
//  echo "Total marks of Harry:$sumMarksH";



// $conn = mysqli_connect("localhost","root", "test") or die("connection failed");
// $sql = "SELECT * FROM form";
// $result = mysqli_fetch($conn, $sql) or die("query failed");
// $row = mysqli_fetch_array($result);
// echo "<pre>";
// print_r($row);
// echo "</pre>;"
// echo $row[1] . "" . $row[2];


// ********functions***************

function writeMsg(){
    echo("Hello this is my function for sum of marks <br>");
}

writeMsg();

// SUM OF MARKS*********
echo("Sum of students marks <br>");

function sumMarks($student_marks){
    $sum = 0;
    foreach($student_marks as $value){
        $sum +=$value;

    }
    return $sum;
}
$Rohit = [20,20,20];
$student_marks = sumMarks($Rohit);
echo("Total marks scored by Rohit out of 100 is $student_marks <br>");

$Shravan = [43,25,29];
$student_marks = sumMarks($Shravan);
echo("Total marks scored by Shravan out of 100 is $student_marks<br>");

// PRINT FRIENDS NAME******************

function friendsNames($f_names){
    echo("$f_names");

}
friendsNames("Akash<br>");
friendsNames("Ankit<br>");
friendsNames("Aman<br>");



//AVERAGE CALCULATOR**************
function avgMarks($total_marks){
    $sum = 0;
    $i = 1;
    foreach($total_marks as $value){
        $sum += $value;
        $i++;
    }
    return $sum/$i;
}

$mohit = [99,98,93,94,17,100];
$total_marks = avgMarks($mohit);
echo("Average marks scored by Rohit out of 600 is $total_marks <br>");

$rohan = [77,76,75,85,95];
$total_marks = avgMarks($rohan);
echo("Average marks scored by Rohan is $total_marks <br>");





?> 
