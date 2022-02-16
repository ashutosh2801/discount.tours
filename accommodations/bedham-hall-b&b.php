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
<meta name="description" content="Overlooking Niagara Gorge, Bedlam Hall B&B offers affordable room with free WiFi and private bathroom, free breakfast and parking. It is 2.3 km from American Falls."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/bedham-hall-b&b" />
<title>Bedham Hall B&B | Niagara Falls Canada Accommodations | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/bedham-hall-b&b.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Bedham Hall B&B </h2>
    <h3><i class="fa fa-map-marker"></i> 4835 River Road, Niagara Falls, ON L2E 3G4</h3>
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
        <h2>Bedham Hall B&B </h2>
        <address><i class="fa fa-map-marker"></i> 4835 River Road, Niagara Falls, ON L2E 3G4</address>
         <p>Bedham Hall B&B is 0.5 km from train and bus (Greyhound Canada) stations. Overlooking the Niagara Gorge and River, this picturesque B&B is a Victorian-era house that has been restored and modernized.</p>

<p>The property boasts of a beautiful garden in the front and backyard. The house has Victorian style furniture and décor which lends to the charm of the B&B.</p>

<p>There is a large dining area where breakfast is served. There are tables for just 2 people for a more private setting. Guests can opt for English, continental or buffet style breakfast.</p>

<p>Bedham Hall B&B offers rooms with ensuite bathrooms. All rooms have a sitting area, fireplace, air conditioning, and free Wi-Fi.</p>

<p>Free parking is available on site. Guests can walk down to attractions like Bird Kingdom, which is just 15 minutes away. Horseshoe Falls is about 3 km from the B&B.</p>

<p>Diet meals are also prepared upon request. </p>

<p>Stay at Bedham Hall B&B for a feel of Victorian housing and Niagara Falls neighbourhoods.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>Children cannot be accommodated at this B&B.</li>
        <li>Extra beds are not available.</li>
        </ul>
        
        <p>Past guests have loved the décor, the friendly hosts and the great location.</p>
        
		<p>Please click on the button provided below for more information on Bedham Hall B&B. </p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/bedham-hall-b.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
