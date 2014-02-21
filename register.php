<?php

    // Include the connection to the database
    require_once 'includes/connect.php';

    // Check if the form has been submitted
    if ( isset($_POST['submit']) ) {

	// Declared Variables - Password Hashed using PHP MD5
	$username	= mysqli_real_escape_string( $connection, $_POST['username'] );
	$email		= mysqli_real_escape_string( $connection, $_POST['email'] );
	$firstname 	= mysqli_real_escape_string( $connection, $_POST['firstname'] );
	$lastname  = mysqli_real_escape_string( $connection, $_POST['lastname'] );
	$studentid  = mysqli_real_escape_string( $connection, $_POST['studentid'] );
	$password 	= mysqli_real_escape_string( $connection, $_POST['password'] );
	$password_hash = md5($password);

	$checkUsername 	= mysqli_query( $connection, "SELECT * FROM members WHERE username = '" . $username . "'") or die(mysqli_error());
	$checkEmail 		= mysqli_query( $connection, "SELECT * FROM members WHERE email = '" . $email . "'") or die(mysqli_error());
	$checkStudentID 	= mysqli_query( $connection, "SELECT * FROM members WHERE member_login = '" . $studentid . "'") or die(mysqli_error());

	// Check if the user already exists in the database
	if (mysqli_num_rows($checkUsername) > 0) {
	    $_SESSION['error']['username'] = "Username $username already exists.";
	}

	// Check if the email already exists in the database
	if ( mysqli_num_rows($checkEmail) > 0 ) {
	    $_SESSION['error']['email'] = "$email is already registered.";
	}
		
	// Check if the Student ID already exists in the database
	if ( mysqli_num_rows($checkStudentID) > 0 ) {
            $_SESSION['error']['studentid'] = "$studentid is already registered.";
	}

	// If errors exist set the page to index.php and display the errors
	if ( isset($_SESSION['error']) ) {
	    header("Location: index.php");
	    exit;
	}

	// If no errors exist register the user.
	else {

	    // Insert default avatar for every registered user.
	    $uploadAvatarDirectory = 'uploads/avatars/default.png';

	    // Insert information into the members table
	    $query = mysqli_query( $connection, "INSERT INTO members ( member_login, username, password, firstname, lastname, email, avatar )
					VALUES ( '$studentid', '$username', '$password_hash', '$firstname', '$lastname', '$email', '$uploadAvatarDirectory' );" );

	    // Check if the account was created
	    if ($query) {
		header('Location: register.php?success');
		exit;
	    }

	    // Close the connection
	        mysqli_close($connection);
	}
    }

    if ( isset($_GET['success']) && empty($_GET['success']) ) {
  	echo '<h1>Success</h1><p>Thank you for registering. Please login.</p>';
	echo "<meta http-equiv='refresh' content='2;login.php' />";
    }

?>
