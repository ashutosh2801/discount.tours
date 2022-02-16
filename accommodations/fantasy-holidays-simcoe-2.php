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
<meta name="description" content="Three-bedroom apartment with paid parking, free WiFi. A 10-minute drive to Niagara Falls viewing area, 1.3 km from Casino Niagara. Has everything a family needs. Accommodates 6 people."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/fantasy-holidays-simcoe-2" />
<title>Fantasy Holidays Simcoe 2 | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/fantasy-holidays-simcoe-2.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Fantasy Holidays Simcoe 2</h2>
    <h3><i class="fa fa-map-marker"></i> 4405 Simcoe Street, Niagara Falls, ON L2E 1T7</h3>
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
        <h2>Fantasy Holidays Simcoe 2</h2>
        <address><i class="fa fa-map-marker"></i> 4405 Simcoe Street, Niagara Falls, ON L2E 1T7</address>
         <p>This vacation rental apartment on Simcoe Street, Niagara Falls, Ontario offers all the comforts and privacy of a home. It has a fully equipped kitchen, living room with TV, dining area, patio and garden, barbecue facilities, and 3 bedrooms.</p>

<p>Clifton Hill, Casino Niagara, Whirlpool State Park, Bird Kingdom and Fallsview Indoor Waterpark are just a 15-20 minute walk from the apartment. Niagara Falls is about 2.1 km from the apartment.</p>

<p>Guests can drive down to the various tourist sights in Niagara Falls, Ontario. The apartment is air-conditioned and nonsmoking. It can accommodate 6 persons.</p>

<p>Towels, linens, hairdryer and other amenities are provided. Free toiletries are available in the bathrooms. Guests can cook their own meals.</p>

<p>Other facilities include washing machine and dryer, kitchenware, microwave, and more.</p>

<p>Free WiFi is available in all areas of the apartment. Onsite private parking is available and will cost $10 CAD per day.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>All children under 12 years are charged CAD 30 per night for extra beds.</li>
        <li>Additional older children or adults are charged CAD 50 per night for extra beds.</li>
        </ul>
        
        <p>To know about property availability, pricing and other details, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/fantasy-holidays-simcoe-2.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
