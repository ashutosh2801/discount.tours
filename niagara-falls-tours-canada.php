<?php
require_once('includes/config.php');
require_once('includes/functions.php');

$order = (!empty($_GET['sortby'])) ? addslashes($_GET['sortby']) : 'tour_count';
$sort = (!empty($_GET['sort'])) ? addslashes($_GET['sort']) : 'DESC';

$condition = "status=1 AND country='Canada'";
$condition.= (!empty($_GET['q'])) ? " AND title like '%".addslashes($_GET['q'])."%'" : '';

if($order=='ordering') $order = '`order` ASC';
else if($order=='date') $order = '`created_on` DESC';
else if($order=='price-low-to-high') $order = '`adults_price` ASC';
else if($order=='price-high-to-low') $order = '`adults_price` DESC';
else if($order=='rating') $order = '`rating` DESC';           
else if($order=='popularity') $order = '`tour_count` DESC';
else if($order=='title') $order = '`title` ASC';
else $order = '`order` ASC';

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
<meta name="keywords" content="ToNiagara"/>
<link rel="canonical" href="<?=SITEURL;?>/niagara-falls-tours-canada" />
<title>List of Top Niagara Falls Tours Canada <?php echo date('Y'); ?> | ToNiagara</title>
<?php include 'inner_header.php';?>
<!--banner-->
<div class="tour_booking_banner_wra">
<div class="detail_banner_shadow">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="banner_txt_l">
        <h3>Niagara Falls Tours</h3>
        <h2>List of Top Niagara Falls Day, Evening & Private Tours</h2>
        </div>
      </div>  
    </div>
  </div>
</div>
</div>
<!--end banner-->
<!--search-->
<div class="search_home_wra">
	<form action="/niagara-falls-tours-canada" method="get" id="search_form">
  <div class="ui-widget">
   <input name="q" type="text" class="typeahead fld4" placeholder="Search Niagara Falls Tours">
   <select name="country" class="country">
     <option value="Canada" selected>Canada</option>
     <option value="USA">USA</option>
   </select>
   <button class="search" type="submit">Search</button>
   <input type="hidden" name="sortby" id="sort_by" value="tour_count" />
   <input type="hidden" name="page" id="page" value="1" />
  </div> 
  </form>
  <div class="clearfix"></div>
</div>
<!--end search-->

<div class="icons_row">
  <div class="container">
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
      <div class="icon_box">
        <img src="<?php echo IMAGEROOT; ?>safe.png" alt="safe.png" class="img-res">
        <h3><span class="safe">Safe</span> & Private Tours</h3>
        <div class="num">01</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
      <div class="icon_box">
        <img src="<?php echo IMAGEROOT; ?>free1.png" alt="free1.png" class="img-res">
        <h3><span class="free">Free</span> Cancellaton</h3>
        <div class="num">02</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
      <div class="icon_box">
      <a target="_blank" href="https://www.tripadvisor.ca/Attraction_Review-g155019-d15220303-Reviews-ToNiagara_Tours-Toronto_Ontario.html"><img src="<?php echo IMAGEROOT; ?>tripadvisor.jpg" alt="tripadvisor.jpg" class="img-res"></a>
      <h3><span class="trip">2020 Travelers' Choice</span> TripAdvisor</h3>
        <div class="num">03</div>
        <div class="clear"></div>
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
      <div class="icon_box">
        <img src="<?php echo IMAGEROOT; ?>google1.png" alt="google1.png" class="img-res">
        <h3><span class="google">5-Star</span> Customer Rated</h3>
        <div class="num">04</div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div>

<!--book your tour-->
<div class="book_tours_wra">
  <div class="container">
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
					 tour_list($conn, $condition, "$order", "$offset, $limit");
           ?>
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

        <div class="book_tour_matter">
          <h3>One Day Trip To Niagara Falls</h3>
          <p>If you haven't been to Niagara Falls in Ontario, Canada, then you should get it from us that it is a true sight to behold. For the past 200 years, this spectacular site has been attracting almost thirty million people to go and see some of the natural beauties that it has.</p>
          <p>Besides the falls, there is quite a lot to do and see while in this awesome place. One of them is the famous winery that is located in the Lakeside of Niagara.</p>

					<p>When you take a one-day trip to Niagara Falls, we will make it first, and you will not waste more time lining at the Hornblower Cruise, as it has been the custom. Here are some of the tour packages that we have for you:</p>

		  		<h3>Toronto to Niagara Falls Day Tour</h3>
          <p>For this package, adults will pay just 139 Canadian dollars, while seniors of over sixty years and children between 4-12 years will pay CA$129 and CA$109 respectively. We will carry your infant below three years for free.</p>
          
          <h3>Niagara Falls Private Tour</h3>
          <p>This package is meant for four people and costs CA$799. Besides that, you will get free wine tasting at the winery, hotel pickup & drop-off, Niagara-on-the-lake tour, free lanyards, tour guide as well a bottle of water to quench your thirst.</p>
          
          <h3>Niagara Falls Large Group Custom Bus Tour</h3>
          <p>We have customized this tour package to accommodate not more than 56 people. For free hotel pick-up & drop-off, unlimited free bottled water, Niagara-on-the-lake tour and a chance to taste a free wine at the winery, you'll only pay CA$2,199.</p>
          <p>There are also other packages like Niagara Falls Small Group Custom Tour, the private tour, Toronto to Niagara Falls evening tour and a host of others.</p>
          <p><a href="/blog/contact-us">Get in touch with us today</a> and learn more about the packages that we have.</p>
          
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
