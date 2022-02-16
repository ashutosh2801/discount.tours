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
<meta name="description" content="The hotel provides comfortable accommodations for your Niagara Falls vacation. It has a swimming pool, on-site restaurants. You can walk to Clifton Hill attractions. Close to the Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/days-inn-by-wyndham-niagara-falls-clifton-hill-casino" />
<title>Days Inn by Wyndham Niagara Falls Clifton Hill Casino – Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/days-inn-by-wyndham-niagara-falls-clifton-hill-casino.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Days Inn By Wyndham Niagara Falls Clifton Hill Casino</h2>
    <h3><i class="	fa fa-map-marker"></i> 5657 Victoria Avenue, Niagara Falls, ON L2G 3L5</h3>
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
        <h2>Days Inn By Wyndham Niagara Falls Clifton Hill Casino</h2>
        <address><i class="fa fa-map-marker"></i> 5657 Victoria Avenue, Niagara Falls, ON L2G 3L5</address>
         <p>Located in the centre of Clifton Hill tourist district, Days Inn By Wyndham Niagara Falls Clifton Hill Casino is just a short walk from the Falls area and its attractions.</p>

<p>All rooms feature a flat-screen TV, air conditioning, desk and chair, sitting area, coffee maker, ironing facilities and ensuite bathroom. </p>

<p>The hotel has 2 onsite restaurants and a bar – Remington's of Niagara and Applebee's Bar and Grill.</p>

<p>Guests can explore Clifton Hill's many attractions and restaurants. Relax at the indoor swimming pool! The hotel offers free WiFi and paid parking.</p>

<p>There are many other amenities offered to make your stay comfortable and hassle-free. There are many types of family rooms and suites to choose from. Package deals are also offered.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Up to 2 children below 12 years can stay free of charge when using existing beds.</li>
        <li>One older child or adult is charged per night when using existing beds or an extra bed.</li>
        <li>One child under 4 years can stay free of charge in a crib.</li>
        <li>There is space for just 1 extra bed in a room.</li>
        </ul>
        
		<p>For more details regarding check-in, check-out, room availability and pricing, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/d-i-clifton-hill-niagara-falls-ontario.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
