<?php




header('Accesss-control-Allow-Method: POST');
header('content-Type:application/json');
header('Accesss-control-Allow-origin:*');
header('Accesss-control-Allow-Headers: Content-Type, Access-control-Allow-Headers, Authorization, X-Request-With');

// include('function.php');
$requestMethod = $_SERVER["REQUEST_METHOD"];



// $token=$_SERVER['token'];
// $token = 'token';
// $value = 'hello';

// $array[$token] = $value;
// $token = 'hello';


// if ($token === 'hello') {
//     // the token is correct, so execute the code
//     $employeeData = getEmployeeData();
//     echo $employeeData;
// } else {
//     // the token is incorrect, so show an error
//     echo 'Error: Invalid token';
// }

$token = 'hello';
$headers = getallheaders();
$token = $headers['token'];



if ($token=="hello" && $requestMethod == "POST") {
  // $employeeData = getEmployeeData();
  // echo $employeeData;
  include('count.php');
    
} 
else {
  
  http_response_code(401);
  echo "Error: Invalid token";
}



// $token = $_SERVER['HTTP_AUTHORIZATION'];
// if ($token == 'hello') {
  
//   } else {
//   return json_encode(array('error' => 'Invalid token'));
//   }




// if($requestMethod == "POST"){
    
//     $employeeData = getEmployeeData();
//     echo $employeeData;

// }else{
//     $data=[
//         'status' => 405,
//     'message' => $requestMethod. ' Method Not Allowed',
//     ];

//     header("HTTP/1.0 405 Method Not Allowed");
//     echo json_encode($data);
    

// }




?>