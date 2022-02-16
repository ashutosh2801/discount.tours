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
<meta name="description" content="Perfect rental home to stay in while sightseeing in Niagara Falls, Canada. Four-bedroom house with 3 baths, kitchen, dining & living rooms. 3 km from Falls, free parking, "/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-gateway" />
<title>Niagara Gateway | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-gateway.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Gateway</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 5K5</h3>
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
        <h2>Niagara Gateway</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 5K5</address>
         <p>This property in a residential area is a 20-minute walk (1.3 km) from Lundy's Lane, 3 km from Niagara Falls and is close to the highway.</p>

<p>This property with spacious grounds has 4 bedrooms, a living room, dining room, fully equipped kitchen, washing machine and 3 bathrooms. There is a flat-screen TV in every bedroom and living room.</p>

<p>The house has space to sleep 14 people. It is within walking distance from Lundy's Lane and a short drive from Niagara Falls area and attractions along Niagara Parkway.</p>

<p>Guests can enjoy the outdoors as the property has a backyard with deck and barbecue facilities.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in the house.</li>
        <li>Pets are allowed on request, but guests may be charged extra.</li>
        </ul>
        
        <p>To know more about Niagara Gateway, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-gateway.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
