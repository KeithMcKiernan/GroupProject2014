<?php

function time_stamp($session_time) {

	$time = time() - $session_time;

	// Time Variables
	$hours 	= round($time / 3600);
	$minutes = round($time / 60);
	$seconds = $time;
	
	// Date Variables
	$years 	= round($time / 29030400);
	$months 	= round($time / 2419200);
	$weeks 	= round($time / 604800);
	$days 	= round($time / 86400);

	// Checking hours
	if ($hours <= 24) {
		
		if ($hours == 1)
			echo '1 hour ago';
		else
			echo '$hours hours ago';
	}

	// Checking minutes
	else if ($minutes <= 60) {
		
		if ($minutes == 1)
			echo '1 minute ago';
		else
			echo '$minutes minutes ago';
	}

	// Checking seconds
	else if ($seconds <= 60) {
		echo '$seconds seconds ago';
	}

}