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
<meta name="description" content="Located in Niagara Falls, this 2-bedroom apartment is 1.9 km from Skylon Tower. Has a garden, kitchen. Offers free internet and free onsite private parking."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/apartment-5835-glenholme-avenue" />
<title>5835 Glenholme Avenue – Vacation Rental Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/apartment-5835-glenholme-avenue.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Apartment 5835 Glenholme Avenue</h2>
    <h3><i class="fa fa-map-marker"></i> 5835 Glenholme Avenue, Niagara Falls, ON L2G 4Y6</h3>
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
        <h2>Apartment 5835 Glenholme Avenue</h2>
        <address><i class="fa fa-map-marker"></i> 5835 Glenholme Avenue, Niagara Falls, ON L2G 4Y6</address>
         <p>This apartment is just about 2.6 km from Horseshoe Falls and 1.9 km from Niagara Fallsview Casino Resort.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Facilities at the apartment</h3>
        <ul class="facilities">
        <li>One bedroom with 1 queen bed</li>
        <li>Second bedroom with a full bed</li>
        <li>One extra bed per bedroom will be provided on request</li>
        <li>Living room with TV</li>
        <li>Dining area</li>
        <li>Kitchen with utensils, dishwasher, stove, fridge, etc.</li>
        </ul>
        
        <p>The property is close to Lundy's Lane. Restaurants like Taco Bell, Doc Mcgilligan's and Wendy's are all within 1 km. There is a garden which can be used by guests. Your hosts will be on-call for any assistance.</p>

<p>The apartment is ideal for a larger family as the hosts welcome children and allow extra beds too! The entire unit is on the ground floor.</p>

<p>Free wired internet is available in all areas of the apartment. Free private parking is also available onsite. Free toiletries and a hairdryer are also available.</p>

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>One bedroom with 1 queen bed</li>
        <li>Children are welcome.</li>
        <li>Minimum age for check-in is 18</li>
        <li>Pets are not allowed.</li>
        </ul>
        
        <p>Please click on the button below to know more about the property, its availability and rent.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/5835-glenholme-ave.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
