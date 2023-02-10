<?php
$con = mysqli_connect("localhost","root","","attendance_system");





function getEmployeeData(){

    global $con;

    


//     $page = $_POST['page'];
//     $itemsPerPage = $_POST['itemsPerPage'];

    

//     $offset = ($page - 1) * $itemsPerPage;
//     $limit = $itemsPerPage;

//     $limit_per_page = 2;
//     $page ="";
// if(isset($_POST["page_no"])){
//     $page = $_POST["page_no"];
// }
// else{
//     $page = 1;
// }

// $offset = ($page - 1) * $limit_per_page;

if(@$_GET["page"]&& @$_GET["row_per_page"]){
    $page=$_GET["page"];
    $row_per_page=$_GET["row_per_page"];
    $begin = ($page*$row_per_page)-$row_per_page;

}




    


    
                                
                                
     $date = $_POST['date'];
                               
    // $json = file_get_contents('php://input');
    // $mydate = json_decode($json);
    // $mydate = isset($_POST["date"]);
    $query = "SELECT intab.date, intab.attendance_status, demo.emp_name
            FROM demo
            INNER JOIN intab ON intab.staff_id=demo.id WHERE date='$date' LIMIT {$begin},{$row_per_page}";
    $query_run = mysqli_query($con,$query);
    print_r($_POST);
    print_r($_SERVER);
                                

    //die;

    if($query_run){

        if(mysqli_num_rows($query_run)>0){

            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);

            $data=[
                'status' => 200,
            'message' => 'Data fetched successfully',
            'data' => $res
            ];
    
            header("HTTP/1.0 200 Data fetched successfully");
            return json_encode($data);

        }else{

            $data=[
                'status' => 404,
            'message' => 'No Record Found',
            ];
    
            header("HTTP/1.0 404 No Record Found");
            return json_encode( $data);


        }

    }else{
        $data=[
            'status' => 500,
        'message' => 'Internal Server Error',
        ];

        header("HTTP/1.0 500 Internal Server Error");
        return json_encode($data);
    }

}




 

 


?>