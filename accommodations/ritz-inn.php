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
<meta name="description" content="Stay in comfortable, cheap rooms at a great location – 15-minute walk to Niagara Falls. Free WiFi and parking provided."/>
<meta name="keywords" content="Cheap hotels in Niagara Falls Canada, rooms with jacuzzi"/>
<link rel="canonical" href="<?=SITEURL;?>/advance-inn" />
<title>Ritz Inn Niagara | Cheap Hotels In Niagara Falls, Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->

<div class="day_banner_wra" style="background:url(../images/accommodations/Ritz-Inn.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Ritz Inn Niagara</h2>
    <h3><i class="	fa fa-map-marker"></i> 5630 Dunn Street, Niagara Falls, ON L2G 2N7</h3>
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
        <h2>Ritz Inn Niagara</h2>
        <address><i class="fa fa-map-marker"></i> 5630 Dunn Street, Niagara Falls, ON L2G 2N7</address>
         <p>Located just 0.7 km from Horseshoe Falls and 1.4 km from American Falls, Ritz Inn Niagara is a motel with clean and comfortable rooms at low rates, free parking and free WiFi.</p>

<p>From the motel, it is just a 5-minute walk to the Incline Railway that takes you to the Falls or a 15-minute walk to the Falls, Niagara Fallsview Casino and Skylon Tower. Other attractions are a short drive away.</p>

<p>The guest rooms have a TV, air conditioning, heating, microwave and refrigerator.</p>

<p>There are many restaurants and shops near the motel.</p>

<p>Couples can book a room with jacuzzi and fireplace. </p>

<p>A classic motel with basic, comfortable rooms at a great price along with free parking and free WiFi.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>All children are welcome.</li>
        <li>Pets are not allowed.</li>
        <li>Extra beds cannot be accommodated in the rooms.</li>
        </ul>
        
		<p>For more details regarding Ritz Inn Niagara, please click on the button given below.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/a-ritz-inn-niagara-wedding-chapel.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
