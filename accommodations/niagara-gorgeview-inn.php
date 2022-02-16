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
<meta name="description" content="A 4-bedroom house with view of the Niagara River and Gorge, sleeps 9. Free parking, free WiFi, 1.3 km from American and 2 km from Horseshoe Falls. Enjoy free breakfast."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-gorgeview-inn" />
<title>Niagara Gorgeview Inn – Niagara Falls Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-gorgeview-inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Gorgeview Inn</h2>
    <h3><i class="fa fa-map-marker"></i> 5401 River Road, Niagara Falls, ON L2E 3H1</h3>
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
        <h2>Niagara Gorgeview Inn</h2>
        <address><i class="fa fa-map-marker"></i> 5401 River Road, Niagara Falls, ON L2E 3H1</address>
         <p>This 4-bedroom, 3 bathroom vacation home is located on River Road (Niagara Parkway) in Niagara Falls. It has a spacious living room, dining room and kitchen.</p>

<p>The house is like a home away from home. Customer service is available onsite for any issues.</p>

<p>Guests will be renting the entire home and it is ideally suited for a large family or group.</p>

<p>Built in 1912, this beautiful home has been functioning as a bed and breakfast since the 1920s. The house has a columned front porch where guests can sit and enjoy the view.</p>

<p>The property has many trees, a rear deck and spacious backyard, ideal for children to play in.</p>

<p>Free WiFi and private parking are available on site. There is an assortment of bicycles available at the house that guests are welcome to use.</p>

<p>It is just a 20-minute walk to Niagara Falls from the property. Clifton Hill, Casino Niagara, Bird Kingdom and other attractions are all within walking distance. </p>

<p>Breakfast is included in the room price and is served at an adjacent property, Niagara Grandview Manor.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>There is no space for extra beds in the house.</li>
        </ul>
        
        <p>Please click below for more details about rooms, rates and booking.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-gorgeview-inn.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
