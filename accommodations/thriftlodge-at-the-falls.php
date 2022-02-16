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
<meta name="description" content="Located in Clifton Hill and walking distance to all attractions, Thriftlodge at the Falls is affordable, has free WiFi. Paid parking onsite."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/thriftlodge-at-the-falls" />
<title>Thriftlodge at the Falls | Affordable Hotels in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/thriftlodge-at-the-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Thriftlodge at the Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 4945 Clifton Hill, Niagara Falls, ON L2G 3N5</h3>
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
        <h2>Thriftlodge at the Falls</h2>
        <address><i class="fa fa-map-marker"></i> 4945 Clifton Hill, Niagara Falls, ON L2G 3N5</address>
         <p>Located in the very busy Clifton Hill, Thriftlodge at the Falls is right next to many attractions. Guests can walk within 5 minutes to the Niagara SkyWheel, Casino Niagara, and Fallsview Indoor Waterpark.</p>

<p>American Falls is 0.8 km away, while Horseshoe Falls is 1.3 km away.</p>

<p>Guest rooms have a TV, coffee-making facilities, air conditioning and heating. Free WiFi is available in all areas of the hotel.</p>

<p>Guests can relax in the outdoor heated pool onsite. Other facilities include a 24-hour front desk and a laundromat. Private parking is also available onsite (charges apply).</p>

<p>There are many restaurants in the area. The motel features a karaoke bar in the parking lot.</p>

<p>The convenient location of the hotel and affordable rates are what bring guests to this hotel in Clifton Hill.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Up to 2 children below 16 years can stay free of charge when using existing beds.</li>
        <li>Extra beds cannot be accommodated in the rooms.</li>
        </ul>
        
        <p>Please click on the button below for more information on Thriftlodge at the Falls.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/thriftlodge-at-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
