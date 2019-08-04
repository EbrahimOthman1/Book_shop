<?php
// Include config file
Include "conn.php";
 
// Define variables and initialize with empty values
$title = $rate = $published_at  = $image_path = $author_name = $price = $description =  "";
$title_err = $rate_err = $published_at_err = $image_path_err = $author_name_err = $price_err = $description_err = "";
 
 if(isset($_POST["insert"])){
// Processing form data when form is submitted
//if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate title
    $input_title = trim($_POST["title"]);
    if(empty($input_title)){
        $title_err = "Please enter a title.";
    } elseif(!filter_var($input_title, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $title_err = "Please enter a valid title.";
    } else{
        $title = $input_title;
    }
    
     // Validate rate
    $input_rate = trim($_POST["rate"]);
    if(empty($input_rate)){
        $rate_err = "Please enter an rate.";     
    } else{
        $rate = $input_rate;
    }

     //Validate salary
     $input_published_at = trim($_POST["published_at"]);
    if(empty($input_published_at)){
        $published_at_err = "Please enter the date.";     
    } 
     //elseif(!ctype_digit($input_published_at)){
    //     $published_at_err = "Please enter the valied date.";
    // } 
        else{
        $published_at = $input_published_at;
    }

      // validate image_path
     $input_image_path = trim($_POST["image_path"]);
    if(empty($input_image_path)){
        $image_path_err = "Please enter image_path.";     
    } else{
        $image_path = $input_image_path;
    }
    //    // validate auther_name
     $input_author_name = trim($_POST["author_name"]);
    if(empty($input_author_name)){
        $author_name_err = "Please enter author_name.";     
    } else{
        $author_name = $input_author_name;
    }
     // validate price
     $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter the price.";     
    } elseif(!ctype_digit($input_price)){
        $price_err = "Please enter the valied price.";
    } else{
        $price = $input_price;
    }
      //validation description
     $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter description.";     
    } else{
        $description = $input_description;
    }
    

    
    
    // Check input errors before inserting in database
    if(empty($title_err) ||  empty($rate_err) || empty($published_at_err) || empty($image_path) || empty($auther_name_err) || empty($price_err) || empty($description_err)){
        // Prepare an insert statement
    $title         = ($_POST['title']); 
    $rate          = ($_POST['rate']);
    $published_at  = ($_POST['published_at']);
    $image_path    = ($_POST['image_path']);
    $author_name   = ($_POST['author_name']);
    $price         = ($_POST['price']);
    $description   = ($_POST['description']);
    $category      = ($_POST['category']);

        
        $sql = "INSERT INTO books (title, rate, published_at ,image_path ,author_name ,price ,description,category) VALUES ('$title','$rate','$published_at','$image_path' ,'$author_name','$price','$description','$category')";
         if(mysqli_query($conn,$sql)){
      header("location: crud.php");
         }

        // $users = mysqli_fetch_assoc($result);
         

    //     if(mysqli_query($conn,$sql)){
    // $response = ['status'=> 1 , 'message' => 'Congratulations. Now you have email'];
    // echo json_encode($response);
    // }
         
        // if($stmt = mysqli_prepare($conn, $sql)){
        //     // Bind variables to the prepared statement as parameters
        //     mysqli_stmt_bind_param($stmt, "sss", $param_title, $param_rate, $param_published_at ,$param_image_path,$param_auther_name,$param_price ,$param_description);
            
        //     // Set parameters
        //     $param_title = $title;
        //     $param_rate = $rate;
        //     $param_published_at = $published_at;
        //     $param_image_path =$image_path;
        //     $param_auther_name =$auther_name;
        //     $param_price = $price;
        //     $param_description=$description;
            
        //     // Attempt to execute the prepared statement
        //     if(mysqli_stmt_execute($stmt)){
        //         // Records created successfully. Redirect to landing page
        //         header("location: crud.php");
        //         exit();
        //     } else{
        //         echo "Something went wrong. Please try again later.";
        //     }
        // }
         
    }
    
   }
