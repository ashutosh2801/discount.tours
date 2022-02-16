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
<meta name="description" content="New, clean, furnished house with all comforts of home, free parking & free WiFi. Close to everything, 3 km/10-minute drive to Niagara Falls. Sleeps 10 guests."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/modern-4-bedroom-escape" />
<title>Modern 4 Bedroom Escape – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/modern-4-bedroom-escape.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Modern 4 Bedroom Escape</h2>
    <h3><i class="fa fa-map-marker"></i> Caledonia Street, Niagara Falls, ON L2G 5A9</h3>
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
        <h2>Modern 4 Bedroom Escape</h2>
        <address><i class="fa fa-map-marker"></i> Caledonia Street, Niagara Falls, ON L2G 5A9</address>
         <p>Enjoy all the comforts of home in Modern 4 Bedroom Escape, a spacious, modern house just a 10-minute drive from Niagara Falls and other tourist attractions near the Falls.</p>

<p>The detached property features 4 bedrooms, living room with TV, dining room, a kitchen and bathrooms.</p>

<p>The kitchen has all apliances – oven, microwave, fridge, dishwasher, kitchenware, etc.</p>

<p>The property offers its guests free onsite parking and free WiFi. There is also a washing machine. There are supermarkets and restaurants within walking distance.</p>

<p>Guests looking for a well-maintained modern property in a quiet neighbourhood will like this place. The 4 bedrooms can accommodate 10 guests.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Extra beds cannot be accommodated in the house.</li>
        </ul>
        
        <p>To know more about pricing and availability, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/modern-4-bedroom-escape.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA#tab-main" target="_blank">More Details</a></div>
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
