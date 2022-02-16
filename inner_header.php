<?php
//header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
//header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Connection: close");
?>
<link rel="shortcut icon" href="<?php echo APPROOT; ?>images/favicon.ico" type="image/x-icon">
<link href="<?php echo APPROOT; ?>css/style.css" rel="stylesheet">
<link href="<?php echo APPROOT; ?>css/other.css" rel="stylesheet">
<link href="<?php echo APPROOT; ?>css/bootstrap.css" rel="stylesheet">
<link href="<?php echo APPROOT; ?>css/bootstrap-theme.css?v3.3.7" rel="stylesheet">
<link href="<?php echo APPROOT; ?>css/font-awesome.min.css?v4.7.0" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script type='application/ld+json'>
{
	"@context":"http://schema.org",
	"@type":"WebSite",
	"@id":"#website",
	"url":"<?=SITEURL;?>",
	"name":"Best Toronto to Niagara Falls Sightseeing Tours | Discount Tours - Toronto to Niagara Falls Tours",
	"potentialAction":{
		"@type":"SearchAction",
		"target":"<?=SITEURL;?>/tours?q={search_term_string}",
		"query-input":"required name=search_term_string"
	}
}
</script>
<script type='application/ld+json'>
{
	"@context":"http://schema.org",
	"@type":"Organization",
	"url":"<?=SITEURL;?>",
	"sameAs":[
		"https://www.facebook.com/DiscountToursOfficial/",
		"https://www.instagram.com/niagarafallstour/",
		"https://www.linkedin.com/company/11304158/",
		"https://www.youtube.com/channel/UC4omaRnmPGIhYXfchBwJzXw",
		"https://twitter.com/InfoDiscountTours"
	],
	"@id":"#organization",
	"name":"Best Toronto to Niagara Falls Sightseeing Tours | Discount Tours - Toronto to Niagara Falls Tours",
	"logo":"<?=SITEURL;?>/images/logo.png"
}
</script>
<?php if(empty($_GET['slug'])) { ?>
<script type="application/ld+json">
{
	"@context" : "http://schema.org",
	"@type" : "LocalBusiness",
	"name" : "Best Toronto to Niagara Falls Sightseeing Tours | Discount Tours - Toronto to Niagara Falls Tours",
	"description": "Best Toronto to Niagara Falls Sightseeing Tours. Niagara Falls Tours &amp; Attractions With Special offers! Toll-Free +1 866-404-5115",
	"url" : "<?=SITEURL;?>/",
	"image" : "<?=SITEURL;?>/images/logo.png",
	"openingHours": "Fri,Sa,Su,Mo,Tu,We,Th 08:00-19:00",
	"aggregateRating" : {
		"@type" : "AggregateRating",
		"ratingValue" : "4.6",
		"bestRating" : "5",
		"worstRating": "0",
		"reviewCount" : "185"
	},
	/*"address" : {
		"@type" : "PostalAddress",
		"streetAddress" : "5 Brisdale Dr, Suite 208",
		"addressLocality" : "Brampton",
		"addressRegion" : "Ontario",
		"postalCode" : "L6A 0S9",
		"addressCountry" : {
			"@type" : "Country",
			"name" : "Canada"
		}
	},*/
	"telephone": "+1-866-404-5115",
	"priceRange": "$139 - $2,299"
}
</script>
<?php } ?>
<script>var SITEURL = '<?php echo APPROOT; ?>'; </script>
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8WKKS2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- New Covid-19 Message Here -->
<!-- End Google Tag Manager (noscript) -->
<div class="covid_wra">
  <div class="container">
  	<span data-toggle="modal" data-target="#myModal" class="anc"><img src="<?php echo IMAGEROOT; ?>mask.png" alt="mask.png" class="img-res mask"> COVID-19 IMPORTANT UPDATE</span>
	<span class="closeTop"><i class="fa fa-times-circle closeTop"></i></span>
  </div>
</div>
<!-- End Covid-19 -->

