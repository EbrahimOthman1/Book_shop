<?php 
		$conn = mysqli_connect('localhost' , 'ebrahimotman' , '123' , 'books'); // connect to database (server , username , password , database)

			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());

			    }

 ?>