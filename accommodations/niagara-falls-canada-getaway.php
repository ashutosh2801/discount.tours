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
<meta name="description" content="Located minutes from the Falls, this 3-bedroom holiday rental has a kitchen, 2 bathrooms, free parking and WiFi. It is a 5-minute walk to many restaurants and markets."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-falls-canada-getaway" />
<title>Niagara Falls Canada Getaway | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-falls-canada-getaway.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Falls Canada Getaway</h2>
    <h3><i class="fa fa-map-marker"></i> 5801 Prince Edward Avenue, Niagara Falls, ON L2G 5J4</h3>
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
        <h2>Niagara Falls Canada Getaway</h2>
        <address><i class="fa fa-map-marker"></i> 5801 Prince Edward Avenue, Niagara Falls, ON L2G 5J4</address>
         <p>Niagara Falls Canada Getaway in Niagara Falls, Canada is a lovely home located approximately 3 km from Niagara Falls. Most of the attractions are just a 5-minute drive from the property.</p>

<p>The property features a garden, a huge backyard affording privacay and where kids can play, free WiFi, 2 flat-screen TVs, living and dining rooms, fully equipped kitchen, bathrooms and 3 bedrooms.</p>

<p>This clean, well maintained and beautiful property provides bed linen, towels and other essentials.</p>

<p>There are many restaurants and supermarkets within less than 5 minutes walking distance from the house.</p>

<p>Instead of being cramped up in hotel rooms, visitors to Niagara Falls, Canada can book this spacious house having onsite free parking.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in the house.</li>
        </ul>
        
        <p>Please click on the button below for more information on Niagara Falls Canada Getaway.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-falls-canada-getaway.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
