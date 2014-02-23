<?php

/**
 * The header file of the website
 * Displays all of the <head> section and all information as far as <div id="container">
 *
 * @package College Social Media Website
 * @since   Version 1.0
 *
 */

?>

<!DOCTYPE html>

    <!-- [if lt IE 7]> 		<html class="no-js lt-ie9 lt-ie8 lt-ie7">	<![endif]-->
    <!-- [if IE 7]> 		<html class="no-js lt-ie9 lt-ie8">		<![endif]-->
    <!-- [if IE 8]> 		<html class="no-js lt-ie9">			<![endif]-->
    <!-- [if gt IE 8]> --> 	<html class="no-js" >				<!-- <![endif]-->

	<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <meta name="description" content="" />
	    <meta name="author" content="" />
	    
	    <title>Register</title>
	    
	    <!-- Link to Stylesheets -->
	    <link rel="stylesheet" type="text/css" href="style.css">
	    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		
	    <!-- JQuery Code, may load this below in the footer for better performance -->
	    <script src="../group2/public/js/jquery-1.11.0.min.js"></script>
	    <script src="../group2/public/js/script.js"></script>
	</head>
 
	<body>
	    <header>
	        <nav class="top-bar">
	            <div class="container">
	                <div id="push"><i class="fa fa-bars fa-1-5x"></i></div>
	                <div class="links-right">
	                <ul>
	                <?php if ( isset($_SESSION['loggedIn']) ) { ?>
	                    <li>Welcome, <a href="index.php?=newsfeed"><?php echo $_SESSION['firstname'] ?></a></li>
	                    <li><a class="links-right-button" href="logout.php"><i class="fa fa-power-off"></i></a></li>
	                <?php } 
	                
	                else {  ?>
	                    <li><a href="login.php">Login</a> or <a href="index.php">Register</a></li>
	                <?php } ?>
			</ul>
		    	</div><!-- / .links-right end -->
		    </div><!-- / .container end -->
		</nav>
	    </header>
