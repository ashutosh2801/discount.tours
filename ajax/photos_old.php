<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 12;
$offset = $limit * ($page-1);

//$tour_id = $_POST['tour_id'];
$tour_id = 20;

$sql = "SELECT * FROM tour_gallery WHERE tour_id=$tour_id ORDER BY `ID` ASC LIMIT $offset, $limit";
$result = $conn->query($sql);
if ($result->num_rows > 0) { 
?>

<link href="/css/slider.css" rel="stylesheet" />
<script src="/js/slider.js" type="text/javascript"></script>
<script>
function lightbox(idx) {
	var ninjaSldr = document.getElementById("ninja-slider");
	ninjaSldr.parentNode.style.display = "block";

	nslider.init(idx);

	var fsBtn = document.getElementById("fsBtn");
	fsBtn.click();
}

function fsIconClick(isFullscreen, ninjaSldr) { //fsIconClick is the default event handler of the fullscreen button
	if (isFullscreen) {
			ninjaSldr.parentNode.style.display = "none";
	}
}
</script>
<div style="display:none;">
    <div id="ninja-slider">
        <div class="slider-inner">
            <ul>
                <?php
								$i=1;
								$result = $conn->query($sql);
								while($row = $result->fetch_object()) {
								?>
                <?php if($row->type=='Video') {  ?>
                <li>
                		<iframe width="100%" height="600" src="https://www.youtube.com/embed/<?php echo $row->image_name; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </li>    
								<?php } else {  ?>
                <li>
                    <a class="ns-img" href="../uploads/tours/<?php echo $row->image_name; ?>"></a>
                    <div class="caption">
                        <?php /*?><h3>Image <?php echo $i++; ?></h3><?php */?>
                        <p><?php echo $row->title; ?></p>
                    </div>
                </li>
                <?php
								}
								?>
                <?php
								}
								?>
            </ul>
            <div id="fsBtn" class="fs-icon" title="Expand/Close"></div>
        </div>
    </div>
</div>
<div class="gallery">
		<?php
		$i=0;
		$result = $conn->query($sql);
		while($row = $result->fetch_object()) {
		?>
    <?php if($row->type=='Video') {  ?>
    <img src="https://img.youtube.com/vi/<?php echo $row->image_name; ?>/mqdefault.jpg" onclick="lightbox(<?php echo $i++; ?>)" />
    <?php } else {  ?>
    <img src="../uploads/tours/thumb/<?php echo $row->image_name; ?>" onclick="lightbox(<?php echo $i++; ?>)" />
    <?php } ?>
    <?php
		}
		?>
</div>

<div class="pagi">
	<nav aria-label="...">
		<?php
		$sql = "SELECT * FROM tour_gallery WHERE tour_id=$tour_id ORDER BY `ID` ASC";
    $result = $conn->query($sql);
    $total_pages = ceil($result->num_rows / $limit);
    echo paginattion($page, $total_pages, "/ajax/photos?tour_id=$tour_id");
    ?>
  </nav>
</div>

<script>
$(function(){
	$('.pagination li a').click(function(){
		get_data('#gallery_container', $(this).attr('href'), '<?php echo $_POST['tour_id']; ?>');
		return false;
	});
});
</script>
<?php
} else echo 'No photos';
?>

