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
<meta name="description" content="Vacation rental apartment with 1 bedroom, kitchen, bathroom, free parking, free WiFi. Modern & clean. Short drive from Niagara Falls. Sleeps 3."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/suite-serenity-105" />
<title>Suite Serenity – 105 | Vacation Rentals in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/suite-serenity-105.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Suite Serenity – 105</h2>
    <h3><i class="fa fa-map-marker"></i> Drummond Road, Niagara Falls, ON L2G 4N1</h3>
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
        <h2>Suite Serenity – 105</h2>
        <address><i class="fa fa-map-marker"></i> Drummond Road, Niagara Falls, ON L2G 4N1</address>
         <p>Suite Serenity – 105 is located in Niagara Falls, Canada and is about a 20-minute walk from Fallsview Casino Resort. It is a new property and is very neat and well maintained.</p>

<p>The apartment consists of 1 bedroom, a kitchen with dining space, a living area with a sofa bed, and a bathroom. There are flat-screen TVs in the bedroom and living area.</p>

<p>Free parking at the property and free WiFi is also provided.</p> 

<p>All the main tourist areas are within 5 minutes' driving distance from the property. There is a Tim Hortons café 1 km from the apartment.</p>

<p>Book Suite Serenity – 105 for a comfortable and affordable stay in Niagara Falls, Canada.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Extra beds are not available in the apartment.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
        <p>To know more about the other amenities at Suite Serenity – 105, availability and pricing, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/suite-serenity-105.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
