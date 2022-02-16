<?php
require_once('includes/config.php');
require_once('includes/functions.php');

$HTML = '
<div style="width:600px; margin:0 auto; font-family:Tahoma, Geneva, sans-serif; color:#666; font-size:1em;">
<table border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><img src="https://www.toniagara.com//images/logo.png" alt="logo.png" height="55"></td>
  </tr>
  <tr>
    <td>
    <h3 align="center">Your booking request has been received.</h3>
    <p align="center">Your booking request has been received, but has not been confirmed. We will review the booking and confirm its status as soon as possible. Your credit card will not be charged until the booking is confirmed. The charge on your credit card statement will appear as "TONIAGARA".</p>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" style="background:green;"><a style="color:#fff;display:block; text-align:center; text-decoration:none;" href="#">Accept</a></td>
	<td width="50%" style="background:red;"><a style="color:#fff; display:block; text-align:center; text-decoration:none;" href="#">Decline</a></td> 
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="15" bordercolor="#ccc" style="border-collapse:collapse; border:1px solid #ccc;">
  <thead bgcolor="#e8e8e8">
  <tr>
    <td colspan="2" style="font-size:16px; text-align:center;">Toronto to Niagara Falls Day Tour <span style="color:#0078de;">Sun 31 Mar</span></td>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td valign="top">
    <h3 style="margin:0 0 10px 0; color:#0078de; font-weight:normal;">CUSTOMER DETAILS</h3>
    
    <div><img src="https://www.toniagara.com//images/email/user.png" alt="user.png"> 3 Reserved</div> 
    <div style="padding:5px 0;"><img src="https://www.toniagara.com//images/email/mail.png" alt="user.png"> <a href="#" style="color:#666; text-decoration:none;">info@info.com</a></div>
    <div><img src="https://www.toniagara.com//images/email/call.png" alt="user.png"> 9890786789</div>

    </td>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody style="line-height:24px;">
        <tr>
          <td>Adults (2 × CA$139.00)</td>
          <td align="right">CA$278.00</td>
        </tr>
        <tr>
          <td>Children (1 × CA$109.00)	 </td>
          <td align="right">CA$109.00</td>
        </tr>
        <tr>
          <td>Seniors (1 × CA$129.00)</td>
          <td align="right">CA$129.00</td>
        </tr>
        <tr>
          <td>Infants (1 × CA$0.00)</td>
          <td align="right">CA$0.00</td>
        </tr>
        <tr>
          <td style="padding-bottom:5px;">Add-Ons </td>
          <td align="right">CA$100.00</td>
        </tr>
        </tbody>
        <tfoot style="color:#333;">
        <tr>
          <td style=" border-top:1px solid #ccc; padding-top:8px;">Sub Total</td>
          <td style=" border-top:1px solid #ccc; padding-top:8px;"  align="right"><sup>CA</sup>$447<sup>48</sup></td>
        </tr>
        </tfoot>
      </table>

    </td>
  </tr>
  <tr style="border-top:1px solid #ccc;">
    <td colspan="2">
      <h3 style="margin:0 0 10px 0; color:#0078de; font-weight:normal;">ADD-ONS PURCHASED</h3>
      <table width="100%" border="0" cellspacing="0" cellpadding="2" style="text-align:right;">
        <tr>
          <td style="padding-right:20px;">Hornblower Cruise Boat Ride</td>
          <td width="25">Qty</td>
          <td width="30">33</td>
        </tr>
        <tr>
          <td style="padding-right:20px;">Hornblower Cruise Boat Ride - Child under 12 yrs old</td>
          <td>Qty</td>
          <td>10</td>
        </tr>
        <tr>
          <td style="padding-right:20px;">Lunch Buffet	 </td>
          <td>Qty</td>
          <td>9</td>
        </tr>
        <tr>
          <td style="padding-right:20px;">Lunch Dinnetr	 </td>
          <td>Qty</td>
          <td>20</td>
        </tr>
      </table>

    </td>
  </tr>
  </tbody>  
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="10" bordercolor="#ccc" style="border-collapse:collapse; border:1px solid #ccc; margin-top:15px; text-align:right;">
          <tr style="color:#333; font-weight:600;">
            <td style="padding:10px 10px 0 10px">Total</td>
            <td style="padding:10px 10px 0 10px"><sup>CA$</sup>500<sup>00</sup></td>
          </tr>
          <tr>
            <td>HST Ontario (13%)</td>
            <td>CA$500.00</td>
          </tr>
          <tr style="background: #2e9a0e;color: #fff;font-size:17px;font-weight: 600;">
            <td>Grand Total</td>
            <td><sup>CA$</sup>500<sup>00</sup></td>
          </tr>
        </table>
		<div style="font-size:13px;text-align:right; padding-top:5px;">Booking ID: 5c3343b4332e751a108b4590</div>
</div>
';

$a=sendMail( array('ashutosh2801@gmail.com', 'ToNiagara'), 'Test', $HTML);
print_r($a);
?>