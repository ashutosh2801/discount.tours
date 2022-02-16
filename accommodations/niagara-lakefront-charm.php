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
<meta name="description" content="A serene, beautiful house by Lake Ontario with 2 bedrooms and every comfort of home. Free parking, free WiFi. A 25-minute drive to Niagara Falls. Sleeps 6."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-lakefront-charm" />
<title>Niagara Lakefront Charm – Niagara Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-lakefront-charm.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Lakefront Charm</h2>
    <h3><i class="fa fa-map-marker"></i> Dalhousie Avenue, Niagara Falls, ON L2N 4W4</h3>
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
        <h2>Niagara Lakefront Charm</h2>
        <address><i class="fa fa-map-marker"></i> Dalhousie Avenue, Niagara Falls, ON L2N 4W4</address>
         <p>This beautiful property on the shores of Lake Ontario is the perfect place to stay for a vacation. The house has a private yard by the lake with chairs and barbecue.</p>

<p>The house has 2 bedrooms, 2 bathrooms, a fully equipped kitchen, dining room, and living room. The house can sleep 6 guests.</p>

<p>Guests can relax in the backyard which overlooks Lake Ontario. Large rooms lavishly decorated await the arrival of guests. There is a TV in almost every room.</p>

<p>This property is in Port Dalhousie, about 23 km from Niagara Falls. The drive to Niagara Falls will take about 25 minutes.</p>

<p>There is free private parking at the property and free WiFi in all areas of the house.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Prior permission is required for bringing pets. Charges may apply.</li>
        <li>Extra beds cannot be accommodated in the rooms.</li>
        </ul>
        
        <p>Please click on the button provided below for more information on the vacation rental property Niagara Lakefront Charm.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-lakefront-charm.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
