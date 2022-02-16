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
<meta name="description" content="Modern 4-bedroom vacation rental in Niagara Falls, Canada. Just 4 km from the Falls, it has a kitchen, washing machine, free parking and free WiFi."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-executive-family-home" />
<title>Niagara Executive Family Home | Niagara Canada Vacation Rentals | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/niagara-executive-family-home.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Executive Family Home</h2>
    <h3><i class="fa fa-map-marker"></i> Tristar Crescent, Niagara Falls, ON L2G 0A4</h3>
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
        <h2>Niagara Executive Family Home</h2>
        <address><i class="fa fa-map-marker"></i> Tristar Crescent, Niagara Falls, ON L2G 0A4</address>
         <p>For a comfortable stay during their Niagara Falls vacation, guests can book this beautiful 4-bedroom house with all the amenities of home, safety, free parking and free WiFi.</p>

<p>Families will love this place as the kids can have their own rooms. There is a big backyard with a patio and garden furniture.</p>

<p>There is a kitchen for preparing meals, coffee. There is also a washing machine for guests to use.</p>

<p>All the sights are a short drive from the house. After a day of sightseeing, you can relax in this oasis of calm. The completely furnished house has every comfort one would need for a comfortable stay.</p>

<p>Enjoy more space compared to a hotel, free parking and free WiFi, but at a much lower price!</p>
        

		<h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>There in no room for extra beds.</li>
        <li>A damage deposit of 500 CAD is collected before arrival and will be reimbursed within 14 days of checkout subject to inspection of property.</li>
        </ul>
        
        <p>For more information on Niagara Executive Family Home, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-executive-family-home.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
