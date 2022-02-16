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
<meta name="description" content="Hotel rooms with grand views of Niagara Falls. Just a 15-minute walk to the Falls, Niagara Falls Marriott on the Falls offers great service, a pool, onsite restaurant and gym."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-falls-marriott-on-the-falls" />
<title>Niagara Falls Marriott on the Falls | Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-falls-marriott-on-the-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Falls Marriott on the Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 6755 Fallsview Boulevard, Niagara Falls, ON L2G 3W7</h3>
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
        <h2>Niagara Falls Marriott on the Falls</h2>
        <address><i class="fa fa-map-marker"></i> 6755 Fallsview Boulevard, Niagara Falls, ON L2G 3W7</address>
         <p>This luxury nonsmoking hotel on Fallsview Boulevard in Niagara Falls, Ontario, Canada is just 0.5 km from Horseshoe Falls and Niagara Fallsview Casino.</p>

<p>The hotel offers rooms with a city view and a Falls view. Each room has large windows overlooking the city or Niagara Falls, a TV, coffee maker, hairdryer, and individual climate control.</p>

<p>Select rooms have a fireplace and hot tub.</p>

<p>Niagara Falls Marriott on the Falls features an indoor pool, hot tub, fitness centre, business centre and business/banquet facilities.</p>

<p>Paid private parking and paid WiFi is available.</p> 

<p>Guests can enjoy a remarkable dining experience with stunning views of Niagara Falls at onsite restaurant Milestones Fallsview Restaurant. Starbucks is located in the hotel lobby. Breakfast buffet is available at the on-site café.</p>

<p>Skylon Tower is just a 20-minute walk (1 km) from the hotel. Most of the attractions are just a short drive away.</p>

<p>Staying at this hotel is a wonderful experience and makes your vacation all the more enjoyable and memorable.</p>

        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>All children under 18 years stay free of charge when using existing beds.</li>
        <li>Up to 2 older children or adults are charged per person per night when using existing beds.</li>
        <li>Extra beds allowed per room is 1.</li>
        </ul>
        
		<p>Please click on the button below for more details regarding bookings, room availability, and pricing for Niagara Falls Marriott on the Falls.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/marriott-on-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
