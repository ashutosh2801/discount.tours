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
<meta name="description" content="With free WiFi, parking and a hearty breakfast, Niagara Lodge & Suites gives great value for money. A 10-minute drive to the Falls. Rooms have a fridge and microwave."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-lodge-suites" />
<title>Niagara Lodge & Suites – Niagara Falls Canada Budget Accommodations | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-lodge-suites.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Lodge & Suites</h2>
    <h3><i class="fa fa-map-marker"></i> 7720 Lundy's Lane, Niagara Falls, ON L2H 1H1</h3>
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
        <h2>Niagara Lodge & Suites</h2>
        <address><i class="fa fa-map-marker"></i> 7720 Lundy's Lane, Niagara Falls, ON L2H 1H1</address>
         <p>Just a 10-minute drive from Niagara Falls, Niagara Lodge & Suites has standard rooms and family suites.</p>

<p>Each room has a TV, free WiFi, air conditioning, heating, a safe, work desk, a sitting area, microwave and a mini fridge. Rooms with a spa bath are also available.</p>

<p>Guests get to enjoy a hot breakfast every morning, which is served in the breakfast lounge.</p>

<p>Canada One Factory Outlet and Lundy's Lane Cemetery are 15 minutes' walking distance from the lodge.</p>

<p>The property is located on 2 acres of land. There is lots of open space for parking, which is totally free. There are indoor and outdoor swimming pools.</p>

<p>The bus that takes you to the tourist area stops right outside the lodge. There are many restaurants a short walk from the lodge.</p>

        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Up to 2 children under 17 years stay free of charge when using existing beds.</li>
        <li>Additional older children or adults are charged per person per night when using existing beds.</li>
        <li>One older child or adult is charged CAD 10 per night for an extra bed.</li>
        <li>One child less than 2 years is charged CAD 10 per night in a crib.</li>
        <li>Only 1 extra bed per room is allowed.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>For more details regarding Niagara Lodge & Suites, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-lodge-suites.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA#tab-main" target="_blank">More Details</a></div>
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
