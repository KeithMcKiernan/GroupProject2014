<?php 

	$timeOut = 300;

	$timeStamp = time();
	$timeOutLast = $timeStamp - $timeOut;

	include_once 'includes/connect.php';

	// Insert
	if (mysqli_num_rows($query) == 0) {
		$insertQuery = mysqli_query( $connection, "INSERT INTO users_online ( timestamp, ip, file )
					VALUES ( '$timestamp', '$REMOTE_ADDR', '$PHP_SELF' );" );
	}

	// If over 10 minutes delete session
	$delete = mysqli_query( $connection, "DELETE FROM users_online WHERE file = '" . $PHP_SELF . "'" );


	$result = mysqli_query( $connection, "SELECT DISTINCT ip FROM users_online WHERE file = '" . $PHP_SELF . "'" );

	$user = mysqli_num_rows($result);

	mysqli_close( $connection );

	if ($user == 1) 
		echo "$user user online\n";
	else
		echo "$user users online\n"; 
?>