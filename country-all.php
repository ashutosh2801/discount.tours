<?php
require_once('includes/config.php');
require_once('includes/functions.php');

$order = (!empty($_GET['sortby'])) ? addslashes($_GET['sortby']) : 'tour_count';
$sort = (!empty($_GET['sort'])) ? addslashes($_GET['sort']) : 'DESC';

$countryName = str_replace("-"," ",$_GET['country']);
$default_country  = $countryName ? $countryName : $_COOKIE['country'];
$default_currency = $_COOKIE['currency'] ? "Price".$_COOKIE['currency'] : 'PriceUSD';


//$condition = "status=1 AND lower(country)='".strtolower($countryName)."'";
//$condition.= (!empty($_GET['q'])) ? " AND title like '%".addslashes($_GET['q'])."%'" : '';

if($order=='ordering') $order = 'TT.`order` ASC';
else if($order=='date') $order = 'TT.`created_on` DESC';
else if($order=='price-low-to-high') $order = 'TP.`price` ASC';
else if($order=='price-high-to-low') $order = 'TP.`price` DESC';
else if($order=='rating') $order = 'TT.`rating` DESC';           
else if($order=='popularity') $order = 'TT.`tour_count` DESC';
else if($order=='title') $order = 'TT.title ASC';
else $order = 'TT.ID DESC';

$limit  = 9;
$page 	 = intval($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Browse, choose & book from the list of Top <?php tour_count_all($conn, $condition, "$order"); ?> Niagara Falls Tours Canada <?php echo date('Y'); ?> that offer the best value for your money! Updated: <?php echo date('F d, Y'); ?>."/>
<meta name="keywords" content="Discount.Tours"/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-falls-tours-canada" />
<title>List of Al Canada Tours <?php echo date('Y'); ?> | Discount.Tours</title>
<?php include 'inner_header.php';?>

<!--search-->
<div class="search_home_wra tour_booking_banner_wra">
	<form action="<?=SITEURL;?>/search" method="get" id="search_form" style="padding: 25px 0 25px;">
	<div class="ui-widget">
   <input name="q" type="text" class="typeahead fld4" placeholder="Where are you going to?" value="<?=$_GET['q'];?>">
   <select name="country" class="country">
        <option <?php if($_GET['country']=='') echo 'selected'; ?> value="">All</option>
        <?php 
        $country_all = country_all($conn);
        while($country = $country_all->fetch_object() ) {
        ?>
        <option <?php if(strtolower($default_country)==strtolower($country->country)) echo 'selected'; ?> value="<?php echo $country->country; ?>"><?php echo $country->country; ?></option>
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
    <div class="heading9">All Tours in <span><?php echo ucwords($countryName); ?></span></div>
  	<div class="row">
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
      <div class="tour_count"><?php tour_count($conn, $condition, "$order"); ?></div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <div class="sort_wra2">
        <span>Sort by</span> 
        <select class="select4" name="sortby" id="sortby">
        	<option value="">Select</option>
          <option <?php if(isset($_GET['sortby']) && $_GET['sortby']=='popularity') echo 'selected'; ?> value="popularity">Popularity</option>
          <option <?php if(isset($_GET['sortby']) && $_GET['sortby']=='price-low-to-high') echo 'selected'; ?> value="price-low-to-high">Price (Low to High)</option>
          <option <?php if(isset($_GET['sortby']) && $_GET['sortby']=='price-high-to-low') echo 'selected'; ?> value="price-high-to-low">Price (High to Low)</option>
          <option <?php if(isset($_GET['sortby']) && $_GET['sortby']=='rating') echo 'selected'; ?> value="rating">Rating</option>
        </select>
      </div>
      </div>
      </div>
    <div class="row">
      <div class="col-lg-12">
        <div id="products">
            <ul class="row">
                <?php 
                //echo "$default_country, $default_currency, $order, $offset, $limit";
                
                home_procedure($conn, $default_country, $default_currency, $order, $offset, $limit); ?>
        	    <?php //tour_list($conn, $condition, "$order", "$offset, $limit"); ?>
     		</ul>
        </div>
        <div id="loader_container"></div>
             
        <div class="pagi">
         <nav aria-label="...">
           	<div class="text-center">
              <button type="button" name="load_more" id="load_more_products" class="btn4">Load More</button>
            </div>
          </nav>
        </div>

        
      </div>        
      
     </div>
   </div>
</div>
<!--end book your tour-->
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
