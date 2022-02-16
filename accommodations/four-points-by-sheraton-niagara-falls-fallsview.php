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
<meta name="description" content="A few minutes' walk from all attractions, Four Points by Sheraton Niagara Falls has guest rooms with views of the Falls. Directly connected to Fallsview Casino, has free WiFi."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/four-points-by-sheraton-niagara-falls-fallsview" />
<title>Four Points by Sheraton Niagara Falls Fallsview - Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/four-points-by-sheraton-niagara-falls-fallsview.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Four Points by Sheraton Niagara Falls Fallsview</h2>
    <h3><i class="fa fa-map-marker"></i> 6455 Fallsview Boulevard, Niagara Falls, ON L2G 3V9</h3>
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
        <h2>Four Points by Sheraton Niagara Falls Fallsview</h2>
        <address><i class="fa fa-map-marker"></i> 6455 Fallsview Boulevard, Niagara Falls, ON L2G 3V9</address>
         <p>Located in the Fallsview district, this hotel has guest rooms that either have a city view or a Falls view.</p>

<p>Each room also has a cable TV, a work desk and chair, a sitting area, and a private bathroom with complimentary toiletries. Some of the rooms have a whirlpool spa bath.</p>

<p>Other amenities include an indoor heated pool, jacuzzi, fitness centre, 6 meeting rooms, and 24-hour business centre. Guests enjoy countless other amenities too. Children will love the arcade games at the hotel's Fun Zone.</p>

<p>The hotel has many dining options, whether it be East Side Mario's Restaurant serving Italian cuisine, Ruth's Chris Steakhouse or an IHOP Restaurant. There is also an onsite Starbucks Café.</p>

<p>The Niagara Falls viewing area is just 10-15 minutes from the hotel. Guests can walk to most of the popular sights. Marineland and Whirlpool Aero Car are a short drive away.</p>

<p>The hotel offers rooms that are clean and well maintained. The staff is very helpful and friendly.</p>

<p>Paid parking is available at the hotel. Free WiFi is available in all areas of the hotel. An indoor glass walkway connects the hotel to the Niagara Fallsview Casino.</p>

<p>Book a room at Four Points by Sheraton Niagara Falls Fallsview for a great Niagara Falls vacation.</p>

        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>All children under 17 years stay free of charge when using existing beds.</li>
        <li>Older children or adults are charged CAD 15 per night when using existing rooms.</li>
        <li>Older children or adults are charged CAD 25 per night when using extra beds.</li>
        <li>Only 1 extra bed per room is allowed.</li>
        </ul>
        
		<p>Please click on the button provided below for information regarding room availability, pricing, etc.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/fallsview-plaza.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
