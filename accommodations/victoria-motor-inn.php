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
<meta name="description" content="Located on Victoria Avenue, Victoria Motor Inn is walking distance from Clifton Hill, Niagara Falls. Low rates, free WiFi, onsite breakfast restaurant, paid parking."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Victoria Motor Inn – Cheap Hotels in Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Victoria-Motor-Inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Victoria Motor Inn</h2>
    <h3><i class="	fa fa-map-marker"></i> 5869 Victoria Avenue, Niagara Falls, ON L2J 4H9</h3>
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
        <h2>Victoria Motor Inn</h2>
        <address><i class="fa fa-map-marker"></i>  5869 Victoria Avenue, Niagara Falls, ON L2J 4H9</address>
         <p>Victoria Motor Inn is just down the road from Clifton Hill and within walking distance from Niagara Falls. This inn in Niagara Falls, Ontario has accommodations that are reasonably priced.</p>

<p>Guest rooms have air conditioning, heating, TVs, a sitting area and private bathroom.</p>

<p>Niagara Hornblower Cruises and Casino Niagara are a 10-minute walk (0.5 km) from the inn. There are a number of restaurants within 2 minutes walking distance.</p>

<p>Other facilities at the inn include an onsite restaurant, free WiFi in all areas of the inn, paid parking onsite and baggage storage.</p>

<p>Victoria Motor Inn is a good choice as it is reasonably priced and walkable distance from Niagara Falls and major attractions.</p>

        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Extra beds are not provided.</li>
        </ul>
        
		<p>Please click on the button below for more information on Victoria Motor Inn located on Victoria Avenue in Niagara Falls, Canada.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/victoriamotorinn.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
