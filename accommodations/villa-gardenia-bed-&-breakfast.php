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
<meta name="description" content="Enjoy spacious rooms; free WiFi, parking & breakfast at Villa Gardenia B&B. 5-minute drive to Niagara Falls & other attractions."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/villa-gardenia-bed-&-breakfast" />
<title>Villa Gardenia Bed & Breakfast | B&Bs in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/villa-gardenia-bed-&-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Villa Gardenia Bed & Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 4741 Zimmerman Avenue, Niagara Falls, ON L2E 3M8</h3>
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
        <h2>Villa Gardenia Bed & Breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 4741 Zimmerman Avenue, Niagara Falls, ON L2E 3M8</address>
         <p>Villa Gardenia Bed & Breakfast in Niagara Falls, Canada, is aptly named as the property has a beautiful garden. This well-maintained, clean and homely B&B is about a 5-minute drive from Niagara Falls (3 km).</p>

<p>Each guest room is spacious and includes comfortable beds, a sitting area, TV, DVD player, air conditioning, heating and a private bathroom. Free WiFi is available in the guest rooms and in all areas of the B&B. </p>

<p>Homecooked American breakfast and coffee is served every morning. Free onsite parking is available.</p>

<p>There are many restaurants a short distance from the house. All the attractions are a short drive away.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children cannot be accommodated at this B&B. </li>
        <li>Pets are not allowed.</li>
        <li>Extra beds are not available.</li>
        </ul>
        
		<p>For more information on Villa Gardenia Bed & Breakfast, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/villa-gardenia-bed-amp-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
