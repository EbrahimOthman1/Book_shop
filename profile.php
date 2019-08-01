<?php 
include('conn.php');
header('Content-Type: application/json');

$headers = apache_request_headers();

$token = $headers['Authorization'];

            $sql="SELECT  * FROM signup WHERE token = '$token' ;";

            $result=mysqli_query($conn,$sql);
           $users = mysqli_fetch_assoc($result);

           $response = ['status' => 1 , 'info' => $users ];
           echo json_encode($response);



 ?>