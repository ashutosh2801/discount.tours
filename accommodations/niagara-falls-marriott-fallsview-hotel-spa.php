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
<meta name="description" content="Enjoy 5-star accommodations, fantastic views and facilities at the Niagara Falls Marriott Fallsview Hotel and Spa. It is 0.4 km from Horseshoe Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-falls-marriott-fallsview-hotel-spa" />
<title>Niagara Falls Marriott Fallsview Hotel & Spa - Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-falls-marriott-fallsview-hotel-spa.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Falls Marriott Fallsview Hotel & Spa</h2>
    <h3><i class="fa fa-map-marker"></i> 6740 Fallsview Boulevard, Niagara Falls, ON L2G 3W6</h3>
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
        <h2>Niagara Falls Marriott Fallsview Hotel & Spa</h2>
        <address><i class="fa fa-map-marker"></i> 6740 Fallsview Boulevard, Niagara Falls, ON L2G 3W6</address>
         <p>This luxury hotel's guest rooms provide a TV, mini bar, hair dryer, coffee maker and individual climate control. Select rooms have a hot tub/jacuzzi or fireplace.</p>

<p>Serenity Spa by the Falls is the hotel's boutique spa facility. The spa has a sauna, steam room, hot tubs, and an extensive selection of Dermalogica products and treatments.</p>

<p>Just a stone's throw away from Horseshoe Falls, the hotel has rooms with fantastic views of Niagara Falls. Guests can book rooms with a view.</p>

<p>The hotel has a shuttle service that takes guests to the casino and other attractions.</p>

<p>The US border crossing at Rainbow Bridge is about 6-minute drive from the hotel. American Falls and Clifton Hill are about 20-25 minute walk from the hotel.</p>

<p>There are 3 restaurants onsite and a Starbucks in the lobby. Paid parking is available and free WiFi is accessible only in the hotel lobby.</p>

<p>Other amenities include an indoor pool, fitness centre, business centre, gift shop, and currency exchange.</p>

        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Only 1 extra bed can be accommodated in a room.</li>
        </ul>
        
		<p>For more information regarding Niagara Falls Marriott Fallsview Hotel & Spa, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/marriott-niagara-falls-fallsview-spa.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
