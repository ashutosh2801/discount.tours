<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(isset($_POST['cust_order']) && isset($_POST['completed'])) {
	foreach($_POST['cust_order'] as $id) {
		$sql = "UPDATE `".PREFIX."customers` SET `status`=4 WHERE id=".$id.";";
		$conn->query($sql);

		$sql = "UPDATE `".PREFIX."customer_detail` SET `tour_complete`=1 WHERE user_id=".$id.";";
		$conn->query($sql);
	}
	$_SESSION['msg'] = 'Booking has been updated!';
	header('Location: customers_confirm.php');
	exit;
}

if(isset($_GET['id']) && ($_GET['act']=='complete')) {
	$sql = "UPDATE `".PREFIX."customers` SET `status`=4 WHERE id=".$_GET['id'].";";
	$conn->query($sql);

	$sql = "UPDATE `".PREFIX."customer_detail` SET `tour_complete`=1 WHERE user_id=".$_GET['id'].";";
	$conn->query($sql);

	if($conn->affected_rows) {
		$_SESSION['msg'] = 'Booking has been completed.';
		header('Location: customers_confirm.php');
		exit;
	}
}

if( isset($_POST['export']) ) 
{
	$delimiter = ",";
	$filename = "confirmed-tour.csv";
	$output = fopen("php://memory", "w");

	$fields = array('ORDER ID', 'CREATED DATE', 'CUSTOMER NAME', 'CUSTOMER EMAIL', 'CUSTOMER PHONE', 'SOURCE', 'STATUS', 'TOUR DATE', 'TOUR TITLE', 'PICKUP LOCATION', 'TOUR DETAIL', 'TOUR ADD ONS', 'SUB TOTAL', 'TAX', 'GRATUITY', 'TOTAL');
	fputcsv($output, $fields, $delimiter);

	$condition = "c.id=cd.user_id AND c.status=2 AND cd.tour_date>='".date('Y-m-d')."'";
	if(!empty($_POST['q'])) {
		$condition.= " AND (c.order_id like '%".$_POST['q']."%' OR cd.name like '%".$_POST['q']."%' OR cd.phone like '%".$_GET['q']."%' OR cd.email like '%".$_POST['q']."%')";
	}
	if(!empty($_POST['date'])) {
		$explode = explode(" - ",$_POST['date']);
		$condition.= " AND cd.tour_date>'".$explode[0]."' AND cd.tour_date<='".$explode[1]."'";
	}

	$sql = "SELECT c.id, c.status, c.order_id, c.created_date, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition ORDER BY cd.tour_date ASC";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_object()) {

			$source = '';
			if($row->url_string) {
				$url_string = json_decode($row->url_string);
				$source = $url_string->utm_source;
				//if($url_string->utm_source=='cj')
				//$source = 'CJ';
			}

			$str='';
			if($row->adults && $row->price_type=='person') {
				$str.= $row->adults.' adults X $'.$row->adults_price.' = $'.($row->adults*$row->adults_price).',';
			} else if($row->adults && $row->price_type=='group') {
				$str.= $row->adults.' adults = $'.($row->adults_price).',';
			}

			if($row->children) {
				$str.= $row->children.' children X $'.$row->children_price.' = $'.($row->children*$row->children_price).',';
			}
			if($row->seniors) {
				$str.= $row->seniors.' seniors X $'.$row->seniors_price.' = $'.($row->seniors*$row->seniors_price).',';
			} if($row->infants) {
				$str.= $row->infants.' infants X $'.$row->infants_price.' = $'.($row->infants*$row->infants_price);
			}
			$str = substr($str,0,-1);

			$addons = '';
			if(!empty($row->add_ons)) {
				$sql2 = "SELECT * FROM `".PREFIX."add_ons` WHERE addons_id IN (".$row->add_ons.")";
				$result2 = $conn->query($sql2);
				if ($result2->num_rows > 0) {
					$k = 0;
					$add_ons_nom = explode(",",$row->add_ons_nom);
					while($row2 = $result2->fetch_object()) {
						$addons.= $row2->addons_title . " (".$add_ons_nom[$k].") " ." = $". $add_ons_nom[$k++]*$row2->addons_price.',';
					}
				}
			}
			$addons = substr($addons,0,-1);

			$tour_detail = tour_detail($conn, $row->tour_id);

			$status 			= $row->status ? 'Paid' : 'Balance';
			$order_id 		= $row->order_id;
			$created_date	= $row->created_date;
			$name 				= $row->name;
			$email 				= $row->email;
			$phone 				= $row->phone;
			$tour_date		= $row->tour_date;
			$title				= $tour_detail->title;
			$pic_location	= $row->pickup_location;
			$subtotal 		= '$'.number_format($row->subtotal,2);
			$tax 					= '$'.number_format($row->tax,2);
			$gratuity_amt = '$'.number_format($row->gratuity_amt,2);
			$total 				= '$'.number_format($row->total,2);

			$lineData = array($order_id, $created_date, $name, $email, $phone, $source, $status, $tour_date, $title, $pic_location, $str, $addons, $subtotal, $tax, $gratuity_amt, $total);
			fputcsv($output, $lineData, $delimiter);
		}
	}

	//move back to beginning of file
	fseek($output, 0);

	//set headers to download file rather than displayed
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="' . $filename . '";');

	//output all remaining data on a file pointer
	fpassthru($output);
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Confirmed Booking :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<link href="css/export.css" rel="stylesheet" type="text/css" media="all" />
<?php require_once('includes/header.php'); ?>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<style>
.dropbtn { border: none; }
.dropdown { position: relative; display: inline-block; }
.dropdown-content {
    display: none;
    position: absolute;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
		padding:10px;
		background:#fff;
}
.dropdown-content a {
    text-decoration: none;
    display: block;
		padding:8px;
		margin-bottom:5px;
}
.dropdown:hover .dropdown-content {display: block;}
</style>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>

