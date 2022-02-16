<?php
require_once('../includes/config.php');
require_once('includes/functions.php');
check_permission();

if(!empty($_GET['orderId']))
{
		$orderId = $_GET['orderId'];
		$sql = "SELECT c.id, c.status, c.created_date, cd.*, t.ID, t.title, t.sub_title, t.slug, t.tour_thumb, t.price_type FROM `tour_customers` c, `tour_customer_detail` cd, tour_tours t WHERE c.id=cd.user_id AND c.order_id='".$orderId."' AND cd.tour_id=t.ID limit 1;";
		$query = $conn->query($sql);
		if($query->num_rows > 0 ) 
		{
			$subtotal = $tax = $cnt = $total = 0;
			$tour_title = array();

			$HTML.= '<table width="100%" border="0" cellspacing="0" cellpadding="4" style="background:url(https://www.toniagara.com/images/w_mark.png); border:1px solid #ccc; margin:15px 0; padding:15px;font-size:13px;">';
			while($model = $query->fetch_object()) 
			{
				$adults_price 	= $adults = 0;
				$children_price = $children = 0;
				$seniors_price 	= $seniors = 0;
				$infants_price 	= $infants = 0;

				if($model->adults) { $adults = $model->adults; $adults_price = $model->adults_price; $cnt+=$model->adults; }
				if($model->children) { $children = $model->children; $children_price = $model->children_price; $cnt+=$model->children; }
				if($model->seniors) { $seniors = $model->seniors; $seniors_price = $model->seniors_price; $cnt+=$model->seniors; }
				if($model->infants) { $infants = $model->infants; $infants_price = $model->infants_price; $cnt+=$model->infants; }

				if($model->price_type=='person') {
					$subtotal+= ($adults * $adults_price) + ($children * $children_price) + ($seniors * $seniors_price) + ($infants * $infants_price);
				}
				else if($model->price_type=='group') {
					$subtotal+= $adults_price;
				}

				//$tour_title[]= $model->title;
				$departure_date	= strtoupper(date('F d 2019',strtotime($model->tour_date)));
				$phone = $model->phone ? $model->phone : 'NA';
				$customer_info = '<div style="font-size:13px; color:#999;">Customer Name</div>
				<div style="font-size:16px; color:#000; font-weight:600; margin:5px 0 10px 0;">'.$model->name.'</div>
				<div style="font-size:13px; color:#00569f;">'.$model->email.'</div>
				<div style="font-size:13px; margin:10px 0;"><strong>Phone:</strong> '.$phone.'</div>
				<div style="font-size:13px;"><strong>'.$cnt.'</strong> Reserved</div>';

				if($model->adults) {
					if($model->price_type=='person') {
						$HTML.= '<tr>
							<td rowspan="9" valign="top">'.$customer_info.'</td>
							<td>Adults ('.$model->adults.' × CA$'. $model->adults_price.')</td>
							<td>CA$'. number_format(($model->adults * $model->adults_price),2).'</td>
						</tr>';
					}
					else if($model->price_type=='group') {
						$HTML.= '<tr>
							<td rowspan="9" valign="top">'.$customer_info.'</td>
							<td>Number of Guests ('.$model->adults.')</td>
							<td>CA$'. number_format($model->adults_price,2).'</td>
						</tr>';
					}
				} if($model->children) {
				$HTML.= '<tr>
					<td>Children ('. $model->children.' × CA$'. $model->children_price.')</td>
					<td>CA$'. number_format(($model->children*$model->children_price),2).'</td>
				</tr>';
				} if($model->seniors) {
				$HTML.= '<tr>
					<td>Seniors ('. $model->seniors.' × CA$'. $model->seniors_price.')</td>
					<td>CA$'. number_format(($model->seniors*$model->seniors_price),2).'</td>
				</tr>';
				} if($model->infants) {
				$HTML.= '<tr>
					<td>Infants ('. $model->infants.' × CA$'. $model->infants_price.')</td>
					<td>CA$'. number_format(($model->infants*$model->infants_price),2).'</td>
				</tr>';
				}

				$HTML.= '<tr>
					<td colspan="2" style="border-bottom:1px solid #ccc;"></td>
				</tr>';

				$sub_total+= $subtotal;
				$tax+= $model->tax;
				$gratuity+= $model->gratuity_amt;
				$convenience_fee+= $model->convenience_fee;

				/*$HTML.= '<tr>
									 <td><strong>Total</strong></td>
									 <td><strong>CA$'. number_format($subtotal,2).'</strong></td>
								 </tr>';*/

				//$sub_total+= $subtotal;
			}

			$total = ($sub_total + $tax + $gratuity + $convenience_fee);

			list($whole, $decimal) = explode('.', number_format($sub_total,2));
			$HTML.= '
					<tr>
						<td><strong>Total</strong></td>
						<td><strong>CA$ '. $whole.' <sup><u>'. $decimal .'</u></sup></strong></td>
					</tr>';
			if($tax) {
				list($whole, $decimal) = explode('.', number_format($tax,2));
				$HTML.= '<tr>
						<td>Taxes & fees (13%)</td>
						<td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
					</tr>';
			}
			if($gratuity) {
				list($whole, $decimal) = explode('.', number_format($gratuity,2));
				$HTML.= '<tr>
						<td>Gratuity</td>
						<td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
					</tr>';
			}
			if($convenience_fee) {
				list($whole, $decimal) = explode('.', number_format($convenience_fee,2));
				$HTML.= '<tr>
						<td>Convenience fee</td>
						<td>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></td>
					</tr>';
			}
			$HTML.= '<tr>
				<td colspan="2" style="border-bottom:1px solid #ccc;"></td>
			</tr>';
			list($whole, $decimal) = explode('.', number_format($total,2));
			$HTML.= '<tr>
						<td><strong>Grand Total</strong></td>
						<td><strong>CA$ '. $whole .' <sup><u>'. $decimal .'</u></sup></strong></td>
					</tr></table>';

			$sql3 = "SELECT * FROM `tour_customers` WHERE order_id='".$orderId."' LIMIT 1;";
			$query3 = $conn->query($sql3);
			if($query3->num_rows > 0 ) {
				$model3 = $query3->fetch_object();
				$name 			= $model3->name;
				$email 			= $model3->email;
				$phone 			= $model3->phone;
				$auth_id		= $model3->auth_id;
			}
		}

		$htmlContent = file_get_contents("emails/helicopter-ticket.html");

		$message = str_replace("{{customer_tour_info}}", $HTML, $htmlContent);
		$message = str_replace("{{departure_date}}", $departure_date, $message);
		$message = str_replace("{{name}}", $name, $message);

		$subject = 'ToNiagara - Your booking request has been confirmed. Order ID - '.$orderId;

		sendMail( array($email, $name), $subject, $message);
		sendMail( array('info@toniagara.com', $name), $subject, $message);
		$_SESSION['msg'] = 'Mail has been sent!';			
}
else {
	$_SESSION['msg'] = 'Invalid Order ID!';				
}
header("Location: customers_confirm.php");
exit;
?>