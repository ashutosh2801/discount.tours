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
<meta name="description" content="Modern house with all comforts of a home, 5 bedrooms, sleeps 12. Short drive to all attractions in Niagara Falls, Canada. Free parking & WiFi!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/stonehaven-niagara-5c" />
<title>Stonehaven Niagara 5C – Vacation Rentals in Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/stonehaven-niagara-5c.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Stonehaven Niagara 5C</h2>
    <h3><i class="fa fa-map-marker"></i> Cropp Street, Niagara Falls, ON L2E 5J8</h3>
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
        <h2>Stonehaven Niagara 5C</h2>
        <address><i class="fa fa-map-marker"></i>  Cropp Street, Niagara Falls, ON L2E 5J8</address>
         <p>For your Niagara Falls vacation this year, try renting out this newly constructed vacation rental instead of staying at a hotel.</p>

<p>With 5 bedrooms and sleeping space for 12 people, Stonehaven Niagara 5C is perfect for a large family or group of friends or colleagues. Free private parking is available at the property, which is located a short distance from Niagara Falls (3.7 km).</p>

<p>Stonehaven Niagara 5C has a spacious living room with flat-screen TV, a fully-equipped modern kitchen, dining space, 5 bedrooms and 2 bathrooms.</p>

<p>There are many restaurants and grocery shops in the area. Niagara Fallsview Casino and Clifton Hill are about 3 km from the vacation home.</p>

<p>The accommodations are so clean and comfortable you will not feel like leaving.</p>

<p>This vacation home gives you complete freedom and privacy.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are allowed (charges may apply).</li>
        <li>Extra beds are not available at this property.</li>
        </ul>
        
        <p>For more details regarding booking, availability and other facilities, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/stonehaven-niagara-5c.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
