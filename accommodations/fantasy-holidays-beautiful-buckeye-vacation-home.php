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
<meta name="description" content="Book this luxurious 4-bedroom house vacation rental in Niagara Falls, Canada. Free parking, free WiFi, short drive to tourist attractions."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/fantasy-holidays-beautiful-buckeye-vacation-home" />
<title>Fantasy Holidays Beautiful Buckeye Vacation Home – Niagara Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/fantasy-holidays-beautiful-buckeye-vacation-home.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Fantasy Holidays Beautiful Buckeye Vacation Home</h2>
    <h3><i class="fa fa-map-marker"></i> Buckeye Crescent, Niagara Falls, ON L2H 2Y6</h3>
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
        <h2>Fantasy Holidays Beautiful Buckeye Vacation Home</h2>
        <address><i class="fa fa-map-marker"></i> Buckeye Crescent, Niagara Falls, ON L2H 2Y6</address>
         <p>This modern vacation home is ideal for a family or a group of friends. Just a short drive from the Falls area and other attractions, this vacation home offers free onsite parking and free WiFi. </p>

<p>It has air conditioning, fully equipped kitchen, dining area, sitting area, a flat-screen TV, a backyard, 4 bedrooms and bathroom.</p>

<p>American Falls is 5.7 km and Skylon Tower is 5.2 km from the house.</p>

<p>Enjoy the freedom and comfort of a home on your Niagara Falls vacation. The house can accommodate 8 persons.</p>

<p>Guests have admired the cleanliness and modern equipment of the home.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>All children under 12 years are charged 60 CAD per night for extra beds.</li>
        <li>A maximum of 1 extra bed is allowed per bedroom.</li>
        </ul>
        
        <p>Please click on the button below to know more about Fantasy Holidays Beautiful Buckeye Vacation Home, its availability and rent.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/fantasy-holidays-beautiful-buckeye-vacation-home.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
