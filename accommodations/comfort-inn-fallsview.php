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
<meta name="description" content="Comfort Inn Fallsview is a family friendly hotel within walking distance from all attractions. Enjoy free breakfast and WiFi. Affordable rates. Book today!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/comfort-inn-fallsview" />
<title>Comfort Inn Fallsview - Niagara Falls Canada Hotels | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/comfort-inn-fallsview.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Comfort Inn Fallsview</h2>
    <h3><i class="	fa fa-map-marker"></i> 6645 Fallsview Boulevard, Niagara Falls, ON L2G 7G1</h3>
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
        <h2>Comfort Inn Fallsview</h2>
        <address><i class="fa fa-map-marker"></i> 6645 Fallsview Boulevard, Niagara Falls, ON L2G 7G1</address>
         <p>Comfort Inn Fallsview is close to all the Falls area attractions, making it one of the most popular hotels in Niagara Falls, Ontario, Canada.</p>

<p>It is just 0.5 km from Horseshoe Falls. Skylon Tower and American Falls are at 15-20 minutes' walking distance.</p>

<p>Guests can take the Falls Incline Railway, located right across the street from the hotel, to reach Table Rock Centre and Niagara Parkway.</p>

<p>The hotel features indoor and outdoor swimming pools. It also offers free WiFi and free breakfast. It has 2 onsite restaurants – The Country Chalet and My Cousin Vinny's which serves Italian-American cuisine</p> 

<p>All the guest rooms have free WiFi, a flat-screen TV, desk and chairs, and coffee maker. Some rooms have a private balcony.</p>

<p>Paid public parking is available. Comfort Inn Fallsview is a favourite with couples and families as it very close to Niagara Falls.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Parking is available, but is paid parking.</li>
        <li>Only 1 extra bed per room is allowed.</li>
        <li>One child under 16 years can stay free of charge when using existing beds.</li>
        <li>Any additional older children or adults are charged per night for an extra bed.</li>
        </ul>
        
		<p>For more information regarding Comfort Inn Fallsview, please click on the button given below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/ci-fallsview-fallsview-canada.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
