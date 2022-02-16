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
<meta name="description" content="A cosy hostel with dorm rooms, private rooms and family rooms. Free parking, WiFi and breakfast are included. A 5-minute walk from Greyhound Canada and train station. Short drive to Niagara Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/hostelling-international-niagara-falls" />
<title>Hostelling International Niagara Falls – Niagara Falls Canada Budget Stays | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/hostelling-international-niagara-falls.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Hostelling International Niagara Falls</h2>
    <h3><i class="fa fa-map-marker"></i> 4549 Cataract Avenue, Niagara Falls, ON L2E 3M2</h3>
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
        <h2>Hostelling International Niagara Falls</h2>
        <address><i class="fa fa-map-marker"></i> 4549 Cataract Avenue, Niagara Falls, ON L2E 3M2</address>
         <p>Hostelling International Niagara Falls is a hostel just 200 metres from Greyhound Canada and the train station. Free parking is available at the hostel. Free WiFi and breakfast are provided for guests.</p>

<p>The hostel has men-only dorm rooms, female-only dorms, mixed dorms, family rooms, single rooms and double rooms. The dorms and family rooms have bunk beds. The single and double rooms have full beds or twin beds.</p>

<p>Shared facilities include kitchen, dining area, laundry facilities, bathrooms and a common room. The common room has a lounge area with TV, billiards table, and darts.</p>

<p>Rooms have air conditioning and heating. Bicycles for rent are also available.</p>

<p>Horseshoe Falls is about 4 km away and Casino Niagara 2 km. The closest landmarks are Whirlpool State Park (0.6 km), Whirlpool Aero Car (1.3 km) and Niagara Helicopters (1.6 km).</p>

<p>There are BBQ facilities, outdoor sitting area and a terrace too.</p>

<p>A well maintained and neat hostel!</p>

        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
		<li>Children are welcome.</li>
        </ul>
        
		<p>Please click on the button provided below for more details on Hostelling International Niagara Falls.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/hostelling-international-niagara-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
