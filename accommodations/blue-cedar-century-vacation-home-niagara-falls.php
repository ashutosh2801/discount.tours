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
<meta name="description" content="A picturesque vacation home, Blue Cedar Century Vacation Home offers free WiFi and free parking. 1 km from Skylon Tower, it has 4 bedrooms. Perfect for a group of 12."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/blue-cedar-century-vacation-home-niagara-falls" />
<title>Blue Cedar Century Vacation Home – Niagara Falls Ontario | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/blue-cedar-century-vacation-home-niagara-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Blue Cedar Century Vacation Home Niagara Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 5921 Delaware Street,Niagara Falls, ON L2G 2E4</h3>
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
        <h2>Blue Cedar Century Vacation Home Niagara Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5921 Delaware Street,Niagara Falls, ON L2G 2E4</address>
         <p>This 4-bedroom house dates back to 1926 and is located in a quiet neighbourhood. It is a 15-minute walk to Skylon Tower and Niagara Fallsview Casino Resort from the house. Niagara Falls is 30 minutes away by foot.</p>

<p>The propery has a lovely garden in the front and a spacious backyard. There is free parking on the property.</p>

<p>This vacation rental property has a living room, dining room, sitting area, kitchen, 4 bedrooms and 2 bathrooms. It has all the amenities that a house would have.</p>

<p>The beds and futon are adequate for a party of 12.</p>

<p>The house has free WiFi and a TV in the living room. Guests can relax in the backyard and cook on the barbecue.</p>

<p>The kitchen has all appliances like stovetop, refrigerator, microwave, oven and coffee machine. It also has all kitcheware.</p>

<p>Guests can use the washing machine and dryer. </p>

<p>There are many restaurants in the area. Feel at home in this lovely house after a long day of sightseeing. For entertainment, the property has DVDs, board and video games, books, puzzles and music.</p>

<p>Make your Niagara Falls vacation a leisurely experience by booking this lovely home in the centre of Niagara Falls.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Daily housekeeping attracts additional charges.</li>
        <li>Children are welcome.</li>
        <li>No extra beds or cribs are available.</li>
        </ul>
        
        <p>Please click on the button provided below for further information on Blue Cedar Century Vacation Home.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/blue-cedar-century-vacation-home-niagara-falls-ontario.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
