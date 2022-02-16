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
<meta name="description" content="With splendid views of Niagara River and Gorge, Niagara Classic Inn provides comfortable rooms, free breakfast, free parking and WiFi. 30-minute walk to Falls area. Free bicycle rentals."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Niagara Classic Inn | Affordable Accommodations in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Classic-Inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Classic Inn</h2>
    <h3><i class="	fa fa-map-marker"></i> 5395 River Road, Niagara Falls, ON L2E 3H1</h3>
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
        <h2>Niagara Classic Inn</h2>
        <address><i class="fa fa-map-marker"></i>  5395 River Road, Niagara Falls, ON L2E 3H1</address>
         <p>Niagara Classic Inn is an old property located on historic River Road, which is a section of the scenic Niagara Parkway. River Road has a large number of historical properties overlooking Niagara River and Gorge.</p>

<p>Guest rooms feature flat-screen TVs, free WiFi, air conditioning, heating, refrigerators, and a sitting area. Free toiletries and a hairdryer are provided in the bathrooms.</p>

<p>The inn also provides bed linen and towels as well as daily maid service. Onsite free parking is also provided.</p>

<p>Made-to-order breakfast is served every morning at a sister property close by, the Niagara Grandview Manor. The chef prepares meals for guests with dietary preferences or restrictions too.</p>

<p>Guests can walk down picturesque Niagara Parkway to all the attractions along it.</p>

<p>The closest attraction to the inn is Bird Kingdom, just a 10-minute walk away. Clifton Hill, Fallsview area, Casino Niagara and Hornblower Niagara Cruises are all within walking distance (around 1 km).</p>

<p>The property is set back from the road and is far from the din of the tourist area. Some of the rooms have balconies that look out on Niagara Parkway and the Niagara River.</p>

<p>Free bicycle rentals are also provided. The location and the beauty of this well-maintained property is liked by guests.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
		<p>Please click on the button below to know more about Niagara Classic Inn.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/nataya-bed.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
