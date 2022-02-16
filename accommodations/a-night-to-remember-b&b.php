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
<meta name="description" content="B&B in a Victorian home offering rooms with TV, fireplace, private bath with spa bath, free parking and WiFi, complimentary breakfast. Short walk to Niagara Falls. For adults only!"/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/a-night-to-remember-b&b" />
<title>A Night to Remember B&B – Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/a-night-to-remember-b&b.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>A Night to Remember B&B </h2>
    <h3><i class="	fa fa-map-marker"></i> 6161 Main Street, Niagara Falls, ON L2G 6A3</h3>
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
        <h2>A Night to Remember B&B </h2>
        <address><i class="fa fa-map-marker"></i> 6161 Main Street, Niagara Falls, ON L2G 6A3</address>
         <p>This beautiful Victorian-era house is located on a quiet street and is just a 20-minute walk from the Niagara Falls area.</p>

<p>This fully restored Queen Anne Revival guesthouse's baroque architecture, room décor and furniture takes you back to a bygone era of the early colonial settlers.</p>

<p>Guest rooms in this adults-only inn have a fireplace, TV and bathroom with spa bath. This baroque style guesthouse is great for a quiet romantic getaway.</p>

<p>One of the advantages of choosing this place is the free parking and free Wi-Fi in all areas of the inn.</p>

<p>Guests can have their choice of breakfast which is served in the dining room.</p>

<p>Tourist attractions like Skylon Tower, Casino Niagara, and Niagara Falls are all within walking distance (15-20 minutes).</p>

<p>This property is rated as providing the best value for money spent by guests! Guests love the quaint house that is over 100 years old, its garden, and the antiques and period décor of the house.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Children cannot be accommodated at this B&B.</li>
        <li>Extra beds are not available.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>Please click on the button below to know more details about A Night to Remember B&B. </p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/a-night-to-remember-b-b.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
