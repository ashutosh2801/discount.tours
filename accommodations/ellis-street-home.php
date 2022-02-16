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
<meta name="description" content="Eastwood Tourist Lodge is a 4-bedroom vacation rental with free parking, free WiFi and complimentary breakfast. You can walk to the tourist areas!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/ellis-street-home" />
<title>Eastwood Tourist Lodge, Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/ellis-street-home.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Ellis Street Home</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2E 1H9</h3>
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
        <h2>Ellis Street Home</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2E 1H9</address>
         <p>Ellis Street Home is a 3-bedroom home in a lovely neighbourhood with onsite parking, spacious front and backyards. </p>

<p>The home has a living room, dining area, kitchen, a bathroom and 3 bedrooms. It is furnished with a TV, air conditioning, BBQ facilities.</p>

<p>The property provides free private parking and free WiFi. There is sleeping space for 8 people. It is a great place to stay in Niagara Falls, Canada.</p>

<p>All the attractions are a short drive away. Niagara Falls is about 3 km away. Casino Niagara and Bird Kingdom are at 15-20 minutes walking distance.</p>

<p>Explore Niagara Falls' neighbourhoods by staying at this vacation rental. Have the freedom to cook, have a picnic in the backyard or just spend time together in the living area.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are welcome, but charges may apply.</li>
        <li>Extra beds cannot be accommodated in the rooms.</li>
        </ul>
        
        <p>Please click on the button below to know more about pricing, availability, and terms and conditions for renting Ellis Street Home.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/updated-3-bdrm-minutes-to-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
