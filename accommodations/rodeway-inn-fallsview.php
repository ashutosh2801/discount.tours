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
<meta name="description" content="Great value for money with clean, comfortable rooms, free WiFi, 20-minute walk to the Falls. Rodeway Inn Fallsview is excellent for family stays!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/rodeway-inn-fallsview" />
<title>Rodeway Inn Fallsview – Affordable Hotels in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/rodeway-inn-fallsview.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Rodeway Inn Fallsview</h2>
    <h3><i class="fa fa-map-marker"></i> 6663 Stanley Avenue, Niagara Falls, ON L2G 3Y9</h3>
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
        <h2>Rodeway Inn Fallsview</h2>
        <address><i class="fa fa-map-marker"></i> 6663 Stanley Avenue, Niagara Falls, ON L2G 3Y9</address>
         <p>Just a short walk from Niagara Fallsview Casino and Journey Behind The Falls (0.5 km), Rodeway Inn Fallsview offers affordable accommodations along with free WiFi and a host of other facilities to its guests.</p>

<p>The rooms are big, clean with comfortable beds, air conditioning, heating, TV, hairdryer, ironing facilities and a radio.</p>

<p>This property is perfect for families looking for an affordable and clean place in Niagara Falls, Canada.</p>

<p>Other facilities include onsite parking (paid), an outdoor heated pool, children's playground, 2 onsite restaurants, a 24-hour front desk, a bar, vending machines, daily housekeeping, room service and much more.</p>

<p>All the main attractions are a short drive from the hotel. Guests can take the WEGO bus to various attractions; it has a stop close to the hotel.</p>

<p>Stay at Rodeway Inn Fallsview for a comfortable and affordable Niagara Falls vacation.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Minimum age for check-in is 18.</li>
        <li>Pets are not allowed.</li>
        <li>Children upto 15 years can stay free of charge when using existing beds.</li>
        <li>Additional children or adults will be charged per night for an extra bed.</li>
        <li>Only 1 extra bed per room is allowed.</li>
        </ul>
        
        <p>To know more about Rodeway Inn Fallsview, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/rodeway-inn-fallsview.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
