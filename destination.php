<?php
require_once('includes/config.php');
require_once('includes/functions.php');
require_once('includes/Mobile_Detect.php');

$detect = new Mobile_Detect;

if(!empty($_GET['slug']))
{
	$sql = "SELECT name FROM tour_top_cities WHERE id='".$_GET['id']."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$destination = $result->fetch_object();
		
		/*$cat_count = $category->cat_count + 1;
		$sql2 = "UPDATE `tour_category` SET `cat_count`='$cat_count' WHERE id=".$tour->cat_count.";";
		$conn->query($sql2);

		$condition = "status=1 AND FIND_IN_SET('".$_GET['slug']."', category)";
		$condition.= (!empty($_GET['q'])) ? " AND title like '%".addslashes($_GET['q'])."%'" : '';
		$condition.= (!empty($_GET['country'])) ? " AND country = '".addslashes($_GET['country'])."'" : '';*/
		
        $default_country  = $_COOKIE['country'] ? $_COOKIE['country'] : 'United States';
        $priceLable = $_COOKIE['currency'] ? "Price".$_COOKIE['currency'] : 'PriceUSD';
        $condition = "A.status=1 AND A.location='".$destination->name."' AND A.country='$default_country' AND B.lable='$priceLable'";
		$condition = "status=1 AND location='".$destination->name."'";
		
		$total_rows = 0;
		$sql = "SELECT count(A.ID) as total FROM tour_tours as A JOIN tour_pricing as B ON A.ID=B.tour_id WHERE $condition ORDER BY A.ID DESC ";
		$result = $conn->query($sql);
		while($row = mysqli_fetch_array($result)) {
			$total_rows = $row->total;
		}

		$meta_title = str_replace("{{TOTAL_VIEWS}}",$cat_count, $category->meta_title);
		$meta_title = str_replace("{{CAT_NAME}}","Discount Tours ".$category->cat_name, $meta_title);
		$meta_title = str_replace("{{TOTAL_TOUR}}",$total_rows, $meta_title);
		$meta_title = str_replace("{{DATE}}",date('F d, Y'), $meta_title);
		$meta_title = str_replace("{{YEAR}}",date('Y'), $meta_title);

		$meta_keyword = str_replace("{{TOTAL_VIEWS}}",$cat_count, $category->meta_keyword);
		$meta_keyword = str_replace("{{CAT_NAME}}","Discount Tours ".$category->cat_name, $meta_keyword);
		$meta_keyword = str_replace("{{TOTAL_TOUR}}",$total_rows, $meta_keyword);
		$meta_keyword = str_replace("{{DATE}}",date('F d, Y'), $meta_keyword);
		$meta_keyword = str_replace("{{YEAR}}",date('Y'), $meta_keyword);

		$meta_description = str_replace("{{TOTAL_VIEWS}}",$cat_count, $category->meta_description);
		$meta_description = str_replace("{{CAT_NAME}}","Discount Tours ".$category->cat_name, $meta_description);
		$meta_description = str_replace("{{TOTAL_TOUR}}",$total_rows, $meta_description);
		$meta_description = str_replace("{{DATE}}",date('F d, Y'), $meta_description);
		$meta_description = str_replace("{{YEAR}}",date('Y'), $meta_description);

		$content = str_replace("{{TOTAL_VIEWS}}",$cat_count, $category->cat_content);
		$content = str_replace("{{CAT_NAME}}","Discount Tours ".$category->cat_name, $content);
		$content = str_replace("{{TOTAL_TOUR}}",$total_rows, $content);
		$content = str_replace("{{DATE}}",date('F d, Y'), $content);
		$content = str_replace("{{YEAR}}",date('Y'), $content);
		
		$cat_title = str_replace("{{TOTAL_TOUR}}",$total_rows, $category->cat_title);
		//$cat_title = str_replace("{{TOTAL_TOUR}}",$total_rows, $category->cat_title);
		
		//echo $category->content."--------------------------".$content;

	} else {
		header('Location: /error?url=/destination/'.$_GET['slug']);
		exit;
	}
} 
else {
	header('Location: /error?url=/destination/'.$_GET['slug']);
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php echo $meta_description; ?>"/>
<meta name="keywords" content="<?php echo $meta_keyword; ?>"/>
<title><?php echo $meta_title; ?></title>
<?php $title = 'Discount Tours '.$category->cat_name; ?>
<?php $slug  = 'destination/'.$category->cat_slug; ?>
<link rel="canonical" href="<?=SITEURL."/$slug";?>" />
<?php include 'inner_header.php';?>

<div class="search_home_wra" style="background1:url(<?php echo '/uploads/category/'.$category->cat_banner; ?>); background-size: cover;">
	<form action="<?=SITEURL;?>/search" method="get" id="search_form" style="padding:60px 0">
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

//$condition = "status=1 AND location='".$destination->name."'";
//$condition.= ($_GET['q']) ? " AND title like '%".addslashes($_GET['q'])."%'" : '';
//$condition.= ($_GET['country']) ? " AND country = '".addslashes($_GET['country'])."'" : '';

$limit  = 9;
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

//echo $condition; exit;
?>
<!--book your tour-->
<div class="book_tours_wra">
  <div class="container">
      <div class="heading9">Top Tours in <span><?php echo $destination->name; ?></span></div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="tour_count"><?php tour_count($conn, $condition, $order); ?></div>
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
        <div id="products">
        	<ul class="row">
           <?php
					 tour_list($conn, $condition, $order, "$offset, $limit");
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
        
        <?php /*?><div class="pagi">
         <nav aria-label="...">
					 <?php
           $sql = "SELECT * FROM tour_tours WHERE $condition ORDER BY tour_count DESC ";
           $result = $conn->query($sql);
           if ($result->num_rows > 0) {
             $order = (!empty($_GET['order'])) ? addslashes($_GET['order']) : '';
             $sort = (!empty($_GET['sort'])) ? addslashes($_GET['sort']) : '';
             $q = (!empty($_GET['q'])) ? addslashes($_GET['q']) : '';
  
             $total_pages = ceil($result->num_rows / $limit);
             echo paginattion($page, $total_pages, "/destination/".$_GET['slug']."?sort=$sort&order=$order&q=$q");
           }
           ?>
        	</nav>
        </div><?php */?>
        
        <div class="book_tour_matter">
					<?php echo $content; ?>
        </div>
        
      </div>        
      <?php /*?><div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php include 'tour_by_type.php';?>
        <?php include 'most_popular_tours.php';?>
      </div><?php */?>
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
