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
<meta name="description" content="Affordable rooms with TV, 1.2 km from Casino Niagara. Enjoy free parking, free WiFi and breakfast."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/accommodations-niagara-bed-and-breakfast" />
<title>Accommodations Niagara Bed and Breakfast – Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/accommodations-niagara-bed-and-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Accommodations Niagara Bed and Breakfast </h2>
    <h3><i class="fa fa-map-marker"></i> 5069 River Road, Niagara Falls, ON L2E 3G7</h3>
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
        <h2>Accommodations Niagara Bed and Breakfast </h2>
        <address><i class="fa fa-map-marker"></i> 5069 River Road, Niagara Falls, ON L2E 3G7</address>
         <p>This lovely little place is right across the Niagara River. Guests can enjoy the view of the Niagara River and Gorge.</p>

<p>The property provides free Wi-Fi and free private parking.</p>

<p>Attractions like Casino Niagara, Bird Kingdom are around 1 km away (15-20 minutes by walking).  The Falls area, Skylon Tower and other attractions are all within a 2 km radius from this place.</p>

<p>Guests can enjoy a full breakfast prepared every morning by the hosts. Each room has a TV with cable channels.</p>

<p>The property is away from the tourist district. The calm and quiet neighbourhood is one of the reasons why it is rated high by guests.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children cannot be accommodated at this B&B.</li>
        <li>Pets are not allowed.</li>
        <li>Extra beds cannot be accommodated in the rooms.</li>
        </ul>
        
		<p>Please click on the button below for more details about Accommodations Niagara Bed and Breakfast.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/accommodations-niagara.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA#RD251888204" target="_blank">More Details</a></div>
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
