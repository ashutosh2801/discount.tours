<?php
require_once('includes/config.php');
require_once('includes/functions.php');
require_once('includes/Mobile_Detect.php');

$detect = new Mobile_Detect;

if(!empty($_GET['slug']))
{
	//$sql = "SELECT * FROM tour_tours WHERE status=1 AND slug='".addslashes($_GET['slug'])."'";
	$sql = "SELECT * FROM tour_category WHERE cat_slug='".addslashes($_GET['slug'])."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$category = $result->fetch_object();
		
		$cat_count = $category->cat_count + 1;
		$sql2 = "UPDATE `tour_category` SET `cat_count`='$cat_count' WHERE id=".$tour->cat_count.";";
		$conn->query($sql2);

		$condition = "status=1 AND FIND_IN_SET('".$_GET['slug']."', category)";
		$condition.= (!empty($_GET['q'])) ? " AND title like '%".addslashes($_GET['q'])."%'" : '';
		$condition.= (!empty($_GET['country'])) ? " AND country = '".addslashes($_GET['country'])."'" : '';
		
		$total_rows = 0;
		$sql = "SELECT * FROM tour_tours WHERE $condition ORDER BY tour_count DESC ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$total_rows = $result->num_rows;
		}

		$meta_title = str_replace("{{TOTAL_VIEWS}}",$cat_count, $category->meta_title);
		$meta_title = str_replace("{{CAT_NAME}}","Niagara Falls ".$category->cat_name, $meta_title);
		$meta_title = str_replace("{{TOTAL_TOUR}}",$total_rows, $meta_title);
		$meta_title = str_replace("{{DATE}}",date('F d, Y'), $meta_title);
		$meta_title = str_replace("{{YEAR}}",date('Y'), $meta_title);

		$meta_keyword = str_replace("{{TOTAL_VIEWS}}",$cat_count, $category->meta_keyword);
		$meta_keyword = str_replace("{{CAT_NAME}}","Niagara Falls ".$category->cat_name, $meta_keyword);
		$meta_keyword = str_replace("{{TOTAL_TOUR}}",$total_rows, $meta_keyword);
		$meta_keyword = str_replace("{{DATE}}",date('F d, Y'), $meta_keyword);
		$meta_keyword = str_replace("{{YEAR}}",date('Y'), $meta_keyword);

		$meta_description = str_replace("{{TOTAL_VIEWS}}",$cat_count, $category->meta_description);
		$meta_description = str_replace("{{CAT_NAME}}","Niagara Falls ".$category->cat_name, $meta_description);
		$meta_description = str_replace("{{TOTAL_TOUR}}",$total_rows, $meta_description);
		$meta_description = str_replace("{{DATE}}",date('F d, Y'), $meta_description);
		$meta_description = str_replace("{{YEAR}}",date('Y'), $meta_description);

		$content = str_replace("{{TOTAL_VIEWS}}",$cat_count, $category->cat_content);
		$content = str_replace("{{CAT_NAME}}","Niagara Falls ".$category->cat_name, $content);
		$content = str_replace("{{TOTAL_TOUR}}",$total_rows, $content);
		$content = str_replace("{{DATE}}",date('F d, Y'), $content);
		$content = str_replace("{{YEAR}}",date('Y'), $content);
		
		$cat_title = str_replace("{{TOTAL_TOUR}}",$total_rows, $category->cat_title);
		//$cat_title = str_replace("{{TOTAL_TOUR}}",$total_rows, $category->cat_title);
		
		//echo $category->content."--------------------------".$content;

	} else {
		if($_GET['slug']=='fireworks-cruise' || $_GET['slug']=='falls-fireworks-cruise')
		header('Location: /niagara-falls-boat-tours');
		else
		header('Location: /error?url=/niagara-falls-'.$_GET['slug']);
		exit;
	}
} 
else {
	header('Location: /tours');
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
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>
<link rel="canonical" href="<?=SITEURL."/$slug";?>" />
<?php include 'inner_header.php';?>
<!--banner-->

<div class="search_home_wra niagara-air-tours_banner_wra">
	<form action="<?=SITEURL;?>/search" method="get" id="search_form" style="padding: 25px 0 25px;">
	<div class="ui-widget">
    <!--<h1>Find amazing things to do. <br/>Anytime, anywhere.</h1>-->
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
<!--end banner-->


<div class="niagara-air-tours_banner_wra" style="background:url(<?php echo '/uploads/category/'.$category->cat_banner; ?>); background-size: cover;">
<div class="detail_banner_shadow">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="banner_txt_l">
        <h3><?php echo $category->cat_sub_title; ?></h3>
        <h2><?php echo $cat_title; ?></h2>
        </div>
      </div>  
    </div>
  </div>
</div>
</div>


<!--book your tour-->
<?php
$condition = "status=1 AND FIND_IN_SET('".$_GET['slug']."', category)";
$condition.= ($_GET['q']) ? " AND title like '%".addslashes($_GET['q'])."%'" : '';
$condition.= ($_GET['country']) ? " AND country = '".addslashes($_GET['country'])."'" : '';

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
             echo paginattion($page, $total_pages, "/niagara-falls-".$_GET['slug']."?sort=$sort&order=$order&q=$q");
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
