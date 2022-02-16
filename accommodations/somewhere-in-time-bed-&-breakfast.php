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
<meta name="description" content="Quaint home 1.5 km from Horseshoe Falls. Charming décor; free WiFi, parking and breakfast. Clean and perfect place! Walking distance to many attractions."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/somewhere-in-time-bed-&-breakfast" />
<title>Somewhere in Time Bed And Breakfast – Niagara Falls Canada B&Bs | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/somewhere-in-time-bed-&-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Somewhere In Time Bed and Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 5969 Culp Street, Niagara Falls, ON L2G 2B6</h3>
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
        <h2>Somewhere In Time Bed and Breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 5969 Culp Street, Niagara Falls, ON L2G 2B6</address>
         <p>Somewhere In Time Bed And Breakfast is a cosy little place managed by very cordial and helpful hosts. It is located in a quiet neighbourhood 20 minutes' walking distance from Skylon Tower and Niagara Fallsview Casino Resort.</p>

<p>Each guest room comes with air conditioning, heating, a flat-screen TV, microwave and a private bathroom.</p>

<p>A full English/Irish breakfast is served every morning in the common dining room.</p>

<p>Free onsite private parking and free WiFi is provided.</p>

<p>Guests love this B&B as it is in a quiet neighbourhood, is clean and well maintained, and just a short drive to Niagara Falls and other attractions.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children cannot be accommodated at this B&B. </li>
        <li>Pets are not allowed.</li>
        <li>There is no space for extra beds in the guest rooms.</li>
        </ul>
        
		<p>Please click on the button below to know more about Somewhere In Time Bed And Breakfast.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/somewhere-in-time-bed-and-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
