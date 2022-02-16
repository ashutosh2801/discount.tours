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
<meta name="description" content="Quiet location with comfortable, clean, spacious rooms. Fairly priced, 5-minute drive to Falls. Swimming pool, free parking, free WiFi."/>
<meta name="keywords" content="Accommodations in Niagara Falls"/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Niagara Falls Motor Lodge | Niagara Canada Accommodations | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Niagara-Falls-Motor-Lodge.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Niagara Falls Motor Lodge</h2>
    <h3><i class="	fa fa-map-marker"></i> 7950 Portage Road, Niagara Falls, ON L2G 5Y8</h3>
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
        <h2>Niagara Falls Motor Lodge</h2>
        <address><i class="fa fa-map-marker"></i> 7950 Portage Road, Niagara Falls, ON L2G 5Y8</address>
         <p>This lovely motor lodge offers comfortable and affordable accommodations and is around 3 km from Niagara Falls.</p>

<p>Niagara Falls Motor Lodge features a seasonal outdoor swimming pool, restaurant, barbecue facilities and picnic tables in the property's garden. The lodge also provides free parking and free WiFi.</p>

<p>Each room has a TV, microwave, refrigerator, air conditioning and heating.</p>

<p>There are restaurants, pubs and supermarkets within walking distance from the lodge. The tourist areas are just a short drive away.</p>

<p>Guests will find Niagara Falls Motor Lodge an extremely comfortable and neat place to spend the night after a long day of sightseeing.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>There is no space for extra beds in the room.</li>
        </ul>
        
		<p>To know more about the types of rooms available, room rates, facilities and customer reviews, please click on the button below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/niagara-falls-motor-lodge.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA#tab-main" target="_blank">More Details</a></div>
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
