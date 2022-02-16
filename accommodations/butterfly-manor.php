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
<meta name="description" content="Overlooking the Niagara River, Butterfly Manor offers comfortable rooms at great prices. Complimentary breakfast, beautiful grounds, free parking and WiFi!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/butterfly-manor" />
<title>Butterfly Manor – Niagara Falls Canada Bed And Breakfasts | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/butterfly-manor.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Butterfly Manor </h2>
    <h3><i class="fa fa-map-marker"></i> 4917 River Road, Niagara Falls, ON</h3>
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
        <h2>Butterfly Manor </h2>
        <address><i class="fa fa-map-marker"></i> 4917 River Road, Niagara Falls, ON</address>
         <p>Butterfly Manor is located on Niagara Parkway, which along the Niagara River. This B&B is popular with tourists as it offers free parking, free WiFi in public areas, non-smoking rooms, and a complimentary breakfast.</p>

<p>The property is well maintained with beautiful grounds and a garden area. It is within walking distance from many attractions, and is 30-35 minutes walking distance from the Falls.</p>

<p>There is also a WEGO bus stop close by (the bus shuttle that takes you to Niagara Falls attractions).</p>
        
        <h3><i class="fa fa-bed"></i> Butterfly Manor has 5 types of rooms</h3>
        <ul class="facilities">
        <li>King room with 1 king bed</li>
        <li>Queen room with 1 queen bed</li>
        <li>Small family suite with 1 twin bed and 1 queen bed</li>
        <li>Large family suite with 3 twin beds and 1 queen bed</li>
        <li>Twin room with 2 twin beds</li>
        </ul>
        
        <p>Each room has a TV, air conditioning, heating, and en suite bathroom. There is an exercise gym too for the fitness conscious guest.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children are welcome at Butterfly Manor.</li>
        <li>There is no space for extra beds in the rooms.</li>
        <li>One child under 12 years will be charged 50 CAD per night when using existing beds.</li>
        </ul>
        
		<p>Please click on the button given below to know more about Butterfly Manor.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/butterfly-manor.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
