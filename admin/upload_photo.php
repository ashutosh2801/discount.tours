<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

// get the tmp url
$photo_src = $_FILES['photo']['tmp_name'];
// test if the photo realy exists
if (is_file($photo_src)) {
	// photo path in our example
	//$photo_dest = '../uploads/tours/photo_'.time().'.jpg';
	
	
	$target_dir 			= "../uploads/tours/";
	$target_dir_thumb = "../uploads/tours/thumb/";
	$extension 				= strtolower(pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION));
	$image_name 			= "toniagaratours_photo_".date('Ymdhis')."_".rand(100,999).".$extension";
	$photo_large 			= $target_dir . $image_name;
	$photo_small 			= $target_dir_thumb . $image_name;
	move_uploaded_file($photo_src, $photo_large);

	
	// copy the photo from the tmp path to our path
	//copy($photo_src, $photo_dest);
	// call the show_popup_crop function in JavaScript to display the crop popup
	echo '<script type="text/javascript">window.top.window.show_popup_crop("'.$photo_large.'","'.$photo_small.'","'.$image_name.'")</script>';
}
?>