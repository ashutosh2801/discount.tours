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
<meta name="description" content="4-bedroom modern, fully furnished vacation home with kitchen, backyard with deck & outdoor furniture, BBQ facilities. Sleeps 7. It is 2.6 km from Niagara Falls. Free parking and WiFi."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/thundering-waters-retreat" />
<title>Thundering Waters Retreat | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/thundering-waters-retreat.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Thundering Waters Retreat</h2>
    <h3><i class="fa fa-map-marker"></i> Lionshead Avenue, Niagara Falls, ON L2G 7S4</h3>
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
        <h2>Thundering Waters Retreat</h2>
        <address><i class="fa fa-map-marker"></i> Lionshead Avenue, Niagara Falls, ON L2G 7S4</address>
         <p>This fully furnished modern house consisting of a living area, kitchen, dining area, 4 bedrooms and bathrooms is exceptionally clean and well maintained. It is a 20-minute walk to Marineland and 1.8 km from Horseshoe Falls.</p>

<p>Guests can relax on the deck in the backyard. There is a playground for kids. The living room has a flat-screen TV. The kitchen has a dishwasher and an oven amongst other appliances.</p>

<p>There are supermarkets and restaurants a short drive from the house. Niagara Falls and other attractions are 10-15 minutes' driving distance from the house.</p>

<p>Free private parking is available on site. Free WiFi is available in all areas of the house.</p>

<p>Thundering Waters Retreat is perfect for a family. The detached property gives you privacy and the house is spacious.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Extra beds cannot be accommodated.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
        <p>Please click on the button below for more details on Thundering Waters Retreat, check availability and make a booking.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/thundering-waters-retreat.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
