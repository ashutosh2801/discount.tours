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
<link rel="canonical" href="<?=SITEURL;?>/scott-s-trailer-park-and-campground" />
<title>Scott's Trailer Park and Campground | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/scott-s-trailer-park-and-campground.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Scott's Trailer Park and Campground</h2>
    <h3><i class="fa fa-map-marker"></i> 8845 Lundy's Lane, Niagara Falls, ON L2H 1H5</h3>
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
        <h2>Scott's Trailer Park and Campground</h2>
        <address><i class="fa fa-map-marker"></i> 8845 Lundy's Lane, Niagara Falls, ON L2H 1H5</address>
        
         <p>This campground is located just 8 km from Niagara Falls. A very affordable place for families! </p>

<p>The WeGo shuttle bus to the Falls stops right outside the campground.</p>

        
        <h3><i class="fa fa-star"></i> Some of the facilities at Scott's Trailer Park and Campground include:</h3>
        <ul class="facilities2">
        <li>Full service trailer sites that include water, sewer and electricity connections</li>
        <li>50 amp pull-thru sites that accommodate large RVs</li>
        <li>Complimentary high speed WiFi</li>
        <li>Picnic table and fire ring at each campsite</li>
        <li>Laundry room</li>
        <li>Grocery store, camping equipment</li>
        <li>Showers and baby baths</li>
        </ul>
        <h3><i class="fa fa-phone"></i> Phone:</h3>
<p><strong>Local:</strong> <a href="tel:+1 905-356-6988">+1 905-356-6988</a></p>
<p><strong>Toll free:</strong> <a href="tel:+1-800-649-9497">+1-800-649-9497</a></p>
        
		<p class="aco_site">In addition to the above, there are many other facilities at Scott's Campground. Visit the <a href="https://www.campingatscotts.com/" target="_blank">website</a> to know more.</p>
        
        
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
