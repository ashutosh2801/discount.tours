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
<meta name="description" content="Just 0.5 km from Casino Niagara, this rental offers free parking, free WiFi. Walking distance to Falls & major attractions. Sleeps 6. Has a kitchen, living and dining rooms, 2 bedrooms."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/ontario-avenue-apt-5481-1" />
<title>Ontario Avenue Apt 5481 #1 | Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/ontario-avenue-apt-5481-1.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Ontario Avenue Apt 5481 #1</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2E 3S4</h3>
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
        <h2>Ontario Avenue Apt 5481 #1</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2E 3S4</address>
         <p>Located 0.4 km (10-minute walk) from Bird Kingdom, Casino Niagara and Fallsview Indoor Waterpark, this Ontario Avenue Apartment has all the facilities of a home, including a living room with TV, dining room, kitchen and 2 bedrooms, bathroom, garden and a patio.</p>

<p>The property also offers free WiFi and free onsite parking. There is a golf course nearby.</p>

<p>Guests are within walking distance from all the attractions in Clifton Hill, Fallsview Boulevard and near Niagara Falls.</p>

<p>Guests can relax in total privacy, prepare their own meals, eat outdoors or in the dining room!</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>There is no room for extra beds in the house.</li>
        <li>If a reservation is cancelled, total amount is non-refundable.</li>
        </ul>
        
        <p>For more information regarding Ontario Avenue Apt 5481 #1, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/ontario-ave-apt-5481-1.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
