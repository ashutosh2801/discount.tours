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
<meta name="description" content="This B&B in a restored Victorian house is a 20-minute walk from Niagara Falls. It offers spacious rooms with TV, free parking, free WiFi. Enjoy home-cooked breakfast."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/a-moment-in-time-bed-and-breakfast" />
<title>A Moment in Time Bed and Breakfast – Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/a-moment-in-time-bed-and-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>A moment in time bed and breakfast</h2>
    <h3><i class="	fa fa-map-marker"></i> 5982 Culp Street, Niagara Falls, ON L2G 6A2</h3>
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
        <h2>A moment in time bed and breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 5982 Culp Street, Niagara Falls, ON L2G 6A2</address>
         <p>You will love this quaint Victorian house, which is just a 20-minute walk from Niagara Falls.</p>

<p>Hot breakfast is served every morning in the beautiful Victorian dining room. Each room has a flat-screen TV, private bath and free Wi-Fi. Some rooms have a fireplace and a spa bath.</p>

<p>Fallsview Casino Resort is only 0.7 miles from the B&B. The décor of the property is very elegant Victorian style. There are many antiques in the house to admire.</p>

<p>Free private parking is available onsite.</p>

<p>A Moment in Time Bed and Breakfast has been rated high by couples who love the beautiful house, the ambience, and its proximity to many tourist attractions. This place gives best value for money.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children cannot be accommodated here.</li>
        <li>Only 2 persons are allowed per room.</li>
        <li>Extra beds are not available.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>Please click on the button below to check for availability, pricing, and to make a reservation.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/a-moment-in-time-bed-and-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
