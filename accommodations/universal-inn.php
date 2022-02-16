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
<meta name="description" content="Short walk to Niagara Falls, affordable, free parking, free WiFi. Rooms with fridge, microwave and TV."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Universal Inn and Suites – Budget Stays in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Universal-Inn-and-Suites.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Universal Inn and Suites</h2>
    <h3><i class="	fa fa-map-marker"></i> 6000 Stanley Avenue, Niagara Falls, ON L2G 3Y1</h3>
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
        <h2>Universal Inn and Suites</h2>
        <address><i class="fa fa-map-marker"></i>  6000 Stanley Avenue, Niagara Falls, ON L2G 3Y1</address>
         <p>Universal Inn and Suites is 0.4 km from Skylon Tower and about 1 km from Niagara Fallsview Casino Resort, Clifton Hill and Casino Niagara.</p>

<p>The inn offers accommodations at very low prices in addition to free WiFi and free parking.</p>

<p>Guest rooms have air conditioning, heating, a TV, fridge, microwave, coffeemaker, sitting area and private bathroom. Select rooms have spa baths.</p>

<p>Niagara Falls is 1.2 km from the inn. There are many restaurants in the area.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Children under 12 years stay free of charge when using existing beds.</li>
        <li>Older children and adults are charged per person per night whether using existing beds or extra beds.</li>
        <li>One extra bed is allowed per room.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>For more information on Universal Inn and Suites, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/universal-inn-and-suites.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
