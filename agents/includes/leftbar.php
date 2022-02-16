<ul id="gn-menu" class="gn-menu-main">
  
  <li class="second logo">
  	<h1>
    	<a href="index.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i><?php echo SITENAME; ?> </a>
    </h1>
  </li>
  
  <li class="second admin-pic">
       <ul class="top_dp_agile">
          <li class="dropdown profile_details_drop">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <div class="profile_img">	
                <span class="prfil-img">
                <?php
								$profile = array();
                $sql = "SELECT * FROM tour_users WHERE ID=".$_SESSION['user_id'];
								$query = $conn->query($sql);
								if ($query->num_rows > 0) {
									$profile = $query->fetch_object();
								}
								$image = !empty($profile->profile_image) ? $profile->profile_image : 'na';
								if(file_exists("../uploads/profile/".$image)) {
								?>
								<img src="<?php echo "../uploads/profile/".$image; ?>" alt="<?php echo $profile->$image; ?>" class="img-responsive" />
								<?php
								} else {
								?>
                <img src="images/default-avatar.png" alt="default-avatar.png" />
                <?php } ?> 
                </span> 
              </div>	
            </a>
            <ul class="dropdown-menu drp-mnu">
              <li> <a href="profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
              <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
            </ul>
          </li>
      </ul>
  </li>

  
</ul>