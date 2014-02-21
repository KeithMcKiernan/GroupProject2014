<?php

     // Include the connection to the database.
     include_once 'includes/connect.php';

     // Check that the form has been submitted.
     if ( isset($_POST['login']) ) {

     	     $username 			= mysqli_real_escape_string( $connection, $_POST['username'] );
     	     $password   		= mysqli_real_escape_string( $connection, $_POST['password'] );
     	     $password_hash 	= md5( $password );

     	     // Get the username and password from the database.
     	     $checkUserLogin = mysqli_query( $connection, "SELECT * FROM members WHERE username = '" . $username . "' AND password = '" . $password_hash . "'"); 

     	     /*  
		 *	Check if the username and password is in the database or greater than 0.
		 *	If it is fetch the data and assign it to the variable $row.
		 */
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
	     	     	$_SESSION['bio']			= $row['bio']; 
	     	     	$_SESSION['loggedIn']		= TRUE;  

	     	     	// Redirect to the member area if the login is successful.
	     	     	header('Location: member_area.php');
	     	     	exit;

	     	     	// Close the connection to the database.
	     	     	mysqli_close( $connection );
     	     } 

     	     // If the username and password is not in the database set an error message.  	
     	     else {  
     	     		$_SESSION['error']['password'] = "Incorrect Username or Password";
     	     	}   
	}

	// If errors exist reload the login page displaying the errors.
	if ( isset($_SESSION['error']) ) {
		header('Location: login.php');
		exit;
	}
	
?>
