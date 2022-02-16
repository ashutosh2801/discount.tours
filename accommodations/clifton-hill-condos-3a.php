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
<meta name="description" content="Book this 2-bedroom condo for your Niagara Falls vacation. Enjoy the comfort of home! Free parking! 20-minute walk to the Falls. Accommodates 7 persons."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/clifton-hill-condos-3a" />
<title>Clifton Hill Condos 3A – Niagara Falls Canada Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/clifton-hill-condos-3a.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Clifton Hill Condos 3A</h2>
    <h3><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 3R8</h3>
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
        <h2>Clifton Hill Condos 3A</h2>
        <address><i class="fa fa-map-marker"></i> Niagara Falls, ON L2G 3R8</address>
         <p>Have a fabulous vacation in Niagara Falls, Canada, by booking this 2-bedroom condo in Clifton Hill.</p>

<p>Just 10 minutes and 20 minutes' walk from Skylon Tower and Niagara Falls respectively, this modern condo offers free parking and free WiFi.</p>

<p>Guests will love the fully equipped kitchen where they can whip up a quick meal. The kitchen has a lot of appliances. There is also a living area with a flat-screen TV, kitchen with dining area, 2 bedrooms and a bathroom.</p>

<p>Moderately priced, this modern condo unit is just a 10-minute walk to attractions in Clifton Hill.</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets will be permitted upon request. Charges may aply.</li>
        <li>Children are welcome.</li>
        <li>There is no space for extra beds in the rooms.</li>
        </ul>
        
        <p>Please click on the button below for more details about the condo.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/clifton-hill-condos-3a.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
