<?php
include("api.php");
// $token = $_SERVER['hello'];
// if ($token == 'hello') {
//     $response = file_get_contents('http://localhost/api/api.php');
//     print_r($response);
  
//   } else {
//   return json_encode(array('error' => 'Invalid token'));
//   }
$token ='hello';

  if ($token == 'hello') {
    $api_url = 'http://localhost/api/api.php';
    $headers = array('Content-Type: application/json');


    
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);


curl_close($ch);



  }  
  
  else {
    return json_encode(array('error' => 'Invalid token'));
    }
?>