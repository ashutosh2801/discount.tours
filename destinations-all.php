<?php
require_once('includes/config.php');
require_once('includes/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php //echo $meta_description; ?>"/>
<meta name="keywords" content="<?php //echo $meta_keyword; ?>"/>
<title>Top Destinations</title>

<?php include 'inner_header.php';?>

<div class="search_home_wra" style="background1:url(<?php echo '/uploads/category/'.$category->cat_banner; ?>); background-size: cover;">
	<form action="<?=SITEURL;?>/search" method="get" id="search_form" style="padding:25px 0">
	    <div class="ui-widget" >
           <input name="q" type="text" class="fld4 typeahead" placeholder="Search Discount Tours Tours" value="<?php echo $_GET['q']?>">
           <button class="search" type="submit">Search</button>
           <input type="hidden" name="category" id="category" value="<?php echo $_GET['slug']; ?>" />
           <input type="hidden" name="sortby" id="sort_by" value="<?=($_GET['sortby']) ? $_GET['sortby'] : 'tour_count'; ?>" />
           <input type="hidden" name="order" id="order_by" value="<?=($_GET['sortby']) ? $_GET['sortby'] : 'tour_count'; ?>" />
           <input type="hidden" name="page" id="page" value="1" />
        </div>   
  </form>
  <div class="clearfix"></div>
</div>

<!--book your tour-->
<?php

$condition = "status=1";

$limit  = 40;
$page 	 = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;

$order = (!empty($_GET['sortby'])) ? addslashes($_GET['sortby']) : 'tour_count';
if($order=='ordering') $order = '`order` ASC';
else if($order=='date') $order = '`created_on` DESC';
else if($order=='price-low-to-high') $order = '`adults_price` ASC';
else if($order=='price-high-to-low') $order = '`adults_price` DESC';
else if($order=='rating') $order = '`rating` DESC';           
else if($order=='popularity') $order = '`tour_count` DESC';
else if($order=='title') $order = '`title` ASC';
else $order = '`order` ASC';

?>
<!--book your tour-->
<div class="book_tours_wra">
  <div class="container">
    <div class="heading9">All <span>Destinations</span></div>
        <div class="row">
      <div class="col-lg-12">
        <ul class="row">
            <?php
            $sql_dest = "SELECT * FROM tour_top_cities WHERE 1 LIMIT $offset, $limit";
            $query_dest = $conn->query($sql_dest);
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
            <?php } ?>
        </ul>
      </div>        
     </div>




<div class="pagi">
         <nav aria-label="...">
					 <?php
           $sql = "SELECT * FROM tour_top_cities WHERE 1";
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
             $order = (!empty($_GET['order'])) ? addslashes($_GET['order']) : '';
             $sort = (!empty($_GET['sort'])) ? addslashes($_GET['sort']) : '';
             $q = (!empty($_GET['q'])) ? addslashes($_GET['q']) : '';
  
             $total_pages = ceil($result->num_rows / $limit);
             echo paginattion($page, $total_pages, APPROOT."destinations-all?sort=$sort&order=$order");
           }
           ?>
        	</nav>
        </div>
        
   </div>
</div>
<!--end book your tour-->
<?php include 'footer.php';?>
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

	$( ".typeahead" ).autocomplete({
		source: "<?=SITEURL;?>/tour-list",
		minLength: 1,
		select: function( event, ui ) {
			window.location.href = ui.item.link
		}
	}); 
})
</script>
<script type="text/javascript" src="//code.jquery.com/ui/1.9.2/jquery-ui.js?ver=2.1"></script>
</body>
</html>
