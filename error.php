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
<meta name="description" content="Enjoy the scenic beauty of Niagara Falls with our Toronto to Niagara Falls Day Tour that is run every day. Know more about the tour schedule &amp; itinerary."/>
<meta name="robots" content="noindex,follow"/>
<meta name="keywords" content="Best Niagara Falls Sightseeing Tours, Tour Packages, Day Tour, Evening Tour, Small Group Custom Tour, Private Tour, Group Tours"/>
<link rel="canonical" href="<?=SITEURL;?>/error" />
<title>404 Not Found | <?=SITENAME;?></title>
<?php include 'inner_header.php';?>
<!--matter more-->
<div class="about_wra">
  <div class="container">
    <div class="row">
       <div class="col-lg-12">
         <h2 class="heading2">Unfortunately the page you requested cannot be found.</h2>
         <div class="txt">Either the page is not available anymore, or the address (URL) you have entered is incorrect.</div>
       </div>
     </div>
     
    <div class="row">
    	<div class="col-lg-12">
       <h4>You might want to checkout our most popular tours listed below.</h4>
       <?php
       $condition = "status=1";
       $order = '`tour_count` DESC';
       
       $limit  = 9;
       $page 	 = isset($_GET['page']) ? $_GET['page'] : 1;
       $offset = ($page - 1) * $limit;
       
       tour_list($conn, $condition, "$order", "$offset, $limit");
       ?>
       </div>
    </div>
   </div>
</div>
<!--end matter more-->

<?php include 'footer.php';?>
</body>
</html>
