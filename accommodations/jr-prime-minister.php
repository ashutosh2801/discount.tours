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
<meta name="description" content="A one-bedroom vacation rental condo in a great neighbourhood. Has a washing machine, kitchen, all the comforts of a home. Free WiFi, free parking. It is just 2 km from Niagara Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/jr-prime-minister" />
<title>Jr Prime Minister – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/jr-prime-minister.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Jr Prime Minister</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 4N1</h3>
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
        <h2>Jr Prime Minister</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 4N1</address>
         <p>This property is a single-bedroom condo with modern furnishings.  It has a living area with a flat-screen TV, dining area, modern fully-equipped  kitchen and a bathroom.</p>
<p>The condo has a washing machine too! Guests can cook their own  meals.</p>
<p>Horseshoe Falls is about a 20-minute walk from the property.  American Falls, Casino Niagara and Rainbow Bridge are 2-3 km away.</p>
<p>Parking is available at the property. Free WiFi is provided. Clean  and neat surroundings. This property is ideal for the solo traveller or a  couple.</p>
<p>There is a microwave and refrigerator, so guests can store food  and reheat it.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
      <li>Pets are allowed on request, but charges may apply.</li>
      <li>Extra beds cannot be accommodated.</li>
        </ul>
        
        <p>For more details regarding check-in, availability, and other amenities, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/jr-prime-minister.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
