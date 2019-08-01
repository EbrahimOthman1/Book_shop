<?php 
include("conn.php");
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
$firstname = $lastname = $email = $password = $mobile = '';
if(count($_POST)>0){
	    	
   if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['mobile'])){
    $response = ['status'=> 0 , 'message' => 'Enter Data'];
    echo json_encode($response);
     die ();
    }
        
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    	$response = ['status'=> 0 , 'message' => 'Email must be a valid email address'];
      	echo json_encode($response);
        die();
    }
    else{
     	$sql_email_check = ("SELECT COUNT(*) AS k FROM signup WHERE email ='$email'");
        $result=mysqli_query($conn,$sql_email_check);
        $row = mysqli_fetch_assoc($result);
            if($row['k']>0){
              	$response = ['status' => 0 , 'message' => 'Email is already exists'];
               	echo json_encode ($response);
               	die();
            }
    }
    $mobile = ($_POST['mobile']);
    if (strlen($mobile) != 11 ){
       	$response = ['status' => 0 ,'message' => 'the number must be 11 digit'];
        echo json_encode($response);
      	die();
  	}
           	
        if( $mobile[0] != 0 && $mobile[1] != 1){
            $response = ['status' => 0 , 'message' => 'The number must start with 01 '];
            echo json_encode ($response);
            die();
      	}
           	 

    $firstname  = ($_POST['firstname']); 
	$lastname   = ($_POST['lastname']);
	$email      = ($_POST['email']);
	$password   = ($_POST['password']);
	$mobile     = ($_POST['mobile']);
		

$token = bin2hex(openssl_random_pseudo_bytes(10));

$sql = "INSERT INTO signup (firstname,lastname,email,password,mobile,token) VALUES ('$firstname','$lastname','$email','$password','$mobile','$token')";

	if(mysqli_query($conn,$sql)){
	$response = ['status'=> 1 , 'message' => 'Congratulations. Now you have email'];
	echo json_encode($response);
	}
}
?>
