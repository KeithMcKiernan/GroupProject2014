<?php

/**
 * File: includes/functions.php
 * Authors: Keith McKiernan - A00200973, Aidan Gormally - , Eoin Donoghue - , Ronan Kenny -
 */

// Create Account Function For Registration & Login
function createAccount( $username, $password, $email ) {

	// Login: Check to see if username and password has been entered 
	if (!empty($username) && !empty($password)) {
		$usernameLength = strlen($username);
		$passwordLength = strlen($password);
	}

	// Avoid SQL Injection by escaping the username
	$newUsername = mysqli_real_escape_string( $connection, $username );

	// Return the username from the members table in the database
	$sqlQuery = "SELECT username FROM members WHERE username = '" . $newUsername . "' LIMIT 1";

	// Execute the query and assign it the variable $query for later use
	$query = mysqli_query( $connection, $sqlQuery );

	// Error Checking: Username & Password
	if ($usernameLength <= 5 || $usernameLength >= 14)
		$_SESSION['error'] = "Username must be between 5 & 14 characters.";

	else if ($passwordLength < 6)
		$_SESSION['error'] = "Password must contain more than 6 characters.";

	else if (mysqli_num_rows($query) == 1)
		$_SESSION['error'] = "Username already exists. Please choose another.";

	else {

		// If username and password doesn't exist create new username and password
		$sqlQuery = "INSERT INTO members ( username, password ) VALUES ( '$newUsername', '$password ' );";

		// Execute the query and insert new username and password into the members table
		$query = mysqli_query( $connection, $sqlQuery );

		if ($query)
			return true;
	}

	return false;
}

// Check to see if the user is logged in
function loggedIn() {

	if (isset($_SESSION['loggedin']) && isset($_SESSION['username']))
		return true;		
	else
		return false;
}

// Check to see if the user is logged in
function loggedOut() {

	unset($_SESSION['username']); 
  	unset($_SESSION['loggedin']); 
   
  	return true; 
}

function validateUser($username, $password) {

	// Avoid SQL Injection by escaping the username
	$newUsername = mysqli_real_escape_string( $connection, $username );

	$sqlQuery = "SELECT username FROM members 
					WHERE username = '" . $newUsername . "' 
					AND password = '" . $password . "' LIMIT 1";

	// Execute the query and insert new username and password into the members table
	$query = mysqli_query( $connection, $sqlQuery );

}



