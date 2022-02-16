<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

// Target siz
$targ_w = $_POST['targ_w'];
$targ_h = $_POST['targ_h'];
// quality
$jpeg_quality = 90;
// photo path
$src 				= $_POST['photo_url'];
$photo_dest = $_POST['image_path'];
$image_name = $_POST['image_name'];
$tour_id 		= $_POST['tour_id'];
$title 			= $_POST['title'];
// create new jpeg image based on the target sizes
$img_r = imagecreatefromjpeg($src);
$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
// crop photo
imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'], $targ_w,$targ_h,$_POST['w'],$_POST['h']);
// create the physical photo
imagejpeg($dst_r,$photo_dest,$jpeg_quality);


if($tour_id) {
	
	$sql = "INSERT INTO `tour_gallery` (`tour_id`, `title`, `image_name`, `status`, `timestamp`) VALUES ('".$tour_id."', '".$title."', '".$image_name."', '1', '".date('Y-m-d H:i:s')."');";
	if ($conn->query($sql) === TRUE) {
		$val = $conn->insert_id;
		$sql2 = "UPDATE `tour_gallery` SET `tour_order` = '$val' WHERE `ID` = $val;";
		$conn->query($sql2);
		$_SESSION['msg'] = 'Photo Saved!';
	}
}
exit;
?>