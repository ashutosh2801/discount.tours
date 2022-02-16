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
<meta name="description" content="Just minutes away from the Falls, this 3-star hotel has an indoor swimming pool, rooms with free WiFi, and 24-hour front desk service. Located in Niagara Falls, Ontario."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/days-inn-&-suites-by-wyndham-niagara-falls" />
<title>Days Inn & Suites by Wyndham Niagara Falls Centre Street By The Falls | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/days-inn-&-suites-by-wyndham-niagara-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Days Inn & Suites by Wyndham Niagara Falls Centre Street By The Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 5068 Centre Street, Niagara Falls, ON L2G 3N9</h3>
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
        <h2>Days Inn & Suites by Wyndham Niagara Falls Centre Street By The Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5068 Centre Street, Niagara Falls, ON L2G 3N9</address>
         <p>Days Inn & Suites by Wyndham Niagara Falls Centre Street By The Falls is just 400 metres from Casino Niagara and 1.5 km from Niagara Falls. It is within walking distance from the Falls tourist area, Clifton Hill, and other attractions.</p>

<p>This 3-star hotel has spacious air-conditioned rooms with a private bathroom, TV with satellite channels, work desk and chair, and a coffee machine. Select rooms have a kitchenette with microwave and fridge.</p>

<p>The hotel provides paid parking and free WiFi. Guests can utilize the hotel gym or the heated indoor swimming pool.</p>

<p>Guests love the location, clean rooms, and excellent service. Other services include onsite ATM, 24-hour front desk, currency exchange, laundry, and car rentals.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Upto 2 older children or adults are charged CAD 10 per night when using existing beds.</li>
        <li>One extra bed will be provided upon request and is chargeable.</li>
        </ul>
        
		<p>Please click on the button provided below for information regarding pricing, booking and room availability.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/days-inn-suites-nf-centre-st-by-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
