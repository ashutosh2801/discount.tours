<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 15;
$offset = $limit * ($page-1);

$sql = "SELECT * FROM tour_reviews WHERE tour_id=".$_POST['tour_id']." AND status=1 ORDER BY `created_on` DESC LIMIT $offset, $limit";
$result = $conn->query($sql);
if ($result->num_rows > 0) { 
?>

<ul class="review_list">
	<?php
	$i=1;
	while($row = $result->fetch_object()) {
		$color = array('#27AE60','#1a0dab','#33b56b','#E74C3C','#283747','#BA4A00','#2E86C1','#5B2C6F');
	?>
  <li>
  	<?php if(file_exists('/home/toniagara/public_html/uploads/profile/'.$row->avatar) && (!is_dir('/home/toniagara/public_html/uploads/profile/'.$row->avatar))) { ?>
  	<img src="<?php echo '/uploads/profile/'.$row->avatar; ?>" alt="<?php echo $row->avatar; ?>" class="thumb" />
  	<?php } else { ?>
    <span class="thumb" style="background:<?php echo $color[rand(0,7)];?>"><?php echo strtoupper(substr($row->name,0,1)); ?></span>
  	<?php } ?>
    <h3 class="name"><?php echo $row->name; ?></h3>
    <div class="time"><i class="fa fa-clock-o"></i> <?php echo $row->created_on; ?></div>
    <div class="review_star">
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
    </div>
    <div class="clear"></div>
    <p><?php echo stripslashes($row->description); ?></p>
  </li>
  <?php
	}
	?>
</ul> 


<?php /*if($page==1) { ?>
<div id="loader_container"></div>               
<div class="text-center">
	<input type="hidden" name="page" id="page" value="<?php echo $page; ?>" />
	<input type="button" name="load_more" id="load_more_reviews" class="btn4" value="Load More" />
</div>
<script>
$(function(){
	$('#load_more_reviews').click(function(){
		var page = parseInt( $('#page').val() );
		page = page+1;
		$('#page').val( page );
		var href ='/ajax/reviews?page='+page;
		get_loadmore_data('#reviews_container ul', '#loader_container', href, '<?php echo $_POST['tour_id']; ?>');
		return false;
	});
	$('.pagination li a').click(function(){
		get_data('#reviews_container', $(this).attr('href'), '<?php echo $_POST['tour_id']; ?>');
		return false;
	});
});
</script>
<?php }*/ ?>
<script>
$(function(){
	$('#load_more_reviews').show();
});
</script>
<?php
};
?>

