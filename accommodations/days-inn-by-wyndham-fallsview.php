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
<meta name="description" content="Days Inn By Wyndham Fallsview is a short walk from Fallsview Casino, Niagara Falls and other sights. Explore the neighbourhood! Guests get free WiFi and other services."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/days-inn-by-wyndham-fallsview" />
<title>Days Inn By Wyndham Fallsview – Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/days-inn-by-wyndham-fallsview.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Days Inn By Wyndham Fallsview</h2>
    <h3><i class="	fa fa-map-marker"></i> 6519 Stanley Avenue, Niagara Falls, ON L2G 7L2</h3>
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
        <h2>Days Inn By Wyndham Fallsview</h2>
        <address><i class="fa fa-map-marker"></i> 6519 Stanley Avenue, Niagara Falls, ON L2G 7L2</address>
         <p>Located centrally in Niagara Falls, Ontario, Days Inn By Wyndham Fallsview is a 20-minute walk or less from attractions like Skylon Tower, Niagara Fallsview Casino, Niagara Falls, and IMAX Theatre.</p>

<p>The hotel has a 24-hour front desk, onsite ATM, daily housekeeping, and free WiFi in public areas. Paid parking is available.</p>

<p>All rooms have air-conditioning, heating, a TV and private bathroom. There is a seasonal outdoor swimming pool and a casino.</p>

<p>Buffet breakfast is served every morning. There is an in-house restaurant, which serves American cuisine.</p>

<p>The hotel can accommodate groups, couples and families. Horseshoe Falls is just 0.6 km from the hotel. You can visit the website below for package deals.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Up to 2 children below 16 years can stay free of charge when using existing beds.</li>
        <li>Children or adults are charged 10 CAD per night for extra beds.</li>
        <li>Only one extra bed per room is allowed.</li>
        <li>A crib is provided free of charge for children under 2 years.</li>
        </ul>
        
		<p>Please click on the button below for more details on Days Inn By Wyndham Fallsview.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/d-i-fallsview-casino-niagara-falls-ontario.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
