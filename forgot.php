<?php

	// Include the connection to the database
	include_once 'includes/connect.php';

	// Check if the email field is not empty
	if (!empty($_POST['email'])) {

		// read email address
		$email		= mysqli_real_escape_string( $connection, $_POST['email'] );
		 
		$checkEmail = mysqli_query( $connection, "SELECT * FROM members WHERE email = '" . $email . "'" )
			or die(mysqli_error());

		// Check if the email address exists in the database
		if (mysqli_num_rows($checkEmail) != 1) {
			echo "<h1>Error</h1>";
			echo "<p>Sorry, no email address found matching this.</p>";
		}

		else {

			// Insert information into the members table
			$query = mysqli_query( $connection, "INSERT INTO members ( member_login, username, password, firstname, lastname, email )
						VALUES ( '$studentid', '$username', '$password', '$firstname', '$lastname', '$email' );" );
		
			// Check if the account was created
			if ($query) {
				echo "<h1>Success</h1>";  
            echo "<p>Your account was successfully created. Please <a href=\"index.php\">click here to login</a>.</p>";  
			}

			else {
				echo "<h1>Error</h1>";  
				echo "<p>Sorry, your registration failed. Please go back and try again.</p>";      
			}
		}
	}	

?>