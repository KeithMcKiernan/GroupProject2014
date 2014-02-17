<?php 
	// Include the header
	include_once 'header.php'; 

	// Start a session
	session_start();

	// Check to see if the user has logged in - if they have display new content and hide the registration form
	if ( $_SESSION['loggedIn'] ) {

		include_once 'update_member.php';

		$query = mysqli_query( $connection, "SELECT avatar FROM members WHERE member_id = '" . $_SESSION['id'] . "'");				
     		$row = mysqli_fetch_array( $query );
     		$_SESSION['avatar'] = $row['avatar'];

	//include_once 'user_online.php';
?>
		<div class="loader"></div>

		<header>
			<nav class="top-bar">
				<div class="container">
					<div id="push"><i class="fa fa-bars fa-2x"></i></div>

					<div class="links-right">
						<ul>
							<li>Welcome, <a href="index.php?=newsfeed"><?php echo $_SESSION['firstname'] ?></a></li>
							<li><a class="links-right-button" href="logout.php"><i class="fa fa-power-off"></i></a></li>

						</ul>
					</div>

				</div>
			</nav>
		</header>

		<?php include_once 'sidebar.php'; ?>

		<div class="container">
			<section class="main-content-index">
				<h1>Course Timetable</h1>				
				<embed src="https://dl.dropboxusercontent.com/s/4w0jfzjh64qgltu/Student%20Set%20Individual.pdf?token_hash=AAE6oFVOns_Tr3lNP1naib5PL__TnQCGbeqB8Wg6zFaARA&amp;disable_range=1" width="879" height="515">
			</section>
		</div>

<?php
	} // Close if statement

	// If user has not logged in show the registration page
	else {	

?>
		<section class="form-body">

			<!-- Start Error Handling for inputs -->				
			<?php 	
				$userNameError = 	$_SESSION['error']['username'];
				$emailError 	= 	$_SESSION['error']['email'];
				$studentIDError = $_SESSION['error']['studentid'];
				
				if ( isset($_SESSION['error']['username']) ) {
					echo "<div id=\"username\" class=\"popover\"> $userNameError </div>";
					unset($_SESSION['error']['username']);
				}
				if ( isset($_SESSION['error']['email']) ) {
					echo "<span class=\"registration-error error-email\"> $emailError </span>";
					unset($_SESSION['error']['email']);
				}	
				if ( isset($_SESSION['error']['studentid']) ) {
					echo "<span class=\"registration-error error-studentid\"> $studentIDError </span>";
					unset($_SESSION['error']['studentid']);
				}	
				unset($_SESSION['error']);
			?>	

			<form class="registration-form" id="reg-form" name="register" action="register.php" method="post">
				<h1>Sign up</h1>

				<fieldset>
					<div id="field-container">
						<input type="text" name="username" maxlength="30" id="username" placeholder="Username" pattern=".{4,}" required />
						<div class="popover">Minimum of 4 letters</div>
	        			</div>

					<div id="field-container">
						<input type="text" name="email" maxlength="30" placeholder="Email Address" pattern="[_A-Za-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})" required />
						<div class="popover">Format example@example.com</div>
	        			</div>

					<label class="input">
						<input type="checkbox" id="checkboxShow1" class="icon-eye" name="checkbox" /> 
					</label>
					
					<div id="field-container">
						<input type="password" id="textPassword1" name="password" placeholder="Password" pattern=".{6,}" required />
						<div class="popover">Minimum 6 letters</div>
	        			</div>

					<div id="field-container">
						<input type="text" name="studentid" maxlength="9" placeholder="Student ID" pattern="A{1}[0-9]{8}" required />
						<div class="popover">A Followed by 8 digits</div>
	        			</div>

					<input type="text" class="half-width-input" name="firstname" maxlength="20" placeholder="First Name" />

					<input type="text" class="half-width-input-right" name="lastname" maxlength="20" placeholder="Last Name" />
				</fieldset>

				<div class="full-width-line"></div>

				<fieldset>
					<input type="submit" value="Sign Up" name="submit" class="flat-button" />
				</fieldset>

				<fieldset>
					<div class="text-label"><a class="flipLink" id="sign-up" href="login.php">Already have an account? Sign In</a></div>
				</fieldset>
			</form><!-- end registration form -->
		</section>

<?php 
	} // Close the else statement

	include_once 'footer.php' 

 ?>		