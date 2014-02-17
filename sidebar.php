<?php 

?>

<div id="slide-menu">
	<ul class="navigation">
		<div class="sidebar-top">
			<li>		
			<a href="#"><div class="center sidebar-avatar"><?php echo "<img src=\"" . $row['avatar'] . "\" class=\"avatar\" >"; ?></div></a>
			<a href="#" class="center"><?php echo $_SESSION['username'] ?></a>
			<a href="member_area.php" class="center edit-profile">Edit Profile</a>
			</li>
		</div>

		<li><a href="#"><i class="fa-envelope sidebar-fa"></i>Messages<span class="sidebar-notification">3</span></a></li>
		<li><a href="#"><i class="fa-calendar sidebar-fa"></i>Events</a></li>
		<li><a href="#"><i class="fa-group sidebar-fa"></i>Groups</a></li>
	</ul>
</div>


