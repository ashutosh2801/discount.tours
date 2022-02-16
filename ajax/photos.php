<?php
header('Access-Control-Allow-Origin: *');
require_once('../includes/config.php');
require_once('../includes/functions.php');
?>
<link href="<?php echo APPROOT; ?>css/responsive.min.css" rel="stylesheet">
<script src="<?php echo APPROOT; ?>/js/responsive.min.js" type="text/javascript"></script>
<div class="gallery_container">
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 200;
$offset = $limit * ($page-1);

$tour_id = $_POST['tour_id'] ? $_POST['tour_id'] : 4;
//$tour_id = 4;

$sql = "SELECT * FROM tour_gallery WHERE tour_id=$tour_id ORDER BY `tour_order` DESC LIMIT $offset, 12";
$result = $conn->query($sql);
if ($result->num_rows > 0) { 
	$result = $conn->query($sql);
	while($row = $result->fetch_object()) {
		if($row->type=='Video') {
			?>
      <a href="https://www.youtube.com/embed/<?php echo $row->image_name; ?>?rel=0&autoplay=0" class="image-link play_icon" data-lightbox-group="grouped"><img class="niagara-falls-falls-fireworks-cruise" src="https://img.youtube.com/vi/<?php echo $row->image_name; ?>/0.jpg" alt="0.jpg"></a>
      <?php
		}
		else {
?>
<a href="<?php echo APPROOT; ?>uploads/tours/<?php echo $row->image_name; ?>" class="image-link" data-lightbox-group="grouped"><img src="<?php echo APPROOT; ?>uploads/tours/thumb/<?php echo $row->image_name; ?>" alt="<?php echo $row->image_name; ?>"></a>
<?php } } ?>
<?php
} else echo '<div class="danger">No more photos</div>';

$sql = "SELECT * FROM tour_gallery WHERE tour_id=$tour_id ORDER BY `tour_order` DESC LIMIT 12, $limit";
$result = $conn->query($sql);
if ($result->num_rows > 0) { 
	$i=12;
	$cnt=0;
	$rows = ($result->num_rows);
	$r = ceil($rows/48);
	for($k=1; $k<=$r; $k++) {
		$tot = $rows - $cnt;
		echo '<div style="display:none">';
		$offset = 12+$cnt;
		$sql2 = "SELECT * FROM tour_gallery WHERE tour_id=$tour_id ORDER BY `tour_order` DESC LIMIT $offset, 48";
		$result2 = $conn->query($sql2);
		while($row = $result2->fetch_object()) {
			$cnt++;
			if($row->type=='Video') {
			?>
      <a href="https://www.youtube.com/embed/<?php echo $row->image_name; ?>?rel=0&autoplay=0" class="image-link play_icon" data-lightbox-group="grouped"><img src="https://img.youtube.com/vi/<?php echo $row->image_name; ?>/0.jpg" alt="0.jpg"></a>
      <?php
		}
		else {
?>
<a href="<?php echo APPROOT; ?>uploads/tours/<?php echo $row->image_name; ?>" class="image-link" data-lightbox-group="grouped"><img src="<?php echo APPROOT; ?>uploads/tours/thumb/<?php echo $row->image_name; ?>" alt="<?php echo $row->image_name; ?>"></a>
<?php
		}}
		echo '</div><div class="_more_photo more_photo_'.$k.'"><a href="javascript:void(0)" onclick="return showhide_photo('.$k.','.($k+1).')">'.$tot.' more photos</a></div>';
	}
	?>
</div>  
<script>
function showhide_photo(prev, next){$('.more_photo_'+prev).hide();$('.more_photo_'+next).show();$('.more_photo_'+prev).prev().show();};
</script>
<?php
}
?>

