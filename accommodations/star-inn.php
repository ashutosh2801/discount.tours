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
<meta name="description" content="Budget motel with free WiFi, free parking, clean comfortable rooms, short drive to Niagara Falls. Rooms have fridge, TV and microwave."/>
<meta name="keywords" content="hotels in Niagara Falls Canada, free parking"/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Star Inn By Elevate Rooms | Budget Hotels In Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Star-Inn-By-Elevate-Rooms.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Star Inn By Elevate Rooms</h2>
    <h3><i class="	fa fa-map-marker"></i>  8627 Lundy's Lane, Niagara Falls, ON L2H 1H5</h3>
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
        <h2>Star Inn By Elevate Rooms</h2>
        <address><i class="fa fa-map-marker"></i> 8627 Lundy's Lane, Niagara Falls, ON L2H 1H5</address>
         <p>This low priced motel in Lundy's Lane is a well maintained property with a garden, plenty of open space, and guest rooms that are clean and comfortable.</p>

<p>Guests can park their vehicles right outside their rooms. Parking is absolutely free unlike paid parking available at bigger hotels. Free WiFi is available in all areas of the motel.</p>

<p>Guest rooms have comfortable beds, air conditioning, heating, flat-screen TV, fridge and a microwave.</p>

<p>Other facilities include an outdoor BBQ, picnic area, vending machines, business center and onsite convenience store.</p>

There are many restaurants within walking distance from the motel. Niagara Falls (6 km) and other attractions are just a short drive from the motel.
</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
		<p>To find out more details or to make a booking at Star Inn By Elevate Rooms, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/a1-star-inn.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
