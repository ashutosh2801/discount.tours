<?php
require_once('includes/config.php');
require_once('includes/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Sitemap - A list of web pages of our website | Discount.Tours"/>
<meta name="keywords" content="Discount.Tours"/>
<title>Sitemap - Web Pages List | Discount.Tours</title>
<link rel="canonical" href="<?=SITEURL."/sitemap";?>" />
<?php include 'inner_header.php';?>

<!--book your tour-->
<div class="sitemap_wra">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="tour_type">
          <h2>Sitemap</h2>
          <ul class="sitemap" id="list">
            <?php
			$condition = "status=1";
			$sql = "SELECT * FROM tour_tours WHERE $condition ORDER BY tour_count DESC LIMIT 1000";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				while( $c = $result->fetch_object() ) {
					$url = tour_urlMap('tours', $c->slug);
				?>
				<li><a href="<?=$url; ?>"><?=trim(str_replace('{{TOTAL_TOUR}}','',$c->title)." ".$c->sub_title); ?></a></li>
				<?php
				}
			}
			?>
            </ul>
        </div>
      </div>        
      <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
        <?php //include 'tour_by_type.php';?>
        <?php //include 'most_popular_tours.php';?>
      <!--</div>-->
     </div>
   </div>
</div>
<!--end book your tour-->
<?php include 'footer.php';?>
<script>
$(function(){
  
	$('#search').click(function(){
		$('#page').val( 1 );
	});
	$('#sortby').change(function(){
		$('#page').val( 1 );
		$('#sort_by').val( $(this).val() );
		$('#search_form').submit();
	});
	$('#load_more_products').click(function(){
		get_loadmore_tours('#products', '#search_form', '/ajax/tours');
		return false;
	});
});
</script>
</body>
</html>
