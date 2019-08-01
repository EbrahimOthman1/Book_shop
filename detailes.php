<?php	
 include("conn.php");
 header('Content-Type: application/json');

 $id=$_GET['id'];
 $sql = "SELECT book_shop.image ,book_shop.title ,book_shop.rate,book_shop.description, book_shop.category , book_shop.publisher_at ,auther.name ,auther.description , auther.age ,auther.image_path FROM book_shop INNER JOIN auther ON book_shop.auther_id = auther.id  Where book_shop.id = $id ";
  // $query = "SELECT book_shop.image ,book_shop.title , auther_id = $id"
 $result = mysqli_query($conn,$sql);
 $detailes = mysqli_fetch_all($result);

 $response = ['status' => 1 , 'info' => $detailes ];
  echo json_encode($response);


 ?>