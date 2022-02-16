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
<meta name="description" content="Bed of Roses B&B offers a guest suite with its own private entrance. Accommodates 4. It is a short walk from Niagara Falls, Bird Kingdom, etc."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/bed-of-roses-bed-and-breakfast" />
<title>Bed of Roses Bed and Breakfast – Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/bed-of-roses-bed-and-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Bed of Roses Bed and Breakfast</h2>
    <h3><i class="	fa fa-map-marker"></i> 4877 River Road, Niagara Falls, ON L2E 3G5</h3>
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
        <h2>Bed of Roses Bed and Breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 4877 River Road, Niagara Falls, ON L2E 3G5</address>
         <p>Bed of Roses Bed and Breakfast is a 40-minute drive from Buffalo Airport, USA.</p>

<p>This place is ideal for couples. It is just 1.5 km (0.9 miles) from Casino Niagara and 2.2 km (1.4 miles) from the American Falls.</p>

<p>The guest suite has a separate entrance with a terrace and sun deck. The suite has a sitting area with flat-screen TV and pull-out sofa, a small dining area with a kitchenette, a bedroom and a bathroom.</p>

<p>The kitchenette is equipped with a stove, microwave, utensils and fridge.</p>

<p>Free parking is another great feature of this place. Feel at home in this cosy place not far off from the Falls area. Enjoy total privacy.</p>

<p>Enjoy free WiFi. Guests can relax on a private deck, overlooking Niagara River Gorge.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>No extra bed can be accommodated in the rooms.</li>
        <li>Children are not allowed.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>Please click on the button below to check for availability, pricing, and to make a reservation.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/bed-of-roses-bed-amp-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
