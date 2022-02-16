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
<meta name="description" content="Stay at Ontario Ave Apt 5481 #3 for a comfortable Niagara Falls vacation. With 3 bedrooms, free WiFi, free parking, proximity to attractions, it is a great place to stay."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/ontario-ave-apt-5481-3" />
<title>Ontario Ave Apt 5481 #3 | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/ontario-ave-apt-5481-3.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Ontario Ave Apt 5481 #3</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2E 3S4</h3>
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
        <h2>Ontario Ave Apt 5481 #3</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2E 3S4</address>
         <p>Ontario Ave Apt 5481 #3 is within walking distance from all the popular attractions in Niagara Falls Canada. It offers accommodations at reasonable rates and includes free parking and free WiFi.</p>

<p>The apartment has 3 bedrooms, TV, air conditioning and heating.</p>

<p>It is about a 3-minute drive to Niagara Falls from the apartment.</p>

<p>Ontario Ave Apt 5481 #3 offers clean, comfortable accommodations and excellent value for money.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>There is no room for extra beds in the house.</li>
        <li>Reservations are non-refundable.</li>
        </ul>
        
        <p>For more information regarding Ontario Avenue Apt 5481 #3, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/ontario-ave-apt-5481-3.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
