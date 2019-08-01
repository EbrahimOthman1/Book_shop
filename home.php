<?php	
 include("conn.php");
 header('Content-Type: application/json');

 $image =isset( $_POST['image']) ? $_POST['image'] : '';
 $title =isset( $_POST['title']) ? $_POST['title'] : '';
 $rate =isset( $_POST['rate']) ? $_POST['rate'] : '';
 $auther =isset( $_POST['auther']) ? $_POST['auther'] : '';




 $image    = ($_POST['image']);
 $title    = ($_POST['title']);
 $rate     = ($_POST['rate']);
 $auther   = ($_POST['auther']);

 $sql = "SELECT  id ,image, title , rate ,auther  FROM book_shop";
 $result = mysqli_query($conn,$sql);
 $book = mysqli_fetch_all($result);

 $response = ['status' => 1 , 'info' => $book ];
  echo json_encode($response);


 ?>
