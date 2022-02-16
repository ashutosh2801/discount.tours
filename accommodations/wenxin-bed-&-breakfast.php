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
<meta name="description" content="Clean rooms with free WiFi, free parking & breakfast. Wenxin Bed & Breakfast is walking distance from Clifton Hill (0.6 km) and Niagara Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/wenxin-bed-&-breakfast" />
<title>Wenxin Bed & Breakfast | B&Bs in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/wenxin-bed-&-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Wenxin Bed & Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 5612 Desson Avenue, Niagara Falls, ON L2G 3T2</h3>
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
        <h2>Wenxin Bed & Breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 5612 Desson Avenue, Niagara Falls, ON L2G 3T2</address>
         <p>Wenxin Bed & Breakfast provides clean and simple accommodations that are close to Clifton Hill, Skylon Tower and Casino Niagara.</p>

<p>The B&B has a common living area and kitchen with dining space. The kitchen is well stocked with cereal and other breakfast supplies. Rooms are clean with shared washrooms.</p>

<p>Guests can easily walk to Niagara Fallsview Casino Resort (1.2 km), American Falls and Horseshoe Falls.</p>

<p>There are many other attractions within walking distance from the B&B – Skylon Tower, Casino Niagara, Hornblower Niagara Cruises, Bird Kingdom and Clifton Hill are a few of them.</p>

<p>There are many restaurants too within a short distance from the B&B. </p>

<p>You get excellent value for money spent at Wenxin Bed & Breakfast.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children 8 years and older are allowed at this B&B. </li>
        <li>An extra bed can be provided for some rooms and is chargeable.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>Please click on the button below to know more about Wenxin Bed & Breakfast.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/wenxin-bed-amp-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
