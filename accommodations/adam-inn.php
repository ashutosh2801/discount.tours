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
<meta name="description" content="Located centrally, Adam Inn offers a quiet retreat with great views of the Niagara River. Daily breakfast, comfort of home, free parking, free WiFi. Save money!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/adam-inn" />
<title>Adam Inn | Niagara Falls Canada B&Bs | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/adam-inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Adam Inn</h2>
    <h3><i class="fa fa-map-marker"></i> 4755 River Road, Niagara Falls, ON L2E 3G3</h3>
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
        <h2>Adam Inn </h2>
        <address><i class="fa fa-map-marker"></i> 4755 River Road, Niagara Falls, ON L2E 3G3</address>
         <p>This bed and breakfast is in the heart of Niagara Falls and near many tourist attractions.</p>

<p>Visitors driving into Niagara Falls can opt for this place as it provides free parking on site. It is conveniently located in a lovely neighbourhood.</p>

<p>The property is opposite the Niagara River.</p>

<p>Some of the rooms have air conditioning. Rooms have a desk, chairs, and a flat-screen TV. Free WiFi is available in all areas of the house.</p>

<p>Guests can enjoy hot breakfast (American or vegetarian) every morning. There is a garden and a shared lounge area where guests can relax.</p>

<p>This is one of the few B&Bs in Niagara Falls where children are welcome. The inn provides babysitting, laundry and ironing services at an additional rate.</p>

<p>Popular destinations like Whirlpool Aero Car, Whirlpool State Park, and Bird Kingdom are 10-15 minutes away by foot. Niagara Fallsview Casino Resort is 3 km from Adam Inn. American Falls is 2.4 km away.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children are welcome.</li>
        <li>Children below 16 years are charged 50 CAD per night for extra beds.</li>
        <li>Children aged 16 or older or adults are charged 65 CAD per night for an extra bed.</li>
        <li>Only one extra bed can be accommodated in each room.</li>
        <li>Pets are allowed, but charges may apply.</li>
        <li>Some of the rooms have a shared bathroom.</li>
        </ul>
        
		<p>To find out more about Adam Inn, pricing and availability of rooms, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/adam-inn.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
