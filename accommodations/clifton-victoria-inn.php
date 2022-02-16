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
<meta name="description" content="Clifton Victoria Inn at the Falls is a 5-minute walk from Clifton Hill and 30 minutes from the Falls. Offers free parking, WiFi and breakfast. Great location, low rates, family favourite."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Clifton Victoria Inn at the Falls – Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Clifton-Victoria-Inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Clifton Victoria Inn at the Falls </h2>
    <h3><i class="	fa fa-map-marker"></i> 5591 Victoria Avenue, Niagara Falls, ON L2G 3L4</h3>
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
        <h2>Clifton Victoria Inn at the Falls</h2>
        <address><i class="fa fa-map-marker"></i> 5591 Victoria Avenue, Niagara Falls, ON L2G 3L4</address>
         <p>Clifton Victoria Inn at the Falls is the perfect place to stay at during your Niagara Falls vacation. Located just 200 metres (5-minute walk) from Casino Niagara, the inn has rooms and suites at low rates.</p>

<p>The inn provides free breakfast buffet, free parking and free WiFi.</p>

<p>The inn is just 4-20 minutes' walking distance from Bird Kingdom, Skylon Tower and other attractions. American Falls is 1 km and Horseshoe Falls about 1.6 km from the inn.</p>

<p>Clifton Hill attractions are just a 5-minute walk from the inn.</p>

<p>Each guest room has free WiFi, a flat-screen TV, air conditioning, heating, ensuite bathroom and complimentary toiletries. Select rooms have a whirlpool tub.</p>

<p>There is a free breakfast buffet every morning. Choices include tea, coffee, juice, cereals, bagels, pastries, pancakes, waffles, and more.</p>

<p>All the rooms of the inn overlook an atrium, which is where the breakfast area and swimming pool are located.</p>

<p>There is also a business centre with office supplies and a printer, which is available 24 hours a day.</p>

<p>Some of the other facilities include vending machines, shops, safes, dry cleaning (at additional charges), gift shop, and facilities for disabled guests.</p>

<p>The inn offers family fun packages. It is just 5 minutes from many restaurants and supermarkets.</p>

<p>Clifton Victoria Inn at the Falls delivers on the 4 things that guests look for – location, amenities, affordability, and cleanliness.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
        <li>All children are welcome.</li>
        <li>Only 1 extra bed per room is allowed.</li>
        <li>There will be a charge per night for extra beds.</li>
        </ul>
        
		<p>Please click on the button provided below for more details regarding booking, room rates and more.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/hampton-inn-at-the-falls.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
