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
<meta name="description" content="Hotel with standard rooms & family suites that is 5 minutes away from Clifton Hill. Affordable rates and free WiFi. A 20-30 minute walk to Niagara Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/grand-memories-hotel-&-suites" />
<title>Grand Memories Hotel & Suites – Budget Hotels in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/grand-memories-hotel-&-suites.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Grand Memories Hotel & Suites</h2>
    <h3><i class="fa fa-map-marker"></i> 5577 Ellen Avenue, Niagara Falls, ON L2G 3P5</h3>
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
        <h2>Grand Memories Hotel & Suites</h2>
        <address><i class="fa fa-map-marker"></i> 5577 Ellen Avenue, Niagara Falls, ON L2G 3P5</address>
         <p>Grand Memories Hotel & Suites is just a 5-minute walk from the popular Clifton Hill tourist area. Niagara Falls is a 30-minute walk from the hotel.</p>

<p>The hotel offers rooms that are clean, spacious and reasonably priced. Guests can book their rooms online.</p>

<p>Each guest room has a flat-screen TV, air conditioning, mini fridge, heating and ensuite bathroom. Some of the rooms have a hot tub; children are not permitted in these rooms.</p>

<p>Family suites also have a microwave and some of them have a balcony overlooking the courtyard. Free WiFi is available in all areas of the hotel.</p>

<p>Guests can walk down to Greg Frewin Theatre and Casino Niagara in 5 minutes.</p>

<p>Onsite paid private parking is available. The hotel has an indoor and outdoor swimming pool. Other amenities include daily housekeeping, room service, vending machines, and 24-hour security.</p>

<p>The front desk is available for assistance 24 hours a day. There are many shops and restaurants in the neighbourhood.</p>

<p>This hotel is great for people on a budget; however, the rates can be steep during peak tourist season.</p>

        
		<p>Please click on the button below for more information on the hotel Grand Memories Hotel & Suites.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/americas-best-value-inn-suites-chalet-inn.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
