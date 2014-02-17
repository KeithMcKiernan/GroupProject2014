<?php  

	// Include the connection to the database
	include_once 'includes/connect.php';

	// Check that the login button is clicked
	if ( isset($_POST['login']) ) {
		      
		$username 	= mysqli_real_escape_string( $connection, $_POST['username'] );
		$password   	= mysqli_real_escape_string( $connection, $_POST['password'] );
		$password_hash = md5($password);
	         
		$checkUserLogin = mysqli_query( $connection, "SELECT * FROM members WHERE username = '" . $username . "' AND password = '" . $password_hash . "'"); 

		// Check if the data is in the database - If it is grab the array of data and assign it to variable row.
		if ( mysqli_num_rows($checkUserLogin) > 0 ) {

			// Fetch rows from the database
	     		$row = mysqli_fetch_array( $checkUserLogin );  

	     		// Store the user details in a session
	     		$_SESSION['id']			= $row['member_id'];
	     		$_SESSION['username']	= $row['username'];
	     		$_SESSION['firstname']	= $row['firstname']; 
	     		$_SESSION['lastname']		= $row['lastname']; 
	     		$_SESSION['email']		= $row['email']; 
	     		$_SESSION['studentID']	= $row['member_login']; 
	     		$_SESSION['location']		= $row['location']; 
	     		$_SESSION['loggedIn']		= TRUE;  

	     		header('Location: member_area.php?settings');
	     		exit;

	     		// Close the connection
			mysqli_close($connection);
	  	} 

	  	else {  
			$_SESSION['error']['password'] = "Incorrect Username or Password";
		}   
	}

	// If errors exist reload the page displaying the errors
	if ( isset($_SESSION['error']) ) {
		header("Location: login.php");
		exit;
	}
?>