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
<meta name="description" content="This hotel is perfect for a family vacation. It has an indoor pool, play park, onsite restaurants, spacious rooms. It is just 2.5 km from Niagara Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/best-western-plus-cairn-croft-hotel" />
<title>Best Western Plus Cairn Croft Hotel – Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/best-western-plus-cairn-croft-hotel.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Best Western Plus Cairn Croft Hotel </h2>
    <h3><i class="	fa fa-map-marker"></i> 6400 Lundy's Lane, Niagara Falls, ON L2G 1T6</h3>
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
        <h2>Best Western Plus Cairn Croft Hotel</h2>
        <address><i class="fa fa-map-marker"></i> 6400 Lundy's Lane, Niagara Falls, ON L2G 1T6</address>
         <p>Best Western Plus Cairn Croft Hotel is 2 km from Clifton Hill and 2.5 km from Niagara Falls. The hotel's attractions include a variety of onsite dining options and a courtyard pool. There is a gym/fitness room for guests.</p>

<p>It also features an enclosed courtyard with a swimming pool and a garden where guests can relax. There is also a playpark for kids. Guests can relax at the pool and enjoy drinks </p>

<p>Every room has a TV, telephone, free WiFi, mini refrigerator, large closet space with luggage stand, hairdryer, iron with ironing board, adjustable air conditioning, and ensuite bathroom. Some of the rooms have a balcony/patio or a living area.</p>

<p>Different rooms have different facilities. Private paid parking is available on site.</p>

<p>The on-site Doc Magilligan's Restaurant and Irish Pub serves breakfast, lunch and dinner daily, and provides entertainment from Thursday to Sunday.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Extra beds cannot be accommodated.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>Please click on the button below to know more details and make a booking at Best Western Plus Cairn Croft Hotel.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/bw-cairn-croft.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
