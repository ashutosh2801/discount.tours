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
<meta name="description" content="Modern vacation rental within walking distance from the Falls and other attractions. Free parking and WiFi. Accommodates 7 people. Book online now!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/clifton-hill-condos-3b" />
<title>Clifton Hill Condos 3B – Niagara Vacation Rental | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/clifton-hill-condos-3b.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Clifton Hill Condos 3B</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 3R9</h3>
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
        <h2>Clifton Hill Condos 3B</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 3R9</address>
         <p>Stay at this 2-bedroom condo in Clifton Hill for your Niagara Falls vacation. Vacation rentals are fast becoming the preferred choice of visitors to Niagara Falls. Guests have total privacy, more space and all the comforts of a home.</p>

<p>The Clifton Hill Condo is within 10-15 minutes walking distance from many restaurants and Clifton Hill tourist attractions like Niagara Skywheel.</p>

<p>There is free parking at the condo. Niagara Falls is just a 20-minute walk/5-minute drive from the condo.</p>

<p>The condo has 2 bedrooms, a bathroom, living area and a kitchen with dining table.</p>

<p>After a day of sightseeing, guests can relax together in the living area and watch TV. They can even cook their own meals in the fully equipped kitchen. There is air conditioning, heating and free WiFi too.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are allowed, but charges may apply.</li>
        <li>Children are welcome.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
        <p>Please click on the button provided below for more information about the condo, rent and availability.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/clifton-hill-condos-3b.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