<!--top header-->
<div class="top_header_wra">
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
        	<?php if(isset($_SESSION['USER_ID'])) {  ?>
			<div class="agent_name"><span><i class="fa fa-user"></i> <?php echo $_SESSION['FULLNAME']; ?></span> <a href="<?php echo APPROOT; ?>logout"><i class="fa fa-sign-out"></i> Logout</a><div class="clearfix"></div></div>
			<?php } ?>
			<div class="mail_pc"><a href="tel:+1 866-404-5115"><i class="fa fa-phone"></i> +1 866-404-5115</a></div>
			<div class="mail_pc right15"><a href="mailto:info@discount.tours"><i class="fa fa-envelope-o"></i> info@discount.tours</a></div>
			<div class="mail_mob"><a href="tel:+1 866-404-5115"><i class="fa fa-phone"></i></a></div>
			<div class="mail_mob"><a href="mailto:info@discount.tours"><i class="fa fa-envelope-o"></i></a></div>
			
			<div class="toll_free_mob dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-flag"></i> <strong><?php echo $_COOKIE['country']; ?></strong> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php 
                $country_all = country_all($conn);
                while($country = $country_all->fetch_object() ) {
                ?>
                <li><a href="<?php echo APPROOT; ?>redirect?country=<?php echo $country->country."&redirect=".APPROOT.urlMap($country->country); ?>/all"><?php echo $country->country; ?></a></li>
                <?php } ?>
              </ul>
            </div>
			
			<div class="toll_free_mob dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-usd"></i> <strong><?php echo $_COOKIE['currency']; ?></strong> <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <?php 
                $currency_all = currency_all($conn);
                while($currency = $currency_all->fetch_object() ) {
                    $lable = str_replace("Price","",$currency->lable);
                ?>
                <li><a href="<?php echo APPROOT; ?>redirect?currency=<?php echo $lable."&redirect=".APPROOT; ?>"><?php echo $lable; ?></a></li>
                <?php } ?>
              </ul>
            </div>

			<?php if(!isset($_SESSION['USER_ID'])) {  ?>
			<div class="cart_head"><a href="<?php echo APPROOT; ?>login"><i class="fa fa-user"></i> <span>Login</span></a></div>
			<?php }  ?>

			<?php
			$sessionId = session();
			if(isset($sessionId)) { 
				$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb FROM `tour_customers` c, `tour_customer_detail` cd, tour_tours t WHERE c.id=cd.user_id AND c.sessionId='".$sessionId."' AND cd.tour_id=t.ID;";
				$query = $conn->query($sql);
			?> 
			<div class="cart_head"><a href="<?php echo APPROOT; ?>checkout"><i class="fa fa-shopping-cart"></i> <span><?=$query->num_rows; ?></span></a></div>
			<?php } else { ?>
			<div class="cart_head"><a href="<?php echo APPROOT; ?>tours"><i class="fa fa-shopping-cart"></i> <span>0</span></a></div>
			<?php } ?>

        </div>
     </div>
   </div>
</div>
<!--end top header-->
<!--nav-->
<nav class="navbar mynav">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="" href="<?php echo APPROOT; ?>"><img src="<?php echo IMAGEROOT; ?>Discount-Tours-Logo.png" alt="Discount-Tours-Logo.png" class="img-res logo_mobile" height="80"></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse mynav_header">
      <ul class="nav navbar-nav mynav2">                                                        
        <li><a href="<?php echo APPROOT; ?>">HOME</a></li>
        <li><a href="<?php echo APPROOT; ?>about-us">ABOUT US</a></li> 
        <li><a href="<?php echo APPROOT; ?>destinations-all">DESTINATION</a></li> 
        <li><a href="<?php echo APPROOT; ?>about-us">EXPERIENCE</a></li> 
        <li><a href="<?php echo APPROOT; ?>about-us">DEALS</a></li> 
        <li><a href="<?php echo APPROOT; ?>blog">BLOG</a></li> 
        <li><a href="<?php echo APPROOT; ?>contact-us">CONTACT US</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<!--end nav-->
