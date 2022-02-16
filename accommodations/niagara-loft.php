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
<meta name="description" content="Luxury accommodations in spacious vacation home with 4 bedrooms, living and dining rooms, and kitchen. Sleeps 14, free parking, free WiFi, 11 km from Niagara Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-loft" />
<title>Niagara Lakeview Retreat – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-loft.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Loft</h2>
    <h3><i class="fa fa-map-marker"></i> 4681 Huron Street, Niagara Falls, ON L2E 2H7</h3>
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
        <h2>Niagara Loft</h2>
        <address><i class="fa fa-map-marker"></i> 4681 Huron Street, Niagara Falls, ON L2E 2H7</address>
         <p>The accommodations offered at Niagara Loft are comfortable, neat, modern and very affordable.</p>

<p>Two lofts are available and have been designed in the open concept style. There is bedroom space with private bathroom.</p>

<p>Each loft has air conditioning, living room space and a kitchen with dining space.</p>

<p>The living room space has a flat-screen TV and a sofa bed. The kitchen has a fridge, stove, and a microwave. The lofts have beautiful décor, and each loft can sleep 4 persons.</p>

<p>It is a 5-minute drive (3 km) to Niagara Falls from the loft. Casino Niagara and Bird Kingdom are just 1.5 km from the property.</p>

<p>Free public parking and free WiFi is available. There are restaurants, cafes and markets at 5 minutes' walking distance from the property.</p>

<p>Niagara Loft is a peaceful retreat in the busy tourist town of Niagara Falls, Canada. The hosts are extremely helpful.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Up to 2 children under 6 years are charged per night when using existing beds.</li>
        <li>There is no space for extra beds in the loft.</li>
        </ul>
        
        <p>To know more about Niagara Loft, please follow the button given below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-loft.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
