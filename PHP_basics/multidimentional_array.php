<?php
// echo "This is multidimentional ";
// // var_dump("hii");
// $arr= array(1,23,4);
// echo count($arr);

$multiDim = array(
    array(5,8,11,14),
    array(7,10,13,16),
    array(9,12,18,18));
    
for ($i=0; $i < count($multiDim); $i++) {
    for ($j=0; $j < count($multiDim[$i]); $j++) {
        echo $multiDim[$i][$j];
        echo " ";
    } 

    echo "<br>";
}

?>