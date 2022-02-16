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
<meta name="description" content="Luxury 5-bedroom house with swimming pool, fully equipped kitchen, 3-1/2 bathrooms, washer/dryer & more! Short drive to all tourist sights."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/stonehaven-niagara-5" />
<title>Stonehaven Niagara 5 – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/stonehaven-niagara-5.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Stonehaven Niagara 5</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2E 6N8</h3>
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
        <h2>Stonehaven Niagara 5</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2E 6N8</address>
         <p>This spectacular vacation rental in Niagara Falls, Canada, is conveniently located near major highways, grocery stores and restaurants. It is a short drive to Niagara Falls, Clifton Hill, Niagara-on-the-Lake and other landmarks.</p>

<p>The house is huge, with living room, fully equipped kitchens, 5 bedrooms, TVs in living/dining areas and bedrooms, and washer/dryer. There is enough space to accommodate a group of 16 people.</p>

<p>The property also features a fenced off backyard with a swimming pool, BBQ facilities, and outdoor furniture where guests can relax after a day of sightseeing.</p>

<p>There is parking space at the property, which is free. Guests can enjoy free WiFi.</p>

<p>Stonehaven Niagara 5 is perfect for a large family or group. It provides all the comforts of a home. It has multiple dining and living spaces.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are allowed on request (charges may apply).</li>
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in the bedrooms.</li>
        </ul>
        
        <p>For more information on Stonehaven Niagara 5, please click on the button given below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/stonehaven-niagara-5.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
