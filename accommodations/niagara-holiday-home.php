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
<meta name="description" content="A short drive from Niagara Falls, these apartments in Niagara Falls Canada offer clean, comfortable and affordable accommodations for vacationers/tourists. Free parking and WiFi."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-holiday-home" />
<title>Niagara Holiday Home – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-holiday-home.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Holiday Home</h2>
    <h3><i class="fa fa-map-marker"></i>  6949 Lundy's Lane, Niagara Falls, ON L2G 1V9</h3>
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
        <h2>Niagara Holiday Home</h2>
        <address><i class="fa fa-map-marker"></i>  6949 Lundy's Lane, Niagara Falls, ON L2G 1V9</address>
         <p>Offering free onsite parking and free WiFi, Niagara Holiday Home is located in historic Lundy's Lane, 3 km from Horseshoe Falls and and 2.6 km from Skylon Tower, one of Niagara Falls' most recognizable landmarks.</p>

<p>Each unit has a flat-screen TV, a kitchen, bedrooms, bathroom, barbecue, bed linen and free toiletries. The kitchen has an oven, microwave, refrigerator, toaster, coffee machine and dishwasher.</p>

<p>Guests can explore Lundy's Lane, which is quite popular with the locals with its restaurants, entertainment and shopping.</p>

<p>All the sights are a short drive away. There are many affordable restaurants in the area.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>There is no room for extra beds in the apartment.</li>
        </ul>
        
        <p>For more details regarding Niagara Holiday Home, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-holiday-home.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
