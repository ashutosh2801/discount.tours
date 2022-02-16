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
<meta name="description" content="This 2-bedroom property is 20-30 minutes' walk from Niagara Falls (2 km). Free parking and WiFi. Has a kitchen and playground! Accommodates 6 persons."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/cottage-by-the-falls" />
<title>Cottage by the Falls – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/cottage-by-the-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Cottage by the Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 5408 Ontario Avenue, Niagara Falls, ON L2E 3S5</h3>
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
        <h2>Cottage by the Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5408 Ontario Avenue, Niagara Falls, ON L2E 3S5</address>
         <p>Just 35 minutes' walking distance from Niagara Falls, Cottage by the Falls is the perfect getaway for a vacation in Niagara Falls, Canada.</p>

<p>The home has a playground, living area, flat-screen TV, kitchen with dining table, 2 bedrooms and a bathroom. Guests also get free parking and free WiFi.</p>

<p>The kitchen is fully equipped. Other facilities include a fireplace, telephone, ironing facilities, coffeemaker, air conditioning, outdoor dining area and furniture, patio and barbecue facilities.</p>

<p>Clifton Hill and its attractions are at 20 minutes' walking distance.</p>

<p>This home is a great place for families as it can accommodate 6 people.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are allowed upon request; however, charges may apply.</li>
        <li>There is no space for extra beds in the cottage.</li>
        </ul>
        
        <p>Please click on the button below for more information on the vacation rental, Cottage by the Falls.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/cottage-by-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
