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
<meta name="description" content="Set in a Victorian-era home, Blue Gables B&B offers free parking, WiFi and breakfast. 5 minutes from Falls (2.8 km) by WEGO bus. Great for couples!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/blue-gables-bed-and-breakfast" />
<title>Blue Gables Bed and Breakfast, Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/blue-gables-bed-and-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Blue Gables Bed and Breakfast </h2>
    <h3><i class="fa fa-map-marker"></i> 4305 Simcoe Street, Niagara Falls, ON L2E 1T5</h3>
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
        <h2>Blue Gables Bed and Breakfast </h2>
        <address><i class="fa fa-map-marker"></i> 4305 Simcoe Street, Niagara Falls, ON L2E 1T5</address>
         <p>Built in the late 1800s, this renovated Victorian home now offers bed and breakfast facilities to tourists. Located on a quiet street, Blue Gables is about 2-3 km from Niagara Falls (30-40 minutes walking distance).</p>

<p>The Niagara River and Gorge are a mere 5-minute walk from Blue Gables.</p>

<p>The property is 15 minutes walking distance from attractions like Bird Kingdom, Casino Niagara, Fallsview Indoor Waterpark and more. The train and bus stations are minutes away.</p>

<p>Blue Gables offers complimentary breakfast every morning. The menu offers American, vegetarian, gluten-free, and vegan breakfasts.</p>

<p>The property is decorated with a lot of antiques and ornate furniture. The B&B has a common living room with TV, dining room and a sun room.</p>

<p>The rooms are spacious and non-smoking. They have air conditioning, heating, an alarm clock, free WiFi, and private bathrooms.</p>

<p>The hosts are friendly and strive to make your stay comfortable.</p>

<p>There is a WEGO bus stop close to the B&B. Guests can reach the centre of Niagara Falls tourist area within 5 minutes by the WEGO shuttle, which runs frequently.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children cannot be accommodated at Blue Gables.</li>
        <li>One extra bed in a room can be arranged upon prior request.</li>
        <li>Any additional adults are charged 35 CAD per night for an extra bed.</li>
        <li>Pets are not allowed.</li>
        </ul> 
        
		<p>For more details regarding Blue Gables Bed and Breakfast, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/blue-gables-bed-and-breakfast.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
