<?php 

    $query = mysqli_query( $connection, "SELECT avatar FROM members WHERE member_id = '" . $_SESSION['id'] . "'");				
    $row = mysqli_fetch_array( $query );
    $_SESSION['avatar'] = $row['avatar'];

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
        
        <li><a href="#"><i class="fa-th-list sidebar-fa"></i>News Feed</a></li>
        <li><a href="#"><i class="fa-envelope sidebar-fa"></i>Messages<span class="sidebar-notification">3</span></a></li>
        <li><a href="#"><i class="fa-comment sidebar-fa"></i>Chat</a></li>
        <li><a href="#"><i class="fa-calendar sidebar-fa"></i>Events</a></li>
        <li><a href="#"><i class="fa-group sidebar-fa"></i>Groups</a></li>
    </ul>
</div>
