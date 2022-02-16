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
<meta name="description" content="Experience first-class accommodations, gorgeous views of Niagara Falls, and many other facilities. A short walk to all attractions, directly connected to Fallsview Casino."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/hilton-niagara-falls-fallsview-hotel-and-suites" />
<title>Hilton Niagara Falls/Fallsview Hotel and Suites – Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/hilton-niagara-falls-fallsview-hotel-and-suites.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Hilton Niagara Falls/Fallsview Hotel and Suites</h2>
    <h3><i class="fa fa-map-marker"></i> 6361 Fallsview Boulevard, Niagara Falls, ON L2G 3V9</h3>
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
        <h2>Hilton Niagara Falls/Fallsview Hotel and Suites</h2>
        <address><i class="fa fa-map-marker"></i> 6361 Fallsview Boulevard, Niagara Falls, ON L2G 3V9</address>
         <p>Hilton Niagara Falls/Fallsview Hotel and Suites is located in the popular Fallsview area of Niagara Falls, Canada, and is only 15-20 minutes' walking distance from the Falls.</p>

<p>Guests can spend time at neighbouring Fallsview Casino, which is connected to the hotel by a heated and air conditioned indoor glass walkway.</p>

<p>Each guest room is equipped with a flat-screen HDTV, free WiFi, coffee maker, hairdryer, work desk and sitting area. Some of the rooms have an in-room hot tub and views of the Falls.</p>

        <h3><i class="fa fa-sticky-note"></i> The hotel features a number of on-site dining options</h3>
        <ul class="facilities">
        <li>Brasa Brazilian Steakhouse serving traditionally grilled meats.</li>
        <li>Pranzo Ristorante Italiano serves authentic Italian cuisine.</li>
        <li>Watermark Restaurant has stunning floor-to-ceiling views of the American and Horseshoe Falls.</li>
        <li>Grand Caffee Breakfast Buffet</li>
        <li>Myst Lounge</li>
        <li>Spyce Lounge</li>
        <li>Mercato Market Café</li>
        <li>Frontier BBQ & Smokehouse</li>
        </ul>
        
        <p>Other facilities include an on-site ATM, room service, indoor pool with a 30-foot spiraling waterslide, hot tub, sauna, fitness centre, business centre, and conference facilities for corporate guests.</p>

<p>Skylon Tower is just a 5-minute walk from the hotel. Guests can walk to all attractions (15-30 minutes). Paid parking at the hotel is available.</p>

<p>The Hilton Niagara Falls/Fallsview Hotel and Suites is a 5-minute drive from the US border crossing at Rainbow Bridge.</p>

<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>One child under 12 years stays free of charge when using existing beds.</li>
        <li>All children or adults are charged per night for extra beds.</li>
        <li>Only 1 extra bed per room is allowed.</li>
        </ul>

        
		<p>For more information about pricing, deals, and room availability at Hilton Niagara Falls/Fallsview Hotel and Suites, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/hilton-niagara-falls-fallsview.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
