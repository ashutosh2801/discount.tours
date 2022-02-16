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
<meta name="description" content="Enjoy river views from this 1-bedroom apartment 1 km from Whirlpool Aero Car, 3 km from Niagara Falls. Front porch, garden, free parking. Perfect for 2 people!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/your-oasis-in-niagara-falls-canada-apartment" />
<title>Your Oasis in Niagara Falls Canada Apartment – Vacation Rentals in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/your-oasis-in-niagara-falls-canada-apartment.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Your Oasis in Niagara Falls Canada Apartment</h2>
    <h3><i class="fa fa-map-marker"></i> 4266 Elgin Street, Niagara Falls, ON L2E 2X6</h3>
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
        <h2>Your Oasis in Niagara Falls Canada Apartment</h2>
        <address><i class="fa fa-map-marker"></i> 4266 Elgin Street, Niagara Falls, ON L2E 2X6</address>
         <p>Located in a quiet neighbourhood just 1 km from Whirlpool Aero Car, this 1-bedroom apartment in a lovely house offers onsite private parking and can accommodate 2 adults.</p>

<p>The property features a large private front porch, a living room with TV, and a bedroom with a queen size bed and a TV. The apartment is air-conditioned, has a private bathroom, and offers lovely views of the garden and Niagara Gorge. The closest attractions are Niagara Helicopters Limited and Whirlpool State Park.</p>

<p>Niagara Falls (3.5 km) and other attractions are a short drive away. There are also many restaurants and markets in the area.</p>

<p>Guests can sit out on the front porch and enjoy the view after a day of sightseeing. This property is secluded and gives guests privacy. It is also very close to the train and bus stations (0.6 km).</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children cannot be accommodated at the property.</li>
        <li>There is no room for extra beds.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
        <p>For more information regarding facilities and booking for Your Oasis in Niagara Falls Canada, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/your-oasis-in-niagara-falls-canada.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
