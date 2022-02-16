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
<link rel="canonical" href="<?=SITEURL;?>/niagara-falls-koa" />
<title>Niagara Falls KOA | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-falls-koa.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Falls KOA</h2>
    <h3><i class="fa fa-map-marker"></i> 8625 Lundy's Lane, Niagara Falls, ON L2H 1H5</h3>
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
        <h2>Niagara Falls KOA</h2>
        <address><i class="fa fa-map-marker"></i> 8625 Lundy's Lane, Niagara Falls, ON L2H 1H5</address>
        
         <p>KOA campgrounds are famous for their unique style of camping. Niagara Falls KOA is located just 3 miles from Niagara Falls.</p>

<p>Niagara Falls KOA provides all the comforts and conveniences of a home. You can choose the accommodation that best suits your travel needs. There are a variety of RV sites, full hookup sites, etc.</p>

<p>Cabins and tent sites are also available. There are many planned events that you can participate in. Children will love the special theme parks and wagon rides.</p>

        
        <h3><i class="fa fa-star"></i> Facilities at the campground include:</h3>
        <ul class="facilities2">
        <li>Bike rentals</li>
        <li>Mini golf</li>
        <li>Motel</li>
        <li>Heated swimming pool</li>
        <li>Kiddie pool</li>
        </ul>
        <p><strong>Phone:</strong> <a href="tel:+1 905-356-2267">+1 905-356-2267</a></p>
		<p class="aco_site">Visit their <a href="https://koa.com/campgrounds/niagara-falls-ontario/" target="_blank">website</a> for more details.</p>
        
        
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
