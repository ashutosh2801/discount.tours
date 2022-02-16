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
<meta name="description" content="Lowest room rates, free WiFi and parking, 10-15 minute walk to Clifton Hill and Casino Niagara."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Scottish Inn Near The Falls and Casino – Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Scottish-Inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Scottish Inn Near The Falls and Casino</h2>
    <h3><i class="	fa fa-map-marker"></i>  5265 Lorne Street, Niagara Falls, ON L2G 1G7</h3>
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
        <h2>Scottish Inn Near The Falls and Casino</h2>
        <address><i class="fa fa-map-marker"></i> 5265 Lorne Street, Niagara Falls, ON L2G 1G7</address>
         <p>Scottish Inn Near The Falls and Casino is just a 10-15 minute walk from Casino Niagara and all the attractions in Clifton Hill.</p>

<p>The hotel rooms have comfortable beds, a TV, air conditioning, heating, and free WiFi.</p>

<p>Horseshoe Falls is about 1.7 km from the hotel. There are many restaurants and markets within walking distance from the hotel.</p>

<p>The staff is friendly. Other facilities include free parking, onsite laundry facilities, daily housekeeping, BBQ facilities, and currency exchange.</p>

<p>If you are looking for budget accommodations with free parking, Scottish Inn Near The Falls and Casino is one of the properties you can check out.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Extra beds cannot be accommodated in the rooms.</li>
        </ul>
        
		<p>Please click on the button provided below to know more about Scottish Inn Near The Falls and Casino, its room rates, availability and other features.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/scottish-inn-near-the-falls-and-casino.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
