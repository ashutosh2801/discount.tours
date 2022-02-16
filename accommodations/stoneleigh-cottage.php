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
<meta name="description" content="Beautiful cottage across Niagara River and Gorge, 2 km from Niagara Falls. Has 4 bedrooms, sleeps 8, free WiFi and parking. Backyard with deck and BBQ."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/stoneleigh-cottage" />
<title>Stoneleigh Cottage | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/stoneleigh-cottage.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Stoneleigh Cottage</h2>
    <h3><i class="fa fa-map-marker"></i> 5127 River Road, Niagara Falls, ON L2H 3G6</h3>
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
        <h2>Stoneleigh Cottage</h2>
        <address><i class="fa fa-map-marker"></i> 5127 River Road, Niagara Falls, ON L2H 3G6</address>
         <p>Stoneleigh Cottage is a lovely place to spend your Niagara Falls vacation in. This property on River Road is across the Niagara River and Gorge.</p>

<p>The house has free private parking and free WiFi for guests. There is also a backyard that has a garden, deck and BBQ facilities.</p>

<p>Guests staying at the cottage enjoy a beautiful living room with TV, dining area, fully equipped kitchen, and 4 bedrooms. Bathrooms have hairdryers.</p>

<p>Other facilities on this property include air condtitioning, heating, smoke-free property, iron, fireplace, wardrobes, free toiletries, and outdoor dining area.</p>

<p>Niagara Falls and other attractions are just a 5-minute drive from the property. There are many restaurants close to the house, with a Tim Hortons just 0.3 km from the house.</p>

<p>Stoneleigh Cottage is a fairly large house that is clean, comfortable and affordable.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Up to 3 children under 6 years stay free of charge when using existing beds.</li>
        <li>One extra bed is allowed in a room.</li>
        </ul>
        
        <p>For more information on Stoneleigh Cottage, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/stoneleigh-cottage.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
