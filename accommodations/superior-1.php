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
<meta name="description" content="Two-bedroom apartment with free parking and free WiFi, 5-minute drive to Niagara Falls, 20-25 minute walk to Niagara Fallsview Casino, sleeps 4."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/superior-1" />
<title>Superior 1 | Vacation Rentals in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/superior-1.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Superior 1</h2>
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
        <h2>Superior 1</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 4N1</address>
         <p>A modern furnished apartment in a quiet neighbourhood, Superior 1 has 2 bedrooms, a living/kitchen area and a bathroom. There is a queen bed in each bedroom, making the apartment ideal for a group of 4.</p>

<p>The property is exceptionally clean with new furniture – guests can enjoy a hassle-free vacation here. There are many restaurants in the area.</p>

<p>The tourist area is about a 5-minute drive from the apartment. Skylon Tower is 1.6 km and </p>

<p>Free parking is available on site. Free WiFi is also available in the apartment.</p>

<p>It is a great place for relaxation and a good night's sleep after an exhaustive day of sightseeing.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Extra beds are not available.</li>
        <li>Pets are allowed on request (extra charges may apply).</li>
        </ul>
        
        <p>To find out more details about Superior 1, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/superior-drummond-road-1.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
