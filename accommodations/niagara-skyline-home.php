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
<meta name="description" content="Just 0.5 km from Skylon Tower, Niagara Skyline Home has 3 bedrooms, living room, and kitchen with dining table. Free parking, free WiFi, pet friendly, sleeps 8. Walking distance to Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-skyline-home" />
<title>Niagara Skyline Home – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-skyline-home.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Skyline Home</h2>
    <h3><i class="fa fa-map-marker"></i> Allendale Avenue, Niagara Falls, ON L2G 3Z4</h3>
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
        <h2>Niagara Skyline Home</h2>
        <address><i class="fa fa-map-marker"></i> Allendale Avenue, Niagara Falls, ON L2G 3Z4</address>
         <p>Niagara Skyline Home is located in Niagara Falls, Ontario, Canada and is about 1.3 km (20-25 minute walk) from the world famous Niagara Falls.</p>

<p>This vacation rental is in a great location – it is within walking distance from all major attractions. Clifton Hill, Niagara Fallsview Casino Resort, Hornblower Niagara Cruises, Queen Victoria Park, etc., are all within 10-20 minutes walking distance.</p>

<p>The property has 3 bedrooms, a large living room, a fully equipped kitchen with dining table, and a bathroom. Up to 8 persons can be accommodated in the house.</p>

<p>It is a pet friendly home.</p>

<p>The property has parking space, which guests can use for free. WiFi is available in all areas of the house and is free of charge.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are allowed on request, though guests may be charged extra.</li>
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in the house.</li>
        </ul>
        
        <p>For more details regarding Niagara Skyline Home, please use the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-skyline-home-niagara-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
