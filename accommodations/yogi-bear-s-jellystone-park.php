<?php
require_once('../includes/config.php');
require_once('../includes/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/yogi-bear-s-jellystone-park" />
<title>Yogi Bear's Jellystone Park | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/yogi-bear-s-jellystone-park.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Yogi Bear's Jellystone Park</h2>
    <h3><i class="fa fa-map-marker"></i> 8676 Oakwood Drive, Niagara Falls, ON L2E 6S5</h3>
    </div>
    
  </div>  
</div>
</div>
</div>
</div>

<!--inn thumb-->
<div class="inn_detail_wra">
  <div class="container">    
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
        <h2>Yogi Bear's Jellystone Park</h2>
        <address><i class="fa fa-map-marker"></i> 8676 Oakwood Drive, Niagara Falls, ON L2E 6S5</address>
         <p>Stay at Yogi Bear's Jellystone Park for a quality camping experience. There are lots of activities for families. The park's staff is always there to assist campers.</p>

<p>The park is about 9 km from Niagara Falls. There is private shuttle bus service to the Falls and Marineland.</p>

        
        <h3><i class="fa fa-star"></i> The campground offers many facilities, some of which are:</h3>
        <ul class="facilities2">
        <li>Heated swimming pool</li>
        <li>Playground</li>
        <li>Recreation hall</li>
        <li>Modern washroom and showers</li>
        <li>Laundry facilities</li>
        <li>WiFi available</li>
        <li>General store</li>
        <li>Dumping station</li>
        <li>Basketball & volleyball courts</li>
        </ul>
        
        <h3><i class="fa fa-phone"></i> Phone:</h3>
<p><strong>Toll free:</strong> <a href="tel:+1-800-263-2570">1-800-263-2570</a></p>
<p><strong>Local:</strong> <a href="tel:905 354-1432">(905) 354-1432</a></p>

        
		<p class="aco_site">To know more, visit <a href="https://jellystoneniagara.ca/en" target="_blank">https://jellystoneniagara.ca/en</a>.</p>
        
        
        <p><strong>Disclaimer:</strong> This may not be the most updated information. Please click on more details to find out the latest information.</p>

      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
        <div id="sidebar2">
                  <div class="sidebar__inner">
                    <?php include '../most_popular_tours.php';?>
                  </div>
                </div>
      </div>
    </div>
    
  </div>
</div>
<!--end inn thumb-->


<?php include '../footer.php';?>
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
