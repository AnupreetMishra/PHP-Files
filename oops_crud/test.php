<?php
include('database.php');

$obj = new query();
$conditionArr=array('id'=>1,'name'=>'Anupreet');
$result = $obj->getData('user');
echo '<pre>';
print_r($result);
?>