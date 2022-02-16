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
<meta name="description" content="Housed in a 19th century building, this quaint bed and breakfast offers views of Niagara River and Gorge. Short drive to Falls. Free parking, WiFi and breakfast."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Niagara Grandview Manor | Niagara Falls Canada B&Bs | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-grandview-manor.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Grandview Manor</h2>
    <h3><i class="	fa fa-map-marker"></i> 5359 River Road, Niagara Falls, ON L2E 3G9</h3>
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
        <h2>Niagara Grandview Manor</h2>
        <address><i class="fa fa-map-marker"></i> 5359 River Road, Niagara Falls, ON L2E 3G9</address>
         <p>Niagara Grandview Manor is the oldest Bed and Breakfast in the Niagara region.</p>

<p>Originally built in 1891, this award-winning facility started out as a bed and breakfast inn in 1961.</p>

<p>The property has many trees and greenery, and sits about 50 feet above street level on Niagara Parkway.</p>

<p>Guests can enjoy great views of the Niagara Gorge and River from their rooms. The property is directly across the Schellkopf Power Plant ruins.</p>

<p>This Victorian-era building has lovely porches and balconies. Its landscaped garden and grounds are open to visitors.</p>

<p>Each unit has a TV, air conditioning, refrigerator and a seating area. Free toiletries and hairdryer are featured in the bathrooms. Free bicycle rentals are available (please bring your own helmet).</p>

<p>Enjoy complimentary cooked to order breakfast every morning. The spectacular Niagara Falls is just a 20-minute walk from the Manor.</p>

<p>If you are staying for more than a day, you can explore Niagara wine region with a guided Niagara-on-the-Lake Wine Tour.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Up to 2 children less than 12 years are allowed when using existing beds, but extra charges per night apply.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
		<p>Please click on the button below for availability of rooms, pricing and making reservations.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-grandview-manor.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
