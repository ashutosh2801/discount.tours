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
<link rel="canonical" href="<?=SITEURL;?>/campark-resorts" />
<title>Campark Resorts | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/campark-resorts.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Campark Resorts</h2>
    <h3><i class="fa fa-map-marker"></i> 9387 Lundy's Lane, Niagara Falls, ON L2E 6S4</h3>
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
        <h2>Campark Resorts</h2>
        <address><i class="fa fa-map-marker"></i> 9387 Lundy's Lane, Niagara Falls, ON L2E 6S4</address>
         <p>Campark Resorts is a preferred camping destination in Niagara Falls for families. It is located in Lundy's Lane, about a 10-minute drive from the Falls area.</p>

<p>You can either stay in your tent or RV, or rent out one of the cosy camping cabins. There are also gorgeously furnished rental trailers, bunkies and cabanas available.</p>

<p>The WeGo shuttle stops near the campground, making travel to the downtown area easy. Onsite shuttle service is also available to all attractions any time.</p>
        
        <h3><i class="fa fa-star"></i> Facilities at the campground include:</h3>
        <ul class="facilities2">
        <li>Heated swimming pool</li>
        <li>Playgrounds</li>
        <li>Live bands and entertainment </li>                                         
        <li>Tent sites</li>
        <li>Shuttle around Niagara Falls </li>                                           
        <li>Supervised kids programs</li>
        <li>Splash Pad</li>                                                                
        <li>Toilets and dump station</li>
        <li>Hot showers and bathtubs </li>                                                
        <li>Mini Putt</li>
        <li>Karaoke</li>                                                                            
        <li>Laundromat</li>
        <li>Camp store </li>                                                                           
        <li>Firewood, ice, etc.</li>
        <li>Full hookups  </li>                                                                        
        <li>Camping cabins</li>
        <li>Haywagon rides  </li>                                                                  
        <li>Country style all day restaurant</li>
        </ul>
        
		<p class="aco_site">Visit <a href="https://campark.com/" target="_blank">Campark Resorts</a> website for more details.</p>
        
        
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
