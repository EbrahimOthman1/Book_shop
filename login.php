<?php 
include('conn.php');
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
  
  $email =isset( $_POST['email']) ? $_POST['email'] : '';
  
  $password = isset($_POST['password']) ? $_POST['password'] : '';

  if(empty($email) || empty($password)){
      $response=['status' => 0 , 'message' => ' Fill the blank '];
      echo json_encode($response);
      die();
  }
  else{

      $sql="SELECT  * FROM signup WHERE email='$email' and password ='$password'";

      $result=mysqli_query($conn,$sql);
      $users = mysqli_fetch_assoc($result);
      $token = $users['token'];

      if ($users) {
          $response = ['status'=> 1 , 'message' => 'Login successful',  'token'=>$token];
          echo json_encode($response);
      }
      else {
        $response=['status' => 0 , 'message' => 'Wrong Email or password !'];
        echo json_encode($response);
      }
  }
?>
          