<?php  
	
	// Include the connection to the database
	include_once 'includes/connect.php';

	// Check that the save button is clicked
	if ( isset( $_POST['save']) ) {

		$email	= mysqli_real_escape_string( $connection, $_POST['email'] );
		$regEx 	= '/^[_A-Za-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

		// Check if the email follows the correct regular expression pattern - example student@student.ait.ie
    		if ( !preg_match( $regEx, $email ) ) {
      		$_SESSION['error']['email'] =  "Invalid email format"; 
      	}

      	// If errors exist reload the same page showing the error
      	if ( isset($_SESSION['error']) ) {
			header("Location: member_area.php");
			exit;
		}

		// Otherwise update the database
      	else {

			$firstname 	= mysqli_real_escape_string( $connection, $_POST['firstname'] );
			$lastname  = mysqli_real_escape_string( $connection, $_POST['lastname'] );
			$student  	= mysqli_real_escape_string( $connection, $_POST['studentid'] );
			$location  	= mysqli_real_escape_string( $connection, $_POST['location'] );
			$bio  		= mysqli_real_escape_string( $connection, $_POST['bio'] );

			$query = mysqli_query( $connection, 
				"UPDATE members SET member_login = '" . $student . "', firstname = '" . $firstname . "', lastname = '" . $lastname ."', email = '" . $email ."', location = '" . $location ."', bio = '" . $bio ."' WHERE member_id = '". $_SESSION['id'] . "'"); 
	
			// If the query is true assign each input field to a session
			if ( $query ) {

				$_SESSION['firstname'] 	= $_POST['firstname'];
				$_SESSION['lastname'] 	= $_POST['lastname'];
				$_SESSION['studentID'] 	= $_POST['studentid'];
				$_SESSION['location'] 		= $_POST['location'];
				$_SESSION['email'] 		= $_POST['email'];
				$_SESSION['bio'] 			= $_POST['bio'];
				$_SESSION['avatar'] 		= $_FILES['avatar'];

				//  Show success message
				header('Location: member_area.php?success');
				exit;
			}

			// Close the connection
			mysqli_close($connection);
		}
	} 

	// Check that the upload button is clicked
	if ( isset( $_POST['upload']) ) {
		
		// Upload Member Avatar folder location
		$uploadAvatarDirectory = 'uploads/avatars/';

		$imageName 		= $_FILES['avatar']['name'];
		$tempName  		= $_FILES['avatar']['tmp_name'];
		$imageSize 		= $_FILES['avatar']['size'];
		$imageType 		= $_FILES['avatar']['type'];

		$imagePath 		= $uploadAvatarDirectory . $imageName;
		$result 				= move_uploaded_file( $tempName, $imagePath );

		$uploadAvatar = mysqli_query( $connection, "UPDATE members SET avatar = '" . $imagePath . "'  WHERE member_id = '". $_SESSION['id'] . "'"); 

		if ( $uploadAvatar ) {

			$_SESSION['avatar'] = $_FILES['avatar'];

			header('Location: member_area.php?success');
			exit;
		}

		// Close the connection
		mysqli_close($connection);
	}
?>
