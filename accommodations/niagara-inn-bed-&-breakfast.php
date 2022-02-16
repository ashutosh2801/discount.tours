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
<meta name="description" content="A short drive from Niagara Falls, Niagara Inn Bed & Breakfast has rooms at great prices. Offers free WiFi, parking and breakfast. Rooms with TV, hairdryer."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-inn-bed-&-breakfast" />
<title>Niagara Inn Bed & Breakfast – Niagara Falls Canada Accommodations | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-inn-bed-&-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Inn Bed & Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 4300 Simcoe Street, Niagara Falls, ON L2E 1T6</h3>
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
        <h2>Niagara Inn Bed & Breakfast</h2>
        <address><i class="fa fa-map-marker"></i> 4300 Simcoe Street, Niagara Falls, ON L2E 1T6</address>
         <p>Niagara Inn Bed & Breakfast in Niagara Falls, Ontario, offers guests clean and comfortable rooms that have a TV and hairdryer. Niagara Falls is a short 5-minute drive from the B&B. </p>

<p>Rainbow Bridge, Casino Niagara and Bird Kingdom are at a walkable distance of 1.2-1.5 km.</p>

<p>The property also provides free parking, free WiFi, and American or continental breakfast every morning.</p>

<p>The property provides excellent value for money spent. It also has a library that is open to guests.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children 7 and older are allowed at this B&B. </li>
        <li>Children can use existing beds, but extra charges apply per child per night.</li>
        <li>Pets are not allowed.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
		<p>For more information regarding Niagara Inn Bed & Breakfast, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-inn-b-b.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
