
<?php
   
   $dbConn = new mysqli('localhost', 'unn_w19014219', 'Nerrad00', 'unn_w19014219');
          
        // Check connection
        if($dbConn === false){ //check that if it fails to connect outputs this message
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }

    $full_name = $_REQUEST['full_name']; //requests full_Name from database
    $user_email = $_REQUEST['user_email'];
    $type = $_REQUEST['type'];
	$user_message = $_REQUEST['user_message'];
	$email_response = $_REQUEST['email_response'];
    
	$data = $_POST;
	
	if(empty($data['full_name']) || //if statement checks if set variable is empty server side validation
		empty($data['user_email']) ||
		empty($data['type']) ||
		empty($data['user_message']) ||
		empty($data['email_response'])) {
			
			die('Please fill out all fields'); //creates message saying to fill out all fields
		}
	
    $sql = "INSERT INTO responses VALUES('$full_name',
		 '$user_email', '$type', '$user_message', '$email_response')";
	 // inserts fields written by user into the database
   
	if(mysqli_query($dbConn, $sql)){
            echo "Response stored in a database successfully."; 
            echo '<p>Return to previous page <a href="socialmedia.html">Click here</a></p>';  
		 //echo outputs a message
		echo nl2br("\n$full_name\n $user_email\n "
                . "$type\n $user_message\n $email_response");
				
	} else{ // error check stating the reason why
            echo "ERROR submitting. " 
                . mysqli_error($dbConn);
        }
				 
	mysqli_close($dbConn); //closes connection to database
			
?>