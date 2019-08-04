<?php
include "conn.php";
 
$title = $rate = $published_at = "";
$title_err = $rate_err = $published_at_err =  "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){

    
    // Check input errors before inserting in database
     if(isset($_POST["update"])){
    //if(empty($title_err) && empty($rate_err) && empty($published_at_err)){
        // Prepare an update statement
         $id            = $_POST['id'];
         $title         = $_POST['title']; 
         $rate          = $_POST['rate'];
         $published_at  = $_POST['published_at'];

         $sql = "UPDATE books SET title = '$title' , rate = '$rate' , published_at = '$published_at' WHERE id = '$id'";
           if(mysqli_query($conn,$sql)){
             header("location: crud.php");
         }

    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM books WHERE id = '$id' ";

                    
                    // Retrieve individual field value
                    $title = $row["title"];
                    $rate = $row["rate"];
                    $published_at = $row["published_at"];
     }
 }
}
//}
 
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <form action="update.php" method="POST">
                        <!-- ?id=<?php //echo $books['id'] ?> -->
                        <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo ($title) ?>">
                            <span class="help-block"><?php echo $title_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($rate_err)) ? 'has-error' : ''; ?>">
                            <label>Rate</label>
                            <textarea name="rate" class="form-control"><?php echo $rate; ?></textarea>
                            <span class="help-block"><?php echo $rate_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($published_at_err)) ? 'has-error' : ''; ?>">
                            <label>published_at</label>
                            <input type="text" name="published_at" class="form-control" value="<?php echo $published_at; ?>">
                            <span class="help-block"><?php echo $published_at_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                        <input type="submit" class="btn btn-primary" value="update" name="update">
                        <a href="crud.php" class="btn btn-primary">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
