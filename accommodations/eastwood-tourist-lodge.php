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
<link rel="canonical" href="<?=SITEURL;?>/eastwood-tourist-lodge" />
<title>Eastwood Tourist Lodge, Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/eastwood-tourist-lodge.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Eastwood Tourist Lodge</h2>
    <h3><i class="fa fa-map-marker"></i> 4465 Eastwood Crescent, Niagara Falls, ON L2E 1A8</h3>
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
        <h2>Eastwood Tourist Lodge</h2>
        <address><i class="fa fa-map-marker"></i> 4465 Eastwood Crescent, Niagara Falls, ON L2E 1A8</address>
         <p>Eastwood Tourist Lodge is a 4-bedroom vacation rental home in Niagara Falls, Ontario, Canada. It is a nonsmoking residence with a spacious living room, dining area, kitchen, sun room, 4 bedrooms and 1 bathroom.</p>

<p>The property provides its guests free onsite private parking and free WiFi. The house, built in 1925, has modern amenities like air conditioning and central heating, </p>

<p>Bird Kingdom and Fallsview Indoor Waterpark are only a 10-minute walk (0.5 km) from the house. Clifton Hill is about 1 km away, while Niagara Falls is 2 km away.</p>

<p>Guests can walk to all the attractions or drive if they have their own vehicle or rented one. Guests also have access to an assortment of bikes at the house. You can explore Niagara Falls on the bikes. There are many bike trails too! </p>

<p>A complimentary breakfast prepared by Chef Joseph Hughes is served at the adjacent Niagara Grandview Manor. There are many options to choose from. Dietary restrictions and food preferences can be accommodated upon prior intimation.</p>

<p>Guests can make their own meals in the fully equipped kitchen. The property has a garden and backyard with patio. Daily housekeeping is provided.</p> 

<p>Stay in total comfort in this lovely 2-storey house located in a quiet neighbourhood.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Up to 2 children under 16 years of age are charged per night when using existing beds.</li>
        <li>Extra beds cannot be accommodated in the bedrooms.</li>
        </ul>
        
        <p>Please click on the button provided below to know more about Eastwood Tourist Lodge.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/eastwood-tourist-lodge.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
