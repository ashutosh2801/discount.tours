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
<meta name="description" content="Less than 1 km from Niagara Falls, rooms at Quality Hotel Fallsview Cascade are big, clean, affordable, comfortable. Enjoy free parking and WiFi, complimentary breakfast."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/quality-hotel-fallsview-cascade" />
<title>Quality Hotel Fallsview Cascade – Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/quality-hotel-fallsview-cascade.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Quality Hotel Fallsview Cascade</h2>
    <h3><i class="fa fa-map-marker"></i> 5305 Murray Street, Niagara Falls, ON L2G 2J3</h3>
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
        <h2>Quality Hotel Fallsview Cascade</h2>
        <address><i class="fa fa-map-marker"></i> 5305 Murray Street, Niagara Falls, ON L2G 2J3</address>
         <p>If you want to be close to the Falls and other popular Niagara Falls Canada attractions, Quality Hotel Fallsview Cascade is the hotel for you. It is across the street from Fallsview Casino Resort and just 0.6 km from Horseshoe Falls.</p>

<p>The hotel provides many amenities and has elegant rooms. The rooms are spacious with comfortable beds, ensuite bathroom, free WiFi, TV, coffee maker, work desk, iron and ironing board, and hair dryer.</p>

<p>Some of the rooms have balconies, whirlpool bathtubs, or partial views of the American Falls. It is perfect for business travellers and tourists.</p>

        <h3><i class="fa fa-sticky-note"></i> Some of the amenities at Quality Hotel Fallsview Cascade are</h3>
        <ul class="facilities">
        <li>Free onsite parking</li>
        <li>24-hour free coffee in the lobby</li>
        <li>Free WiFi</li>
        <li>Indoor heated pool and hot tub</li>
        <li>Complimentary continental breakfast</li>
        </ul>
        <p>Guests will be 15-20 walking distance from Clifton Hill, Casino Niagara, Hornblower Niagara Cruises, restaurants and other attractions.</p>
		<p>Book a room at Quality Hotel Fallsview Cascade for a pleasant and memorable stay.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>One child under 16 years stays free of charge when using existing beds.</li>
        <li>Children or adults will be charged per night for extra beds.</li>
        <li>Only 1 extra bed per room is allowed.</li>
        </ul>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/quality-fallsview-cascade.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
