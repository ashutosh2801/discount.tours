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
<meta name="description" content="Luxury hotel Sheraton on the Falls offers rooms with breathtaking views of Niagara Falls. 100% smoke-free, onsite restaurants. Guests can walk to all attractions."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/sheraton-on-the-falls" />
<title>Sheraton on the Falls | Hotels in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/sheraton-on-the-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Sheraton on the Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 5875 Falls Avenue, Niagara Falls, ON L2G 3K7</h3>
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
        <h2>Sheraton on the Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5875 Falls Avenue, Niagara Falls, ON L2G 3K7</address>
         <p>One of the best luxury hotels in Niagara Falls, Canada, Sheraton on the Falls is in a prime location. It is within walking distance from all the major attractions.</p>

<p>Friendly staff greet you at the lobby. The rooms are luxurious and spacious with comfortable beds, floor-to-ceiling windows, a 37-inch flat-screen TV, coffeemaker and a marble bathroom.</p>

<p>Some of the rooms provide great views of Niagara Falls. WiFi and parking is available (charges apply).</p>

<p>Guests can walk to Niagara Falls and all the major attractions. Hornblower Niagara Cruises is just 100 metres away while Casino Niagara and Clifton Hill are about 0.2 km away. Skylon Tower, Rainbow Bridge are also within walking distance.</p>

<p>Sheraton on the Falls offers its guests a variety of services including concierge services, valet parking, and room service.</p>

<p>Other facilities include spa and massage treatments, 24-hour business center, onsite ATM, vending machines, sauna, indoor and outdoor swimming pool, laundry and dry cleaning, and more!</p>

<p>There are 2 onsite restaurants and a Starbucks in the hotel lobby.</p>

<p>Book a room at the Sheraton on the Falls for the best Niagara Falls vacation.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Up to 3 children under 16 years stay free of charge when using existing beds.</li>
        <li>Any additional older children or adults are charged per night for extra beds.</li>
        <li>Only 1 extra bed is allowed per room.</li>
        </ul>
        
        <p>To know more about the facilities and other details regarding Sheraton on the Falls in Niagara Falls, Canada, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/s-at-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
