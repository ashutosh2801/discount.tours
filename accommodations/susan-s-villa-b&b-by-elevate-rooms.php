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
<meta name="description" content="Homely accommodations with free breakfast, WiFi and parking. Two-bedroom suites with private bathroom. 15-minute walk to Clifton Hill. Wonderful hosts, beautiful property!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/susan-s-villa-b&b-by-elevate-rooms" />
<title>Susan's Villa B&B by Elevate Rooms – B&Bs in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/susan-s-villa-b&b-by-elevate-rooms.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Susan's Villa B&B by Elevate Rooms</h2>
    <h3><i class="fa fa-map-marker"></i> 5481 Ontario Avenue, Niagara Falls, ON L2E 3S4</h3>
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
        <h2>Susan's Villa B&B by Elevate Rooms</h2>
        <address><i class="fa fa-map-marker"></i> 5481 Ontario Avenue, Niagara Falls, ON L2E 3S4</address>
         <p>About a 20-minute walk to Clifton Hill, Susan's Villa is located in a quiet neighbourhood that is about 2 km from Horseshoe Falls.</p>

<p>The B&B has a beautiful garden and a spacious backyard with patio and garden furniture. It also offers free onsite parking for its guests.</p>

<p>Susan's Villa B&B is one of the few B&Bs in Niagara Falls, Canada, to offer suites with 2 separate bedrooms and a private bathroom. Each suite has a TV, work desk, refrigerator, alarm clock and hairdryer.</p>

<p>In addition to free parking and free WiFi, guests also enjoy free breakfast every morning.</p>

<p>Niagara Falls is 20 minutes' walking distance from Susan's Villa. Rainbow Bridge, Hornblower Niagara Cruises and Skylon Tower are some of the other attractions within walking distance.</p>

<p>Susan's Villa B&B offers the best value for money in Niagara Falls, Canada.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Additional children or adults are charged extra when using existing or extra beds.</li>
        <li>Each room can have a maximum of 1 extra bed.</li>
        </ul>
        
		<p>Please click on the button below for more details on Susan's Villa B&B by Elevate Rooms.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/susan-s-villa.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
