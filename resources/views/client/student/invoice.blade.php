
@php
  function getIndianCurrency(float $number)
  {
      $decimal = round($number - ($no = floor($number)), 2) * 100;
      $hundred = null;
      $digits_length = strlen($no);
      $i = 0;
      $str = array();
      $words = array(0 => '', 1 => 'One', 2 => 'Two',
          3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
          7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
          10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
          13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
          16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
          19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
          40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
          70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
      $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
      while( $i < $digits_length ) {
          $divider = ($i == 2) ? 10 : 100;
          $number = floor($no % $divider);
          $no = floor($no / $divider);
          $i += $divider == 10 ? 1 : 2;
          if ($number) {
              $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
              $hundred = ($counter == 1 && $str[0]) ? ' ' : null;
              $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
          } else $str[] = null;
      }
      $Rupees = implode('', array_reverse($str));
      $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
      return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
  }





  $payAmount = $PaymentData->amount;
  $Total_GST = $PaymentData->amount - ($PaymentData->amount*100/(100+18));
  $cgst      = $Total_GST/2;
  $sgst      = $Total_GST/2;
  $netAmount = $PaymentData->amount - $Total_GST;

@endphp
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Genus Healthcare Solution</title>
<style>
body {
	margin: 0px;
	padding: 0px;/* 	background-color:#fbf7f4; */
}
.toptext {
	margin: 3px 0;
	font: 11px Arial, Helvetica, sans-serif;
	color: #585858;
	float: right;
}
.toptext a {
	color: #058cc4;
	text-decoration: none;
}
.toptext a:hover {
	color: #058cc4;
}
.wrap {
	margin: 0px;
	font: 13px/19px Arial, Helvetica, sans-serif;
	color: #333;
	/* text-align:justify; */
	
	
	display: block;/* border:1px solid #e7e7e7; */
}
.wrap2 {
	margin: 15px 0px;
	padding: 20px;
	display: block;
	background-color: #fff;
}
</style>
</head>
<body>
<table border="0" align="center" bgcolor="#fff" cellpadding="0" cellspacing="0" style="max-width:690px; border:solid 1px #f1f1f1;  margin:10px auto 10px auto;">
  <tr>
    <td><table width="100%" cellpadding="0" cellspacing="0">
        <tr>
          <td><div class="wrap" style="margin:0px;">
              <div style="float:left; width:29%; text-align: center; padding: 0px; margin: 20px 5px 0px 5px;"> <img src="{{url('/public/client/assets')}}/img/logo.png" alt="Logo" border="0" style="max-width:60%;text-align:center; ">
                <div style="font-size: 11px; color: #000; line-height: 14px; margin-top:10px;"><strong>GH-2022-23/01/TRAINING</strong> 
                  <span style="color: #000"></span> {{date('d/m/Y',strtotime($PaymentData->created_at))}}</div>
              </div>
              <table width="68%" cellpadding="0" cellspacing="0" style="float: right; margin:3px 0px 0px 0px; text-align: center;">
                <tr>
                  <td colspan="2" style="font-size:14px; font-weight:600;"> TAX INVOICE</td>
                </tr>
                <tr>
                  <td colspan="2" style="color:#0060a8; font-size:14px; font-weight:bold">Genus Healthcare Solution and IT Consulting Private Limited</td>
                </tr>
                <tr>
                  <td colspan="2" style="font-size:12px; color:#000;">C-502, Exotica Eastern Crossing Republik, Dhundhera Vijay Nagar Ghaziabad, </td>
                </tr>
                <tr>
                  <td style="font-size:11px; color:#000; line-height:14px;">GSTIN:09AAFCG8235R1ZT <br />
                    State code 09</td>
                  <td style="vertical-align:top; font-weight:bold; font-size:11px; color:#000; line-height:14px;">PAN:AAFCG8235R</td>
                </tr>
                <tr>
                  <td colspan="2">Email: vikas.maheshwari@genushealthcaresolution.com</td>
                </tr>
              </table>
              
              <!-- <a   style="float:right; font-size:12px; padding:2px 7px; margin:5px 0px 0px 0px; text-decoration:none; color:#02c6d3; ">View online</a> -->
              <div style="clear:both"></div>
              <div class="wrap2" style="margin:5px 0px; padding:5px 10px 0px 10px; display:block; background-color:#fff;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" >
                  <tr>
                    <td width="100%" valign="top" colspan="2" style="text-align:center; font-size:12px; color:#000; background-color: #f0f0f0; padding:2px 0px; margin-bottom:50px;"><strong> Details of Receiver (Billed to)</strong></td>
                  </tr>
                  
                </table>
                <div style="clear:both"></div>
                <table cellpadding="0" cellspacing="0" border="0"  style="width: 100%; 
		border-collapse: collapse;	
		  border-top:1px solid #eaeaea;	
		border-left:1px solid #eaeaea;   
		font-size:13px;
		margin-bottom:25px;">
                  <thead>
                    <tr>
                      <th width="8%" align="center" valign="top" style="color:#000; font:bold 12px Arial, Helvetica, sans-serif; text-align:center; padding:15px 0px; border-right: 1px solid #e6e6e6;" >Name:</th>
                      <th colspan="5" align="center" valign="top" style="color:#000; font:bold 12px Arial, Helvetica, sans-serif; text-align:center; padding:15px 0px; border-right: 1px solid #e6e6e6;" >{{$PaymentData->studentname}}</th>
                      <th colspan="2" style="color:#000; font:bold 12px Arial, Helvetica, sans-serif; text-align:center; padding:15px 0px;  border-right: 1px solid #e6e6e6;">Place of Supply: Noida</th>
                    </tr>
                    <tr>
                      <th colspan="3" align="center" valign="top" style="color:#000; border: 1px solid #eaeaea; font:bold 12px Arial, Helvetica, sans-serif; text-align:center; padding:5px 0px; border-right: 1px solid #e6e6e6;" >State: UP State Code : 09</th>
                      <th colspan="5" style=" border-right: 1px solid #e6e6e6; border: 1px solid #eaeaea; background:#f5f5f5; color:#000; font:bold 12px Arial, Helvetica, sans-serif; text-align:center; padding:5px 0px;">Reference</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr  >
                      <td colspan="3" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td colspan="5" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                    </tr>
                    <tr  >
                      <td rowspan="3" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; vertical-align:bottom "><strong>S. No.</strong></td>
                      <td width="18%" rowspan="3" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; vertical-align:bottom"><strong>Description of<br />
Service </strong></td>
                      <td width="14%" rowspan="3"  style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; vertical-align:bottom"><strong>SAC Code</strong></td>
                      <td width="14%" rowspan="3" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center;vertical-align:bottom "><strong>Amount</strong></td>
                      <td colspan="2" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">CGST</td>
                      <td colspan="2" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">SGST</td>
                    </tr>
                    <tr  >
                      <td width="9%" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td width="8%" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td width="6%" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td width="23%" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; "><strong> </strong></td>
                    </tr>
                    <tr  >
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">Rate</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">Amount</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">Rate</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; "><strong>Amount</strong></td>
                    </tr>
                    <tr  >
                      <td align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                    </tr>
                    <tr  >
                      <td align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; ">1</td>
                      <td rowspan="2" align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; color:#000">{{$PaymentData->course_name}}</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">{{$netAmount}}</td>
                      <td align="center" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px;">9%</td>
                      <td align="center" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px;">{{$cgst}}</td>
                      <td align="center" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px;">9%</td>
                      <td align="center" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px;">{{$sgst}}</td>
                    </tr>
                    <tr  >
                      <td align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                    </tr>
                    <tr  >
                      <td align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                    </tr>
                    <tr  >
                      <td align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                    </tr>
                    <tr  >
                      <td align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font:bold 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">Total</td>
                      <td style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td align="center" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px;">{{$netAmount}}</td>
                      <td align="center" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px;">9%</td>
                      <td align="center" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px;">{{$cgst}}</td>
                      <td align="center" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px;">9%</td>
                      <td align="center" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px;">{{$sgst}}</td>
                    </tr>
                    <tr  >
                      <td colspan="4" align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: bold 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; ">Invoice Value (In Words)</td>
                      <td colspan="4" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: bold 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; ">Total</td>
                    </tr>
                    <tr  >
                      <td colspan="4" align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; color:#000">{{getIndianCurrency($payAmount)}} </td>
                      <td colspan="4" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; ">{{$payAmount}}/-</td>
                    </tr>
                    <tr  >
                      <td colspan="3" align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font:bold 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; ">BANK DETAILS</td>
                      <td colspan="5" style="padding: 4px 5px; border: 1px solid #eaeaea;  font:bold 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; ">For Genus Healthcare Solution and IT Consulting Pvt Ltd</td>
                    </tr>
                    <tr  >
                      <td colspan="3" align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">Bank Name: ICICI Bank Limited</td>
                      <td colspan="5" rowspan="5" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: center; "><img src="{{url('/public/client/assets')}}/img/signature.jpg" /></td>
                    </tr>
                    <tr  >
                      <td colspan="3" align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">Account No.002905014409</td>
                    </tr>
                    <tr  >
                      <td colspan="3" align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">IFSC Code:ICIC0000029</td>
                    </tr>
                    <tr  >
                      <td colspan="3" align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">Account Type: Current Account</td>
                    </tr>
                    <tr  >
                      <td colspan="3" align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">Swift Code: ICICINBBCTS</td>
                    </tr>
                    <tr  >
                      <td colspan="3" align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; "><strong>Branch</strong>: W-57.GREATER KAILASH <br />
                      PART-I 110048</td>
                      <td colspan="5" style="padding: 4px 5px; border: 1px solid #eaeaea;  font:bold 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">Name: Vikas Maheshwari</td>
                    </tr>
                    <tr  >
                      <td colspan="3" align="left" valign="top" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: normal 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">&nbsp;</td>
                      <td colspan="5" style="padding: 4px 5px; border: 1px solid #eaeaea;  font: bold 12px Arial, Helvetica, sans-serif; line-height:18px; text-align: left; ">Designation: Authorised Signatory</td>
                    </tr>
                  </tbody>
                  <tbody>
                  </tbody>
                </table>
                <div style="clear:both;"> </div>
                <div style="clear:both;"></div>
              </div>
            </div></td>
        </tr>
      </table></td>
  </tr>
</table>
</body>
</html>
