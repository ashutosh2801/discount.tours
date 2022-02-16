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
<meta name="description" content="One-bedroom condo in Niagara Falls, Canada with kitchen, parking and free WiFi. This vacation rental is cosy and a short drive from the Falls. Affordable rates!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/junior-presidential" />
<title>Junior Presidential | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/junior-presidential.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Junior Presidential</h2>
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
        <h2>Junior Presidential</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 4N1</address>
         <p>Vacation rentals are quite popular with visitors to Niagara Falls, Canada, as they provide all the comforts of a home and more space.</p>

<p>This condo is 1.8 km from Horseshoe Falls and 2.2 km from American Falls. It features a living room with TV, kitchen with all appliances and kitchenware, dining area, 1 bedroom and a bathroom.</p>

<p>The property is neat and well-maintained. Other amenities at the property include free WiFi, a washing machine, and parking space.</p>

<p>There are many tourist attractions and restaurants a short drive away. The property is 2.1 km from Niagara Fallsview Casino Resort and a short drive from Horseshoe Falls.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are permitted on prior request. Charges may apply.</li>
        <li>There is no space for extra beds in the condo.</li>
        </ul>
        
        <p>Please click on the button below to know about availability and pricing of this vacation rental.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/junior-presidential.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
