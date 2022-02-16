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
<meta name="description" content="Budget inn with free parking and WiFi. 15-20 minutes walking distance from Clifton Hill, Fallsview area and the Falls."/>
<meta name="keywords" content="Niagara Falls Canada Hotels"/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Niagara Falls Courtside Inn | Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/courtside-inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Falls Courtside Inn</h2>
    <h3><i class="	fa fa-map-marker"></i> 5640 Stanley Avenue, Niagara Falls, ON L2G 3X5</h3>
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
        <h2>Niagara Falls Courtside Inn</h2>
        <address><i class="fa fa-map-marker"></i> 5640 Stanley Avenue, Niagara Falls, ON L2G 3X5</address>
         <p>Located in Niagara Falls, Canada, the Niagara Falls Courtside Inn is about 1.6 km from the Falls area. It offers rooms at very low rates and is easily accessible to all the main tourist attractions in Niagara Falls, Ontario.</p>

<p>Rooms at the inn have air conditioning, heating, a work desk, TV and free WiFi. Some of the rooms have a spa bath. Hairdryer is available upon request.</p>

<p>There is an outdoor pool where guests can relax. There is outdoor furniture and barbecue facilities. Free onsite parking is one of the good things about this inn.</p>

<p>There are many restaurants in the area where guests can have breakfast and other meals. There are convenience stores just 5 minutes from the inn.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Up to 2 children under 12 years stay free of charge when using existing beds.</li>
        <li>There is no space for extra beds in the guest rooms.</li>
        </ul>
        
		<p>To know more about the types of rooms available, room rates, facilities and customer reviews, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/camelot-inn.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
