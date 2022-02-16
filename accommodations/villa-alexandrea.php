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
<meta name="description" content="Cosy rooms. Free WiFi, free private parking. Enjoy continental breakfast, beautiful garden. Short drive to Niagara Falls. Rooms with TV, private bathroom."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/villa-alexandrea" />
<title>Villa Alexandrea | B&Bs in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/villa-alexandrea.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Villa Alexandrea</h2>
    <h3><i class="fa fa-map-marker"></i> 5287 River Road, Niagara Falls, ON L2E 3G9</h3>
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
        <h2>Villa Alexandrea</h2>
        <address><i class="fa fa-map-marker"></i> 5287 River Road, Niagara Falls, ON L2E 3G9</address>
         <p>Villa Alexandrea is a lovely property with a beautiful landscaped garden, comfortable rooms, and onsite parking space for guests.</p>

<p>Guests are served continental breakfast every morning. Free WiFi and free onsite parking is available. The décor of the house has an old world charm to it.</p>

<p>Every guest room has air conditioning, a flat-screen TV, and a private bathroom with a bath and hairdryer.</p>

<p>A number of attractions such as Clifton Hill, Bird Kingdom, Casino Niagara, Fallsview Indoor Waterpark, and Hornblower Niagara Cruises are all within 10-15 minutes walking distance from the B&B. </p>

<p>Niagara Falls is about 2.2 km from the B&B. </p>

<p>Book a room at Villa Alexandrea for a home-like atmosphere, amazing service and charming hosts.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children cannot be accommodated at this B&B. </li>
        <li>Extra beds are not available.</li>
        <li>Pets are not allowed.</li>

        </ul>
        
		<p>To know more about or make a booking at Villa Alexandrea Bed & Breakfast in Niagara Falls, Canada, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/villa-alexandrea.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
