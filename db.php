<?php  
	
     
         
         $conn = mysqli_connect('localhost', 'username', 'password', 'database');
	 
        if (!$conn) {
            die('Could not connect: ' . mysqli_connect_error());
	}

        mysqli_select_db($conn,"database");
        
     

?>

