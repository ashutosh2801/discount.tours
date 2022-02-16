<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Dashboard :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
</head>
<body>

<!-- banner -->
<div class="wthree_agile_admin_info">
		<!-- /w3_agileits_top_nav-->
		<!-- /nav-->
		<div class="w3_agileits_top_nav">
			<?php require_once('includes/leftbar.php'); ?>
		</div>
		<!-- //nav -->
			
		<div class="clearfix"></div>
		<!-- //w3_agileits_top_nav-->
		<!-- /inner_content-->
				<div class="inner_content">
				    <!-- /inner_content_w3_agile_info-->
					<div class="inner_content_w3_agile_info">
							<!-- /agile_top_w3_grids-->
					   	<div class="agile_top_w3_grids">
					      <ul class="ca-menu" style="overflow:auto">
									<li>
										<a href="customers_unconfirm.php">
										  <i class="fa fa-users" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main one">
                        <?php
												$condition = "c.id=cd.user_id AND c.status=1";
												$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY cd.tour_date ASC";
												$result = $conn->query($sql);
												//$result = tour_list($conn, "customers", "status=1");
												echo $result->num_rows;
												?>
                        </h4>
												<h3 class="ca-sub two">New Bookings</h3>
											</div>
										</a>
									</li>
                  
									<li>
										<a href="customers_confirm.php">
										  <i class="fa fa-check" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main three">
                        <?php
												$condition = "c.id=cd.user_id AND c.status=2 AND cd.tour_date>='".date('Y-m-d')."'";
												$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY cd.tour_date ASC";
												$result = $conn->query($sql);
												//$result = tour_list($conn, "customers", "status=2 AND cd.tour_date>='".date('Y-m-d')."'");
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub">Confirmed Bookings</h3>
											</div>
										</a>
									</li>
                  
                  <li>
										<a href="customers_trash.php">
											<i class="fa fa-trash" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main two">
                        <?php
												$condition = "c.id=cd.user_id AND c.status=3";
												$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY cd.tour_date ASC";
												$result = $conn->query($sql);
												//$result = tour_list($conn, "customers", "status=3");
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub four">Trash Bookings</h3>
											</div>
										</a>
									</li>
                  
                  <li>
										<a href="customers_completed.php">
										  <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main three">
                        <?php
												$condition = "c.id=cd.user_id AND c.status=4";
												$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY cd.tour_date ASC";
												$result = $conn->query($sql);
												//$result = tour_list($conn, "customers", "status=4");
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub three">Completed Bookings</h3>
											</div>
										</a>
									</li>
                </ul>  
                <ul class="ca-menu">  
                  <li>
										<a href="customers_abandone.php">
											<i class="fa fa-comment-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main">
                        <?php
												$condition = "c.id=cd.user_id AND c.status=0";
												$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY cd.tour_date ASC";
												$result = $conn->query($sql);
												//$result = tour_list($conn, "customers", "status=0");
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub">Abandone</h3>
											</div>
										</a>
									</li>
                  
									<li>
										<a href="tours.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<div class="ca-content">
											<h4 class="ca-main two">
                      	<?php
												$result = tour_list($conn, "tours");
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                      </h4>
												<h3 class="ca-sub one">Tours</h3>
											</div>
										</a>
									</li>
                  
                  <li>
										<a href="addons.php">
											<i class="fa fa-list" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main two">
                        <?php
												$result = tour_list($conn, "add_ons", '1', 'addons_id');
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub two">Add-ons</h3>
											</div>
										</a>
									</li>
                  
                  <li>
										<a href="agents.php">
										  <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main users">
                        <?php
												$condition = "role=2";
												$sql = "SELECT * FROM `".PREFIX."users` WHERE $condition ORDER BY name ASC";
												$result = $conn->query($sql);
												//$result = tour_list($conn, "customers", "status=4");
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub three">Agents</h3>
											</div>
										</a>
									</li>
                  
									<div class="clearfix"></div>
								</ul>
                
                <ul class="ca-menu">  
                  <li>
										<a href="category.php">
											<i class="fa fa-comment-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main one">
                        <?php
												$sql = "SELECT * FROM `".PREFIX."category`";
												$result = $conn->query($sql);
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub two">Category</h3>
											</div>
										</a>
									</li>
                  
									<li>
										<a href="secure-payment.php">
											<i class="fa fa-dollar" aria-hidden="true"></i>
											<div class="ca-content">
											<h4 class="ca-main two">
                      	<?php
												$sql = "SELECT * FROM `".PREFIX."secure_payment`";
												$result = $conn->query($sql);
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                      </h4>
												<h3 class="ca-sub one">Secure Payments</h3>
											</div>
										</a>
									</li>
                  
                  <li>
										<a href="discounts.php">
											<i class="fa fa-tags" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main two">
                        <?php
												$sql = "SELECT * FROM `".PREFIX."discount`";
												$result = $conn->query($sql);
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub two">Discounts</h3>
											</div>
										</a>
									</li>
                  
                  <?php /*?><li>
										<a href="agents.php">
										  <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
											<div class="ca-content">
												<h4 class="ca-main users">
                        <?php
												$condition = "role=2";
												$sql = "SELECT * FROM `".PREFIX."users` WHERE $condition ORDER BY name ASC";
												$result = $conn->query($sql);
												//$result = tour_list($conn, "customers", "status=4");
												echo $result->num_rows ? $result->num_rows : 0;
												?>
                        </h4>
												<h3 class="ca-sub three">Agents</h3>
											</div>
										</a>
									</li><?php */?>
                  
									<div class="clearfix"></div>
								</ul>
					   	</div>
					 		<!-- //agile_top_w3_grids-->
              
							<!-- /w3ls_agile_circle_progress-->
							<?php /*?>
							<div class="w3ls_agile_cylinder chart agile_info_shadow">
								<h3 class="w3_inner_tittle two"> Top Accessed Tours</h3>
								<div id="chartdiv"></div>
							</div>
							<?php */?>
							<!-- /w3ls_agile_circle_progress-->
													
						<!-- //social_media-->
				    </div>
					<!-- //inner_content_w3_agile_info-->
				</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->

