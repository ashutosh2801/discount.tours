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
<meta name="description" content="A 2-bedroom house with private parking, playground and free WiFi. Includes a kitchen, dining and living rooms. Short drive from the Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/deco-cottage" />
<title>Cozy Vacation Home, Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/deco-cottage.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Deco Cottage</h2>
    <h3><i class="fa fa-map-marker"></i> 4308 Ellis Street, Niagara Falls, ON L2E 1H1</h3>
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
        <h2>Deco Cottage</h2>
        <address><i class="fa fa-map-marker"></i> 4308 Ellis Street, Niagara Falls, ON L2E 1H1</address>
         <p>This lovely home is 0.5 km (10-minute walk) from Greyhound Canada and the train station. It features a living room with flat-screen TV and fireplace, a dining room, a fully equipped kitchen, 2 bedrooms and a bathroom.</p>

<p>Guests can park their vehicle on the property for free. The house also has a garden and outdoor furniture.</p>

<p>Other facilities include free WiFi in all areas of the house, a washing machine and dryer, iron, refrigerator and other kitchen appliances. The entire unit is on the ground floor.</p>

<p>Attractions like Skylon Tower and Niagara Falls are a short drive away (10 minutes).</p>

<p>Make Deco Cottage your home away from home! It is tastefully decorated and has a lot of amenities.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in the bedrooms.</li>
        <li>The house is a smoke-free property.</li>
        </ul>
        
        <p>To know more about the facilities at Deco Cottage, its distance from various attractions, pricing and availability, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/deco-cottage.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
