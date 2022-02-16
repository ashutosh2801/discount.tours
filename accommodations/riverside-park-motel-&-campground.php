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
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/riverside-park-motel-&-campground" />
<title>Riverside Park Motel & Campground | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/riverside-park-motel-&-campground.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Riverside Park Motel & Campground</h2>
    <h3><i class="fa fa-map-marker"></i> 13541 Niagara Parkway, Niagara Falls, ON L2E 6S6</h3>
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
        <h2>Riverside Park Motel & Campground</h2>
        <address><i class="fa fa-map-marker"></i> 13541 Niagara Parkway, Niagara Falls, ON L2E 6S6</address>
        
         <p>Riverside Park Motel & Campground is located along the Upper Niagara River. You can bring your RV, trailer or tent. If you do not like camping, you can stay in the motel rooms.</p>

<p>The campground is about 13 km from Horseshoe Falls. You will get to enjoy amazing views of Niagara River. Relax along the river's edge or go fishing.</p>

<p>Riverside Park is just a short drive from popular attractions like Skylon Tower, Clifton Hill, Table Rock Welcome Centre, and more.</p>

        <h3><i class="fa fa-phone"></i> Phone:</h3>
<p><strong>Local:</strong> <a href="tel:+1 905-382-2204">+1 905-382-2204</a></p>
        
		<p class="aco_site">Visit <a href="https://www.riversidepark.net/" target="_blank">Riverside Park Motel & Campground's</a> website to know more about rules, rates, directions, etc.</p>
        
        
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
