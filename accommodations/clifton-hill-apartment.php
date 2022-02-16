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
<meta name="description" content="Book this apartment for your vacation in Niagara Falls, Canada. Facilities include free parking and WiFi. Affordable, close to the Falls, hosts up to 8 persons."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/clifton-hill-apartment" />
<title>Clifton Hill Apartment – Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/clifton-hill-apartment.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Clifton Hill Apartment</h2>
    <h3><i class="fa fa-map-marker"></i> 4937 Walnut Street, Niagara Falls, ON L2G 3N1</h3>
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
        <h2>Clifton Hill Apartment</h2>
        <address><i class="fa fa-map-marker"></i> 4937 Walnut Street, Niagara Falls, ON L2G 3N1</address>
         <p>Renting a house at a holiday destination is one of the best ways to spend a vacation.</p>

<p>There are many vacation rental properties in Niagara Falls, Canada, whether it be houses or apartments.</p>

<p>This apartment is ideal for a family. It has a living room, kitchen, dining area, 3 bedrooms and a bathroom. The property also has free private parking onsite and free WiFi.</p>

<p>The apartment is in a quiet neighbourhood, yet is within walking distance from various Niagara Falls attractions. Casino Niagara, Clifton Hill amusements, Hornblower Niagara Cruises, etc., are within 15 minutes walking distance.</p>

<p>Niagara Falls is a 5-minute drive away (30-35 minutes by foot).</p>

<p>The apartment is adequate for a group of 8 people. Guests can use the fully equipped kitchen. It is like a home away from home.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
        <p>To check for availability and other details regarding this apartment, please click on the button given below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/clifton-hill-apartment.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
