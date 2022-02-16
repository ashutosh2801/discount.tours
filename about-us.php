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
<meta name="description" content="We are located in Niagara Falls, Canada. Experienced tour guides.  Find the best Toronto to Niagara Falls Tours, wine tours and many more. Toll-Free +1-800-653-2242!"/>
<meta name="keywords" content="Toronto To Niagara Falls Tours"/>
<link rel="canonical" href="<?=SITEURL;?>/about-us" />
<title>Toronto To Niagara Falls Tours | About Us – Niagara Falls Tour</title>
<?php include 'inner_header.php';?>
<!--banner-->
<div class="about_banner_wra">
<div class="detail_banner_shadow">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="banner_txt_l">
        <h3>About us</h3>
        <h2>The best way to tour Niagara Falls</h2>
        </div>
      </div>  
    </div>
  </div>
</div>
</div>
<!--end banner-->
<!--about-->
<div class="about_wra">
  <div class="container">
    <div class="row">
       <div class="col-lg-12">
         <div class="heading7">GREAT TOURS, GREAT VALUE!</div>
       </div>
       <div class="clearfix"></div>
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         
         <div class="txt2">
            <p>Niagara Falls is one of the most beautiful places in the World. There is so much to see and do. Discount Tours provides fresh, fun & educational tours of the Niagara Region.</p>
            <p>Discount Tours is both a tour operator and an Online Travel Agency and is linked with Niagara's most popular restaurants and tourist attractions, connecting travellers with amazing, unique travel experiences at great prices!</p>
            <p>Discount Tours and it's subsidiaries (Discount Tours Tours, Niagara.Tours and NiagaraTrips.ca) are dedicated to providing our customers with the ultimate Niagara Falls tour experiences.</p>
            <p>We offer Day, Evening and Custom Tours with pickup locations throughout the Greater Toronto Area which takes the stress out of your travel arrangements. We offer flexible payment options through our safe and easy to use booking portal.</p> 
            <p>Discount Tours is a member of Niagara Falls Tourism Association, the official tourism marketing organization of the City of Niagara Falls. Discount Tours Tours is licensed by Niagara Parks Commission. Our tour guides are also licensed by Niagara Parks Commission.</p>
         </div>
         <div class="btn_con"><a href="<?php echo APPROOT; ?>contact-us">Contact Us</a></div>
       </div>
       
    </div>  
  </div>
</div>
<!--end about-->

<?php include 'footer.php';?>
<script>
$('.collapse').on('shown.bs.collapse', function(){
$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
}).on('hidden.bs.collapse', function(){
$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
});
</script>
</body>
</html>
