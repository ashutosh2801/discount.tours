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
<meta name="description" content="Guests get to experience the lifestyle and décor of a bygone era at this heritage property with lovely garden, spacious & beautiful rooms, free WiFi, free parking."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/park-place-b&b" />
<title>Park Place B&B | B&Bs in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/park-place-b&b.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Park Place B&B </h2>
    <h3><i class="fa fa-map-marker"></i> 4851 River Road, Niagara Falls, ON L2E 3G4</h3>
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
        <h2>Park Place B&B </h2>
        <address><i class="fa fa-map-marker"></i> 4851 River Road, Niagara Falls, ON L2E 3G4</address>
         <p>Park Place B&B is a heritage property on River Road, overlooking the Niagara River and Gorge. Built in 1886, the property has a beautiful landscaped garden, Victorian era styled rooms and bathrooms, a front porch, and modern conveniences.</p>

<p>It is just a 5-minute drive to Niagara Falls from the B&B. Whirlpool State Park is just 500 metres from the B&B. The B&B is 1.4 km from Bird Kingdom and 1.6 km from Casino Niagara.</p>

<p>Each guest room in this nonsmoking property has a spa bath, flat-screen TV, sitting area, gas fireplace, a small dining area and a private entrance.</p>

<p>Home cooked breakfast is prepared per guests' wishes and is served up in the guest rooms or in the dining room or out on the beautiful porch.</p>

<p>By staying here, guests get to enjoy wonderful hospitality, luxurious rooms, and a beautiful garden. Free parking and free WiFi is provided.</p>

<p>Park Place B&B is just the right place for a romantic stay.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children cannot be accommodated at this B&B. </li>
        <li>There is no space for extra beds in the guest rooms.</li>
        </ul>
        
		<p>To know more about Park Place B&B, please click on the button provided.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/park-place-b-amp-b.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
