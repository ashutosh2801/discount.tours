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
<meta name="description" content="Providing a relaxed, quiet atmosphere, huge grounds, a spa, and indoor swimming pool, Peninsula Inn is perfect for families, business travellers or couples. Large rooms free WiFi, free parking."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/peninsula-inn" />
<title>Peninsula Inn | Niagara Falls Canada Accommodations | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/peninsula-inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Peninsula Inn</h2>
    <h3><i class="fa fa-map-marker"></i> 7373 Niagara Square Drive, Niagara Falls, ON L2H 1J2</h3>
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
        <h2>Peninsula Inn</h2>
        <address><i class="fa fa-map-marker"></i> 7373 Niagara Square Drive, Niagara Falls, ON L2H 1J2</address>
         <p>Peninsula Inn provides a peaceful and relaxing retreat for its guests. Standing on more than 4 acres of parkland, this resort has gardens and a chapel to hold weddings.</p>

<p>There are different types of rooms available. Some of the suites have a living room and a kitchenette.</p>

<p>All rooms have air conditioning, heating, a safe, TV, and ensuite bathroom.</p>

<p>Some of the facilities at the resort include a fitness centre, spa, indoor pool, sauna, jacuzzi, vending machines, onsite ATM, meeting/banquet facilities, free WiFi in all areas and more.</p>

<p>Free private parking is available at the hotel.</p>

<p>There are restaurants just 100 metres from the resort. All the attractions are a short drive away.</p>

<p>Make a booking online at the Peninsula Inn for a refreshing and hassle-free vacation.</p>

        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Up to 2 children under 12 years stay free of charge when using existing beds.</li>
        <li>There are no extra beds available.</li>
        </ul>
        
		<p>To make a booking and to know more about Peninsula Inn, please click the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/peninsula-inn-resort.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
