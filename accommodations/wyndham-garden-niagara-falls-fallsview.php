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
<meta name="description" content="Located just minutes from Niagara Falls, Wyndham Garden Niagara Falls Fallsview offers well-maintained, spacious rooms at great prices. Has a swimming pool, fitness centre & more!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/wyndham-garden-niagara-falls-fallsview" />
<title>Wyndham Garden Niagara Falls Fallsview</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/wyndham-garden-niagara-falls-fallsview.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Wyndham Garden Niagara Falls Fallsview</h2>
    <h3><i class="fa fa-map-marker"></i> 6170 Stanley Avenue, Niagara Falls, ON L2G 3Y4</h3>
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
        <h2>Wyndham Garden Niagara Falls Fallsview</h2>
        <address><i class="fa fa-map-marker"></i> 6170 Stanley Avenue, Niagara Falls, ON L2G 3Y4</address>
         <p>Wyndham Garden Niagara Falls Fallsview is conveniently located in the Fallsview area and is roughly 1 km from Niagara Falls. Paid parking and free WiFi is provided.</p>

<p>This clean and well-maintained property offers spacious accommodations and many amenities at very reasonable rates. The rooms are quite luxurious with flat-screen TVs, a seating area, and a private bathroom with toiletries. Wolfgang Puck tea and coffee-making facilities are also provided in each room.</p>

<p>Guests can enjoy many onsite facilities like a fitness centre, heated indoor swimming pool, jacuzzi, coffee shop, kids' games room, etc. Other amenities include vending machines, onsite ATM, gift shop, and business center.</p>

<p>Skylon Tower is just 0.4 km away, other attractions are also within walking distance. Guests do not have to go far to eat as there are many restaurants in the area.</p>

<p>Wyndham Garden Niagara Falls Fallsview is perfect for families and offers good value for money.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>The maximum number of extra beds allowed in a room is 1.</li>
        <li>All children under 17 years stay free of charge when using existing beds.</li>
        <li>Older children and adults are charged per person per night when using existing beds.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
        <p>Please click on the button below to know more about the facilities, rooms and rates at Wyndham Garden Niagara Falls Fallsview.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/wyndham-garden-niagara-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
