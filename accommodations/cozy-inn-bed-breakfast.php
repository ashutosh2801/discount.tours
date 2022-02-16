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
<meta name="description" content="Enjoy Canadian hospitality at this B&B! A 5-minute drive from the Falls and other attractions, it offers free parking, WiFi and breakfast. Comfortable rooms with TV, private bathroom."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/cozy-inn-bed-breakfast" />
<title>Cozy Inn Bed & Breakfast, Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/cozy-inn-bed-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Cozy Inn Bed & Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 5725 Robinson Street, Niagara Falls, ON L2G 2B3</h3>
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
        <h2>Cozy Inn Bed & Breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 5725 Robinson Street, Niagara Falls, ON L2G 2B3</address>
         <p>Cozy Inn Bed & Breakfast is a lovely little house within walking distance from a number of attractions and restaurants.</p>

<p>Skylon Tower is within 15 minutes walking distance from the house. Farmers' Market and Tim Hortons are just a 10-minute walk from the B&B.</p>

<p>There are 3 guest rooms. One bedroom accommodates 3 persons while the other two are for 2 persons.</p>

<p>Each guest room is tastefully decorated and has a flat-screen internet TV with Netflix, sitting area, air conditioning, heating, and private bathroom with complimentary toiletries. Free WiFi is available in all areas of the B&B.</p>

<p>The property has a lovely garden and backyard, which is open to guests. There is an outdoor fireplace, outdoor furniture, sun deck and BBQ facilities.</p>

<p>The hosts provide breakfast. Guests can choose a Continental, Italian, English/Irish, vegetarian, vegan, gluten-free, kosher, Asian, Or American breakfast. Special requests by guests with dietary restrictions are also accommodated. Tea and coffee are available all day.</p>

<p>Guests can park their vehicles on the property for free!</p>

<p>The hosts are extremely helpful and provide guests with route maps, guidance on places to visit, and coupons to various sights.</p>

<p>This place is ideal for couples, solo travellers or a group.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.
        <li>Children cannot be accommodated at this B&B. </li>
        <li>Extra beds are not available for any room.</li>
        </ul>
        
		<p>Please click on the button provided below for more information regarding Cozy Inn Bed & Breakfast.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/cozy-inn-b.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
