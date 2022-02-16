<?php
require_once('includes/config.php');
require_once('includes/functions.php');

set_cookie($_COOKIE['country'] ? ucwords(str_replace("-"," ",$_COOKIE['country'])) : 'United States', $_COOKIE['currency'] ? $_COOKIE['currency'] : 'USD');

$default_country  = $_COOKIE['country'] ? $_COOKIE['country'] : 'United States';
$default_currency = $_COOKIE['currency'] ? "Price".$_COOKIE['currency'] : 'PriceUSD';
//$condition = "status=1 AND FIND_IN_SET('home-page', category)";
//$condition = "A.status=1 AND A.country='$default_country' AND B.lable='$default_currency'";

$order  = 'TT.ID DESC';

$limit  = 9;
$page 	= isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="canonical" href="<?=SITEURL;?>" />
<title>Best Toronto to Niagara Falls Sightseeing Tours | Discount Tours - Toronto to Niagara Falls Tours</title>
<meta name="description" content="Best Toronto to Niagara Falls Sightseeing Tours. Niagara Falls Tours &amp; Attractions With Special offers! Toll-Free +1 800-653-2242"/>
<meta name="keywords" content="Best Niagara Falls Sightseeing Tours, Tour Packages, Day Tour, Evening Tour, Small Group Custom Tour, Private Tour, Group Tours"/>
<?php include 'inner_header.php';?>
<!--search-->
<div class="search_home_wra">
	<form action="<?=SITEURL;?>/search" method="get" id="search_form">
	<div class="ui-widget">
        <h1>Find amazing things to do. <br/>Anytime, anywhere.</h1>
        <input name="q" type="text" class="typeahead fld4" placeholder="Where are you going to?" value="<?=$_GET['q'];?>">
        <select name="country" class="country">
            <option <?php if($_GET['country']=='') echo 'selected'; ?> value="">All</option>
            <?php 
            $country_all = country_all($conn);
            while($country = $country_all->fetch_object() ) {
            ?>
            <option <?php if($_GET['country']==$country->country) echo 'selected'; ?> value="<?php echo $country->country; ?>"><?php echo $country->country; ?></option>
            <?php } ?>
        </select>
        <button class="search" type="submit">Search</button>
        <input type="hidden" name="sortby" id="sort_by" value="tour_count" />
        <input type="hidden" name="page" id="page" value="1" />
    </div> 
    </form>
    <div class="clearfix"></div>
</div>
<!--end search-->

<!--book your tour-->
<div class="book_tours_wra">
  <div class="container">
  <div class="heading9">Top Tours in <span><?php echo $default_country; ?></span> <a href="<?php echo APPROOT . urlMap($default_country); ?>/all">view all</a></div>
  	
    <div class="row">
      <div class="col-lg-12">
        <div id="products">
        	<ul class="row">
                <?php home_procedure($conn, $default_country, $default_currency, $order, $offset, $limit); ?>
                <?php //tour_list($conn, $condition, "$order", "$offset, $limit"); ?>
     		</ul>
        </div>
      </div>        
     </div>
   </div>
   <div class="explore"><a href="<?php echo APPROOT . urlMap($default_country); ?>/all">View All Top Tours in <?php echo $default_country; ?></a></div>
</div>
<!--end book your tour-->

<div class="bg-gray">
  <div class="fullWidth">
    <div class="fullWidth-inner-box">
      <div class="title">Keep things flexible</div>
      <div class="description">Use Reserve Now &amp; Pay Later to secure the activities you don't want to miss without being locked in.</div>
    </div>
  </div>
</div>

<div class="destinations">
  <div class="container">
  <div class="heading9">Top <span>Destinations</span></div>
    <div class="row">
      <div class="col-lg-12">
        <ul class="row">
            <?php
            //$sql_dest = "SELECT * FROM tour_top_cities WHERE is_top_destination=1 LIMIT 8";
            $query_dest = $conn->query('CALL get_top_destinations()');
            while($model = $query_dest->fetch_object())
            {
            ?>
            <li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="bg-image hover-overlay hover-zoom hover-shadow ripple" data-mdb-ripple-color="light">
                    <a href="<?php echo "destinations/".urlMap($model->name)."/".$model->id; ?>">
                        <img src="https://cache.vtrcdn.com/orion/images/homepage/top-destinations/TopDestinations-<?php echo str_replace(" ","",$model->name); ?>-450px.jpg" class="w-100" />
                        <div class="mask2" style="background-color: rgba(0, 0, 0, 0.4)">
                            <div class="d-flex justify-content-center align-items-center h-100">
                                <p class="text-white"><?php echo $model->name; ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
            <?php }
            $query_dest->close();
            $conn->next_result();
            ?>
        </ul>
      </div>        
     </div>
   </div>
   <div class="clearfix"></div>
   <div class="explore"><a href="<?php echo APPROOT; ?>destinations-all">View All Destinations</a></div>
</div>


<?php include 'footer.php';?>
<script type="text/javascript">
$(function(){
	$( ".typeahead" ).autocomplete({
		source: "<?=SITEURL;?>/tour-list",
		minLength: 1,
		select: function( event, ui ) {
			window.location.href = ui.item.link
		}
	}); 
})
</script>
<script type="text/javascript" src="//code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
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
		get_loadmore_tours('#products', '#search_form', '<?=SITEURL;?>/ajax/tours');
		return false;
	});
});
</script>
</body>
</html>
