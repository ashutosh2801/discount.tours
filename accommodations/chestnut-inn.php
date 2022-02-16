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
<meta name="description" content="Historic B&B overlooking Niagara Gorge and 2 km from Niagara Falls. It offers free WiFi, parking, and breakfast. The rooms have a fireplace, air conditioning."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Chestnut Inn | Niagara Falls Canada Accommodations | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Chestnut-Inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Chestnut Inn </h2>
    <h3><i class="	fa fa-map-marker"></i> 4983 River Road, Niagara Falls, ON L2E 3G6</h3>
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
        <h2>Chestnut Inn</h2>
        <address><i class="fa fa-map-marker"></i> 4983 River Road, Niagara Falls, ON L2E 3G6</address>
         <p>This quaint, charming colonial house, built in the 1800s, stands in 1 acre grounds with a beautiful garden and many majestic chestnut trees.</p>

<p>Chestnut Inn is the quintessential bed and breakfast with elegant Victorian style rooms and Victorian-era décor. The property overlooks Niagara River Gorge and is a 5-minute drive from Niagara Falls.</p>

<p>The property provides free parking and free WiFi in all areas.</p>

<p>Common areas include a library, living room, indoor and outdoor porches, and dining room. Guests are provided continental breakfast every morning in the dining room.</p>

<p>Attractions like Casino Niagara, Bird Kingdom, and Whirlpool State Park are just a 5-minute drive from the Chestnut Inn.</p>

<p>All rooms have air conditioning, a fireplace and a private bathroom.</p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children are welcome.</li>
        <li>Upto 2 children below 16 years are charged per night when using existing beds.</li>
        <li>Extra beds are not available.</li>
        </ul>
        
		<p>For further information regarding pricing and room availability, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/chestnut-inn.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
