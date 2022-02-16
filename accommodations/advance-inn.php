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
<meta name="description" content="Affordable family accommodations close to Niagara Falls. Advance Inn offers great rates, free parking, free WiFi.  Close to WEGO bus stop."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Advance Inn – Niagara Falls Canada Accommodations | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Advance-Inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Advance Inn </h2>
    <h3><i class="	fa fa-map-marker"></i> 6019 Lundy's Lane, Niagara Falls, ON L2G 1T2</h3>
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
        <h2>Advance Inn</h2>
        <address><i class="fa fa-map-marker"></i> 6019 Lundy's Lane, Niagara Falls, ON L2G 1T2</address>
         <p>Advance Inn is a family friendly inn located close to Niagara Falls and other attractions. The inn has rooms for 2, 3, 4 and 6 persons. Onsite free parking is a bonus.</p>

<p>Every room is equipped with a microwave, refrigerator, flat screen TV, free WiFi, air conditioning/heating, and a sitting area.</p>

<p>The owners make you feel at home. They provide you tips on the area, must-see sights, good restaurants and transportation to take to the various destinations.</p>

<p>There is a seasonal outdoor swimming pool too!</p>

<p>There is a WEGO bus stop one block from the inn, so tourist attractions are easy to reach. Skylon Tower is 1.2 km and Niagara Falls is 2 km from the inn.</p>

Advance Inn has been rated by guests as providing value for money. </p>

        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Pets are not allowed.</li>
		<li>All children are welcome.</li>
		<li>Up to 2 children below 12 years can stay free of charge when using existing beds.</li>
		<li>Extra beds are not available.</li>
        </ul>
        
		<p>For more details about Advance Inn, please click on the button provided below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/advance-inn.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA#tab-main" target="_blank">More Details</a></div>
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
