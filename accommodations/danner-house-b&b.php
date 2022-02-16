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
<meta name="description" content="Historic Danner House is adjacent to Niagara River. Enjoy vast landscaped grounds with pool, free private parking, free WiFi, fantastic views and charming décor. English breakfast is served every morning."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/cozy-inn-bed-breakfast" />
<title>Danner House B&B – Niagara Falls Canada Accommodations | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/danner-house-b&b.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Danner House B&B </h2>
    <h3><i class="fa fa-map-marker"></i> 12549 Niagara Parkway, Niagara Falls, ON L2E 6S6</h3>
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
        <h2>Danner House B&B </h2>
        <address><i class="fa fa-map-marker"></i> 12549 Niagara Parkway, Niagara Falls, ON L2E 6S6</address>
         <p>Set amidst vast grounds, Danner House is located adjacent to the Niagara River. The grounds are well maintained and the scenery is beautiful.</p>

<p>Built in the early 1800s, Danner House is one of the few surviving examples of Upper Canadian Georgian architecture.</p>

<p>Each guest room is furnished with a flat-screen TV, a bed, sitting area, table, and a private bath. The rooms have big windows providing lovely views of the property.</p>

<p>Guests are served an English breakfast every morning in the dining room. A hot beverage area with a microwave is open 24 hours a day. Room service is also available.</p>

<p>An outdoor sitting area on the property provides views of the Niagara River and the property's gardens. Guests can take a stroll through the landscaped property or just sit on the benches and enjoy the view, do some reading or birdwatching.</p>

<p>There is an outdoor swimming pool and relaxation area too.</p>

<p>Danner House B&B is perfect for couples.</p>

<p>The property is about 10 km from Horseshoe Falls. It provides free private parking and free WiFi. Guests can drive down to Niagara Falls or Niagara-on-the-Lake.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children cannot be accommodated.</li>
        <li>There is no space for extra beds in the rooms.</li>
        <li>Each room accommodates 2 persons.</li>
        </ul>
        
		<p>For more information regarding pricing and room availability, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/danner-house-b-b.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