<?php require_once('includes/footer.php'); ?>
<?php /*?><!-- /amcharts -->
<script src="js/amcharts.js"></script>
<script src="js/serial.js"></script>
<script src="js/export.js"></script>	
<script src="js/light.js"></script>
<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv", {
    "theme": "light",
    "type": "serial",
    "startDuration": 2,
    "dataProvider": [{
        "country": "USA",
        "visits": 4025,
        "color": "#FF0F00"
    }, {
        "country": "China",
        "visits": 1882,
        "color": "#FF6600"
    }, {
        "country": "Japan",
        "visits": 1809,
        "color": "#FF9E01"
    }, {
        "country": "Germany",
        "visits": 1322,
        "color": "#FCD202"
    }, {
        "country": "UK",
        "visits": 1122,
        "color": "#F8FF01"
    }, {
        "country": "France",
        "visits": 1114,
        "color": "#B0DE09"
    }, {
        "country": "India",
        "visits": 984,
        "color": "#04D215"
    }, {
        "country": "Spain",
        "visits": 711,
        "color": "#0D8ECF"
    }, {
        "country": "Netherlands",
        "visits": 665,
        "color": "#0D52D1"
    }, {
        "country": "Russia",
        "visits": 580,
        "color": "#2A0CD0"
    }, {
        "country": "South Korea",
        "visits": 443,
        "color": "#8A0CCF"
    }, {
        "country": "Canada",
        "visits": 441,
        "color": "#CD0D74"
    }, {
        "country": "Brazil",
        "visits": 395,
        "color": "#754DEB"
    }, {
        "country": "Italy",
        "visits": 386,
        "color": "#DDDDDD"
    }, {
        "country": "Taiwan",
        "visits": 338,
        "color": "#333333"
    }],
    "valueAxes": [{
        "position": "left",
        "axisAlpha":0,
        "gridAlpha":0
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 0.85,
        "lineAlpha": 0.1,
        "type": "column",
        "topRadius":1,
        "valueField": "visits"
    }],
    "depth3D": 40,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha":0,
        "gridAlpha":0

    },
    "export": {
    	"enabled": true
     }

}, 0);
</script>
<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv1", {
    "type": "serial",
	"theme": "light",
    "legend": {
        "horizontalGap": 10,
        "maxColumns": 1,
        "position": "right",
		"useGraphSettings": true,
		"markerSize": 10
    },
    "dataProvider": [{
        "year": 2017,
        "europe": 2.5,
        "namerica": 2.5,
        "asia": 2.1,
        "lamerica": 0.3,
        "meast": 0.2,
        "africa": 0.1
    }, {
        "year": 2016,
        "europe": 2.6,
        "namerica": 2.7,
        "asia": 2.2,
        "lamerica": 0.3,
        "meast": 0.3,
        "africa": 0.1
    }, {
        "year": 2015,
        "europe": 2.8,
        "namerica": 2.9,
        "asia": 2.4,
        "lamerica": 0.3,
        "meast": 0.3,
        "africa": 0.1
    }],
    "valueAxes": [{
        "stackType": "regular",
        "axisAlpha": 0.5,
        "gridAlpha": 0
    }],
    "graphs": [{
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Europe",
        "type": "column",
		"color": "#000000",
        "valueField": "europe"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "North America",
        "type": "column",
		"color": "#000000",
        "valueField": "namerica"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Asia-Pacific",
        "type": "column",
		"color": "#000000",
        "valueField": "asia"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Latin America",
        "type": "column",
		"color": "#000000",
        "valueField": "lamerica"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Middle-East",
        "type": "column",
		"color": "#000000",
        "valueField": "meast"
    }, {
        "balloonText": "<b>[[title]]</b><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>",
        "fillAlphas": 0.8,
        "labelText": "[[value]]",
        "lineAlpha": 0.3,
        "title": "Africa",
        "type": "column",
		"color": "#000000",
        "valueField": "africa"
    }],
    "rotate": true,
    "categoryField": "year",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha": 0,
        "gridAlpha": 0,
        "position": "left"
    },
    "export": {
    	"enabled": true
     }
});
</script>
<!-- //amcharts --><?php */?>
</body>
</html>