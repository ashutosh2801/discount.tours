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
<meta name="description" content="A perfect vacation rental for families in Niagara Falls, Canada. With 4 bedrooms, kitchen, free parking & free WiFi. Spacious, new property. Around 6 km/3.7 miles from Niagara Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/modern-family-retreat" />
<title>Modern Family Retreat | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/modern-family-retreat.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Modern 4 Bedroom Escape</h2>
    <h3><i class="fa fa-map-marker"></i> Saint Michael Avenue, Niagara Falls, ON L2H 3N9</h3>
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
        <address><i class="fa fa-map-marker"></i> Saint Michael Avenue, Niagara Falls, ON L2H 3N9</address>
         <p>Feel like you are at home in this spacious 4-bedroom house in Niagara Falls, Canada. Just a short drive from tourist attractions and Niagara Falls, this house has free onsite parking.</p>

<p>The house has amenities like free WiFi, a washing machine, dishwasher, kitchen appliances, ironing facilities, TV and barbecue.</p>

<p>The house would be great for families or a group of friends. It can sleep 8 persons. Children will love having their own bedrooms.</p>

<p>Experience luxury at a very affordable price!</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are allowed, but charges may apply.</li>
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in the house.</li>
        </ul>
        
        <p>For more information regarding availability and pricing, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/modern-family-retreat.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