//}
?>  
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">
       
        .wrapper{
            width: 500px;
            font-size: 15px;
            margin: 0 auto;
            /*background-color: #008080   ;*/
            border-radius: 12px;
        }
        .box{
            background: #563af;
            padding: 10px;
            width: 230px;
            height: 40px;
            border:solid;
            font-size: 15px;
            /*box-shadow: 0 5px 25px rgba(0,0,0,.5);*/
        }
      
      /*.ss{
        border-top: 1px solid black;
        border-bottom: : 1px solid black;
        border-right: : 1px solid black;
        border-left: 1px solid black;

      }*/
      legend{
        text-align: center;
        padding-bottom: 10px;
        font-weight: bold;
        font-style: italic;
      }
    </style>
</head>
<body >
    <div class="wrapper ss">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                    </div>
                    <form action="create.php" method="POST">
                          <fieldset>
                              <legend>ADD BOOK</legend>
                        <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo ($title) ?>">
                            <span class="help-block"><?php echo $title_err;?></span>
                        </div>
                         <!-- input rate -->
                          <div class="form-group <?php echo (!empty($rate_err)) ? 'has-error' : ''; ?>">
                            <label>Rate</label>
                            <input type="text" name="rate" class="form-control" value="<?php echo ($rate) ?>">
                            <span class="help-block"><?php echo $rate_err;?></span>
                        </div>
                        <!-- input published_at  -->
                         <div class="form-group <?php echo (!empty($published_at_err)) ? 'has-error' : ''; ?>">
                            <label>Published_at</label>
                            <input type="text" name="published_at" class="form-control" value="<?php echo ($published_at) ?>">
                            <span class="help-block"><?php echo $published_at_err;?></span>
                        </div>
                        <!-- input image_path -->
                         <div class="form-group <?php echo (!empty($image_path_err)) ? 'has-error' : ''; ?>">
                            <label>Image_path</label>
                            <input type="text" name="image_path" class="form-control" value="<?php echo ($image_path) ?>">
                            <span class="help-block"><?php echo $image_path_err;?></span>
                        </div>
                        <!-- input author name -->
                         <div class="form-group <?php echo (!empty($author_name_err)) ? 'has-error' : ''; ?>">
                            <label>Author_Name</label>
                            <input type="text" name="author_name" class="form-control" value="<?php echo ($author_name) ?>">
                            <span class="help-block"><?php echo $author_name_err;?></span>
                        </div>
                        <!-- input price -->
                         <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control" value="<?php echo ($price) ?>">
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <!-- input description -->
                        
                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>Description</label>
                            <textarea name="description" class="form-control"><?php echo ($description) ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>
                            <select class = "box" name="category"> 
                                    <?php
                                    $res =mysqli_query($conn,"SELECT name FROM category");
                                    while($row =mysqli_fetch_array($res))
                                    {
                                      ?>
                                      <option>
                                        <?php echo $row["name"]; ?>
                                      </option>
                                      <?php

                                    }
                                    ?>
                            </select>
                        <!--  <select class = "box" name="category">
                             <option>---Select Category--</option>
                             <option value="Science fiction ">Science fiction </option>
                             <option value="Romance">Romance</option>
                             <option value="Mystery">Mystery</option>
                             <option value="Horror">Horror</option>
                         </select> -->
                        <!--  <?php $sql// = "SELECT * FROM category";?>
                         <select>
                            <?php //foreach($category as $category): ?>
                                <option value="<?= $category//['id']; ?>"><?= $category//['title']; ?></option>
                            <?php //endforeach; ?>
                        </select> -->
                         <br> 
                         <br>                     
                        <input type="submit" class="btn btn-primary" value="Insert" name="insert">
                        <a href="crud.php" class="btn btn-primary">Cancel</a>
                    </fieldset>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>