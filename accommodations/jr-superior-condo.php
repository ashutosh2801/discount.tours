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
<meta name="description" content="Enjoy all the comforts of a home in this 1-bedroom condo a 5-minute drive (20-minute walk) from Niagara Falls. Has free WiFi, kitchen, washing machine. Close to restaurants."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/jr-superior-condo" />
<title>Jr Superior Condo, Niagara Falls CA Vacation Rental | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/jr-superior-condo.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Jr Superior Condo</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 4N1</h3>
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
        <h2>Jr Superior Condo</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 4N1</address>
         <p>This modern, fully furnished condo is just a 20-minute walk (1.8  km) to Horseshoe Falls. American Falls is further off at 2.2 km.</p>
<p>The closest attractions are Skylon Tower and Niagara Fallsview  Casino Resort – 15-20 minutes' walking distance.</p>
<p>The condo has a living area with a flat-screen TV, fully equipped  kitchen, dining area, 1 bedroom and a bathroom. Amenities include microwave,  fridge, washing machine, kitchenware, stovetop, closets and alarm clock.</p>
<p>Parking is available at the property (reservation is needed) and  free WiFi.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are allowed on request, but charges may apply.</li>
        <li>There is no space for extra beds in the condo.</li>
        </ul>
        
        <p>To know more about the property and availability, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/jr-superior-condo.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
