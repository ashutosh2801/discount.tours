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
<meta name="description" content="Budget-friendly inn within walking distance from Niagara Falls and other attractions. Hotel has comfortable rooms with TV, paid parking. Just a 5-minute walk to Clifton Hill."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Inn by the Falls – Niagara Falls Canada Hotels | ToNiagara </title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Inn-by-the-Falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Inn by the Falls</h2>
    <h3><i class="	fa fa-map-marker"></i> 5525 Victoria Avenue, Niagara Falls, ON L2G 3L3</h3>
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
        <h2>Inn by the Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5525 Victoria Avenue, Niagara Falls, ON L2G 3L3</address>
         <p>Located near Clifton Hill, Inn by the Falls offers air-conditioned rooms at low rates.</p>

<p>It is a favourite with tourists as it is close to Clifton Hill, the entertainment district of Niagara Falls, Canada. Casino Niagara and Fallsview Indoor Waterpark are just a 5-minute walk from the inn.</p>

<p>Niagara Falls is 20-30 minutes' walking distance or a 5-minute drive from the inn. The inn has paid parking onsite.</p>

<p>All guest rooms have air conditioning, heating, hairdryer, TV, and tea and coffee-making facilities. Some of the rooms have a spa bath. There is no WiFi.</p>

<p>Guests are allowed to use the indoor pool, hot tub and gym of the motel's sister property next door.</p>

<p>There are many restaurants close by.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Parking is available on site, but is not free.</li>
        <li>Children cannot be accommodated at the inn. </li>
        <li>Extra beds cannot be accommodated in the rooms.</li>
        </ul>
        
		<p>For more details, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/inn-by-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
