<div class="popular_tour">
    <h3>Most Popular Tours</h3>
  
    <?php
    $default_country  = $_COOKIE['country'] ? $_COOKIE['country'] : 'United States';
    $priceLable = $_COOKIE['currency'] ? "Price".$_COOKIE['currency'] : 'PriceUSD';
    $condition = "A.status=1 AND A.country='$default_country' AND B.lable='$priceLable'";
    
	if(!empty($_GET['slug']))
	$condition.=" AND A.slug<>'".addslashes($_GET['slug'])."'";
	tour_most_popular($conn, $condition); 
    ?>
</div>