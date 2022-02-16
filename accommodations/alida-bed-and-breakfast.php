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
<meta name="description" content="Alida's Bed and Breakfast is great for solo travellers or couples. A half hour walk to the Falls. Enjoy complimentary breakfast, free parking, free WiFi."/>
<meta name="keywords" content=""/>
<link rel="canonical" href="<?=SITEURL;?>/alida-bed-and-breakfast" />
<title>Alida's Bed and Breakfast - Niagara Falls Canada | ToNiagara</title>
<?php $title = 'Niagara Falls '.$category->cat_name; ?>
<?php $slug  = 'niagara-falls-'.$category->cat_slug; ?>

<?php include '../inner_header.php';?>
<!--book your tour-->
<div class="day_banner_wra" style="background:url(../images/accommodations/alida-bed-and-breakfast.jpg) 0 0 no-repeat; background-size: cover;">
<div class="inndetail_banner_shadow">
<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="banner_txt_l">
    <h2>Alida's Bed and Breakfast</h2>
    <h3><i class="fa fa-map-marker"></i> 6257 Dunn Street, Niagara Falls, ON L2G 2P6</h3>
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
        <h2>Alida's Bed and Breakfast </h2>
        <address><i class="fa fa-map-marker"></i> 6257 Dunn Street, Niagara Falls, ON L2G 2P6</address>
         <p>This lovely little place is in a quiet neighbourhood. It is at a walkable distance from the Falls area and other attractions.</p>

<p>Clean, spotless rooms await guests. Free parking is available at the property. </p>

<p>Each room has a TV, free WiFi, air conditioning and a private bathroom. The rooms are meant for 2 persons – adults only.</p>

<p>There is a lounge area with fireplace and TV and a dining room. There is a beautifully landscaped garden in the front and back, which is open to guests.</p>

<p>The place offers a complimentary breakfast prepared fresh every morning. Guests have a choice of American, vegetarian or continental breakfast.</p>

<p>You will have a chance to meet other guests staying at the bed and breakfast. Pricing and location are good. All in all, a great bargain.</p>
        
        <h3><i class="fa fa-sticky-note"></i> Please note</h3>
        <ul class="facilities">
        <li>Only adults are allowed. Children cannot be accommodated.</li>
        <li>No extra bed can be accommodated in the rooms.</li>
        <li>Pets are not allowed.</li>
        </ul>
        
		<p>Please click the button below to know more about Alida's Bed and Breakfast.</p>
        
        <div class="detail_btn"><a href="https://www.booking.com/hotel/ca/dunn-street-inn-bed.html?aid=1557851&no_rooms=1&group_adults=2&room1=A%2CA" target="_blank">More Details</a></div>
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