<!-- banner -->
<div class="wthree_agile_admin_info">
		<div class="w3_agileits_top_nav">
			<?php require_once('includes/leftbar.php'); ?>
		</div>

		<div class="clearfix"></div>
    <div class="inner_content">
      <!-- breadcrumbs -->
      <div class="w3l_agileits_breadcrumbs">
        <div class="w3l_agileits_breadcrumbs_inner">
          <ul>
            <li><a href="index.php">Dashboard</a><span>«</span></li>
            <li><a href="customers_unconfirm.php">New Booking</a><span>«</span></li>
            <li>List</li>
          </ul>
        </div>
      </div>
      <!-- //breadcrumbs -->

      <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle">Confirmed Bookings</h2>
        <!-- tables -->
        <?php
        if(!empty($_SESSION['msg'])) {
          echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
          $_SESSION['msg']='';
        }
        ?>
        <div class="agile-tables">
          <div class="w3l-table-info agile_info_shadow">
            <form action="" method="get" autocomplete="off">
            <div class="form-group">
            <div class="row">
              <div class="col-md-3">
              <input type="text" name="q" placeholder="e.g. Name, phone, email, order id etc" autocomplete="off" value="<?php echo isset($_GET['q'])?$_GET['q']:''?>" />
              </div>
              <div class="col-md-3">
              <input type="text" name="date" id="dates" placeholder="Date range" autocomplete="off" value="<?php echo isset($_GET['date'])?$_GET['date']:''?>" />
              </div>
              <div class="col-md-3">
                  <div style="margin-top:8px;">
                    <button type="submit" class="btn btn-success btn-flat btn-pri"><i class="fa fa-search" aria-hidden="true"></i> Search </button>
                  </div>
              </div>
            </div>
            </div>
            </form>
            <form action="" method="post">
            <table id="table"  class="table">
              <thead>
                <tr>
                  <th colspan="9" style="background:#fff">
                    <button type="submit" class="btn btn-success" name="completed"  onClick="return confirm('Do you want to COMPLETE booking?')"><i class="fa fa-check"></i> Mark as complete All</button>
                    <button type="submit" class="btn btn-success" name="export" ><i class="fa fa-file"></i> Export as .CSV</button>
                    </th>
                </tr>
                <tr>
                  <th width="20"><input type="checkbox" class="select-all" style="width:18px; height:18px" /></th>
                  <th>#Order ID</th>
                  <th>Created Date</th>
                  <th>Customer Name</th>
                  <th>Customer Email</th>
                  <th>Coupon</th>
                  <th>Source</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php
              $condition = "c.id=cd.user_id AND c.status=2";
              if(!empty($_GET['q'])) {
                $condition.= " AND (c.order_id like '%".$_GET['q']."%' OR cd.name like '%".$_GET['q']."%' OR cd.phone like '%".$_GET['q']."%' OR cd.email like '%".$_GET['q']."%')";
              }
              if(!empty($_GET['date'])) {
                $explode = explode(" - ",$_GET['date']);
                $condition.= " AND cd.tour_date>'".$explode[0]."' AND cd.tour_date<='".$explode[1]."'";
              }
							else {
								$condition.= " AND cd.tour_date>='".date('Y-m-d')."'";
							}
              //echo $condition;

              $sql = "SELECT c.id, c.status, c.order_id, c.created_date, c.agent_id, c.url_string, cd.* FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd WHERE $condition GROUP BY cd.user_id ORDER BY cd.tour_date ASC";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_object()) {
              ?>
                <tr bgcolor="#d4e8d4">
                  <td width="20"><input type="checkbox" class="checkbox" name="cust_order[]" style="width:18px; height:18px" value="<?php echo $row->id; ?>" /></td>
                  <td>
                    <?php echo $row->order_id; ?>
                    <input type="hidden" value="<?php echo $row->id; ?>" name="cust[]" />
                  </td>
                  <td><?php echo $row->created_date; ?></td>
                  <td><?php echo $row->name; ?> [<a href="tel:<?php echo $row->phone; ?>"><?php echo $row->phone; ?></a>]</td>
                  <td><a href="<?php echo $row->email; ?>"><?php echo $row->email; ?></a></td>
                  <td><?php echo $row->coupon; ?></td>
                  <td>
                    <?php
                    if($row->url_string) {
                      $url_string = json_decode($row->url_string);
                      if($url_string->utm_source=='cj')
                      echo 'CJ';
                      else
                      echo '<a target="_blank" class="badge badge-success" href="agent_detail.php?Id='.$row->agent_id.'">'.$url_string->utm_source.'</a>';
                    }
                    ?>
                  </td>
                  <td><?php echo $row->status?'<a class="badge badge-success">Paid</a>':'<a class="badge badge-warning">Balance</a>'; ?></td>
                  <td>
                  	<a href="booking_checkout.php?id=<?php echo $row->id; ?>" class="badge badge-warning"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="decline.php?orderId=<?php echo $row->order_id; ?>" class="badge badge-danger" onClick="return confirm('Do you want to REFUND payment?')"><i class="fa fa-close"></i> Refund</a>
                    <a href="?id=<?php echo $row->id; ?>&act=complete" class="badge badge-success" onClick="return confirm('Do you want to create Mark as COMPLETED?')"><i class="fa fa-check"></i> Mark as complete</a>
                  </td>
                </tr>

                <tr><td colspan="9">
                <table class="table" style="margin:5px;">
                <thead>
                  <tr>
                  <th width="210" style="background:#4CAF50">Tour Date</th>
                  <th width="210" style="background:#4CAF50">Tour Title</th>
                  <th width="210" style="background:#4CAF50">Pickup Location</th>
                  <th width="280" style="background:#4CAF50">Tour Detail</th>
                  <th width="280" style="text-align:right;background:#4CAF50">Tour Add Ons</th>
                  <th width="120" style="text-align:right;background:#4CAF50">Sub Total</th>
                  <th width="100" style="text-align:right;background:#4CAF50">Discount</th>
                  <th width="100" style="text-align:right;background:#4CAF50">Tax</th>
                  <th width="100" style="background:#4CAF50;text-align:right">Gratuity</th>
                  <th width="180" style="background:#4CAF50;text-align:right">Convenience fee</th>
                  <th width="100" style="background:#096;text-align:right"><strong>Total</strong></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $sql3 = "SELECT c.id, c.status, c.order_id, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.price_type FROM `".PREFIX."customers` c, `".PREFIX."customer_detail` cd, ".PREFIX."tours t WHERE c.id=".$row->id." AND  c.id=cd.user_id AND cd.tour_id=t.ID AND c.status=2 ORDER BY cd.tour_date ASC";
                $result3 = $conn->query($sql3);
                  $sum = 0;
                  while($row3 = $result3->fetch_object()) {
                    $tour_detail = tour_detail($conn, $row3->tour_id);
                    $sum+= $row3->total;
                ?>
                <tr>
                  <td>
                    <?php echo $row3->tour_date.' '.$row3->tour_time; ?>
                    <?php if($row3->ID==8) { ?><br>
                    <a href="change-resend.php?id=<?php echo $row3->cid; ?>" class="badge badge-primary"><i class="fa fa-pencil"></i> Edit</a>
                    <a href="resend.php?orderId=<?php echo $row->order_id; ?>" class="badge badge-success" onClick="return confirm('Do you want to resend again?');"><i class="fa fa-envelope"></i> Resend</a>
                    <?php } ?>
                  </td>
                  <td><?php echo $tour_detail->title; ?></td>
                  <td><?php echo $row3->pickup_location; ?></td>
                  <td style="text-align:right">
                  <?php if($row3->adults && $row3->price_type=='person') { ?>
                  <?=$row3->adults; ?> adults X $<?=$row3->adults_price; ?> = $<?=($row3->adults*$row3->adults_price); ?>,<br />
                  <?php } else if($row3->adults && $row3->price_type=='group') { ?>
                  <?=$row3->adults; ?> adults = $<?=($row3->adults_price); ?>,<br />
                  <?php } if($row3->children) { ?>
                  <?=$row3->children; ?> children X $<?=$row3->children_price; ?> = $<?=($row3->children*$row3->children_price); ?>, <br />
                  <?php } if($row3->seniors) { ?>
                  <?=$row3->seniors; ?> seniors X $<?=$row3->seniors_price; ?> = $<?=($row3->seniors*$row3->seniors_price); ?>, <br />
                  <?php } if($row3->infants) { ?>
                  <?=$row3->infants; ?> infants X $<?=$row3->infants_price; ?> = $<?=($row3->infants*$row3->infants_price); ?>
                  <?php } ?>
                  </td>
                  <td style="text-align:right">
                  <?php
                  if(!empty($row->add_ons)) {
                    $sql2 = "SELECT * FROM `".PREFIX."add_ons` WHERE addons_id IN (".$row3->add_ons.")";
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                      $k = 0;
                      $add_ons_nom = explode(",",$row3->add_ons_nom);
                      while($row2 = $result2->fetch_object()) {
                        echo $row2->addons_title . " (".$add_ons_nom[$k].") " ." = $". $add_ons_nom[$k++]*$row2->addons_price.',<br>';
                      }
                    }
                  }
                  ?>
                  </td>
                  <td style="text-align:right">$<?php echo number_format($row3->subtotal,2); ?></td>
                  <td style="text-align:right; color:#f00">$<?php echo number_format($row3->discount,2); ?></td>
                  <td style="text-align:right">$<?php echo number_format($row3->tax,2); ?></td>
                  <td style="text-align:right">$<?php echo number_format($row3->gratuity_amt,2); ?></td>
                  <td style="text-align:right">$<?php echo number_format($row3->convenience_fee,2); ?></td>
                  <th style="background:#096;text-align:right;"><strong>$<?php echo number_format($row3->total,2); ?></strong></th>
                </tr>
                <?php
                //$sum+=$row3->total;
                }
                ?>
                <?php /*?><tr>
                  <td colspan="8" style="text-align:right"><strong>Grand Total</strong></td>
                  <td style="text-align:right"><strong>$<?php echo number_format($sum,2); ?></strong></td>
                </tr><?php */?>
                </tbody>
                </table>
                </td>
                </tr>
              <?php
              }
              } else {
                  echo "<tr><td colspan='9'>No records found.</td></tr>";
              }
              ?>
              </tbody>
            </table>
            </form>
            <?php /*?><br>
            <div class="form-group">
              <button type="submit" name="update" class="btn btn-success btn-flat btn-pri"><i class="fa fa-floppy-o" aria-hidden="true"></i> Update </button>
            </div><?php */?>
          </div>
        </div>
        <!-- //tables -->
      </div>
    <!-- //inner_content_w3_agile_info-->
    </div>
		<!-- //inner_content-->
</div>
<!-- banner -->

<?php require_once('includes/footer.php'); ?>
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	//$('#table').basictable();
	$(".select-all").click(function () {
     $('.checkbox').not(this).prop('checked', this.checked);
	});
	$('#dates').daterangepicker({
		locale: {
      format: 'YYYY-MM-DD'
    },
		ranges: {
			 'Today': [moment(), moment()],
			 'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
			 'Last 7 Days': [moment().subtract(6, 'days'), moment()],
			 'Last 30 Days': [moment().subtract(29, 'days'), moment()],
			 'This Month': [moment().startOf('month'), moment().endOf('month')],
			 'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
		}
	});
});
</script>
</body>
</html>
