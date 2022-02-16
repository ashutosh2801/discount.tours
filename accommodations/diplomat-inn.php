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
<meta name="description" content="Diplomat Inn offers rooms at low rates, free parking, free WiFi. Short walk from Falls (1.2 km). Enjoy outdoor pool, shuttle service to the Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Diplomat Inn – Affordable Hotels in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Diplomat-Inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Diplomat Inn</h2>
    <h3><i class="	fa fa-map-marker"></i> 5983 Stanley Avenue, Niagara Falls, ON L2G 3Y2</h3>
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
        <h2>Diplomat Inn</h2>
        <address><i class="fa fa-map-marker"></i> 5983 Stanley Avenue, Niagara Falls, ON L2G 3Y2</address>
         <p>This budget hotel in Niagara Falls, Ontario is about a 10-minute walk from Skylon Tower. The Falls and other attractions are 20-25 minutes' walking distance from the hotel.</p>

<p>All rooms have a TV, sitting area, air conditioning, heating and ensuite bathrooms. Some of the rooms have a spa bath. A coffeemaker and fridge are available upon request.</p>

<p>There are many restaurants and a Starbucks Café within walking distance.</p>

<p>This hotel offers shuttle services to the Falls area and Fallsview Casino.</p>
<p>Other facilities include free parking, free WiFi, currency exchange, outdoor pool, BBQ facilities, garden, outdoor sitting area and business centre. There are vending machines too.</p>

<p>Affordable rates and the hotel's proximity to all the attractions in Niagara Falls, Ontario are liked by guests.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Up to 2 children below 12 years can stay free of charge when using existing beds.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
		<p>Please click on the button provided below to learn about offers, room availability and facilities provided by Diplomat Inn.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/diplomat-inn.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
