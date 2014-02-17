<?php
	session_start();

	include_once 'includes/connect.php';
	include_once 'update_member.php';


	if ( !($_SESSION['loggedIn'])) { 

		echo "You are not allowed to access this page.<br />";
		echo "We are now redirecting you to the login page";
		echo "<meta http-equiv='refresh' content='2;login.php' />"; 
	}

	else {
		include_once 'header.php';

		$query = mysqli_query( $connection, "SELECT avatar FROM members WHERE member_id = '" . $_SESSION['id'] . "'");				
     		$row = mysqli_fetch_array( $query );
     		$_SESSION['avatar'] = $row['avatar'];

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
			<section class="main-content">

				<form action="update_member.php" enctype="multipart/form-data" method="POST">	
					
					<?php
						if (isset($_GET['success']) && empty($_GET['success'])) {
	  						echo '<div class="success">';
	  							echo 'Your settings have been successfully updated.';
	  							echo '<a href="#" class="notification-close notification-close-success">x</a>';
	  						echo '</div>';
						}

						if ( isset($_SESSION['error']) ) { 
							$emailError = $_SESSION['error']['email'];
							echo '<div class="errors">';
								echo "$emailError";
								echo '<a href="#" class="notification-close notification-close-error">x</a>';
							echo '</div>';
							unset($_SESSION['error']);
						}
					?>

					<h3 class="account-heading">Account Settings</h3>

					<fieldset>					
						<div class="one-half">
							<label>First Name: </label><br />
							<input type="text" name="firstname" class="input-field" value="<?php echo $_SESSION['firstname'] ?>" />
						</div>

						<div class="two-halves">
							<label>Last Name: </label><br />
							<input type="text" name="lastname" class="input-field" value="<?php echo $_SESSION['lastname'] ?>" />
						</div>
					</fieldset>

					<fieldset>
						<label for="email">Email: </label><br />
						<input type="text" name="email" class="input-field"  pattern="[_A-Za-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})" value="<?php echo $_SESSION['email'] ?>" />
					</fieldset>

					<fieldset>
						<label for="studentid">Student ID: </label>
						<input type="text" name="studentid" maxlength="9" class="input-field" value="<?php echo $_SESSION['studentID'] ?>" />
					</fieldset>

					<fieldset>
						<label for="location">Location: </label>
						<input type="text" name="location" class="input-field" value="<?php echo $_SESSION['location'] ?>" />
					</fieldset>

<!-- 					<fieldset>
						<div class="one-half">
							<label>Facebook ID: </label><br />							
							<input type="text" name="facebook" class="input-field" value="" />
						</div>

						<div class="two-halves">
							<label>Twitter ID: </label><br />							
							<input type="text" name="twitter" class="input-field" value="" />
						</div>
					</fieldset> -->

					<fieldset>
						<label>Bio: </label>
						<textarea id="textarea" name="bio" class="input-field"><?php echo $_SESSION['bio'] ?></textarea>
					</fieldset>

					<input type="submit" class="flat-button flat-button-small button-margin" name="save" value="Save Changes" />
				</form>


					<!-- Begin avatar form -->
					<form action="update_member.php" enctype="multipart/form-data" method="POST">		
						<fieldset>
							<label><a name="profile">Profile Picture: </a></label>

							<div class="input-field" style="float:left; border: 0; background: transparent;">	
								<img src="<?php echo $_SESSION['avatar'] ?>" width="100" height="100" />
							</div>		
								
							<input type="file" class="input-field" style="float: left;" name="avatar" accept="image/gif, image/jpeg, image/x-ms-bmp, image/png" value="<?php echo $_SESSION['avatar'] ?>">
						</fieldset>
						
						<input type="submit" class="flat-button flat-button-small button-margin" name="upload" value="Upload" />
					</form>
					<!-- End avatar form -->

			</section><!-- end .main-content -->

			<section class="content-right">
				<h3 class="account-heading">Settings</h3>
				<ul>
					<li>General Settings</li>
					<li><a href="#profile">Profile</a></li>
					<li>Password</li>
				</ul>
			</section>
		</div>

<?php
	}

	include_once 'footer.php';

?>