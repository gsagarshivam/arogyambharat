<?php 
//session_start();
require_once("../dbcn.php");
//require_once('inc/req_authentication.php');

//print_r($_GET);
$id = mysqli_real_escape_string($con,$_GET['invoiceId']);
$tocken = mysqli_real_escape_string($con,$_GET['tocken']);
$invoice = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `client_invoices` WHERE `id` = '".$id."' AND invoice_token = '".$tocken."'"));
if(empty($invoice['id'])){
    exit();
}
require_once("../inc/money_converter.php");
$currency_object=new Currency();

$invoiceDet = mysqli_query($con, "SELECT * FROM `customer_product_detail` WHERE `invoice_id` = '".$invoice['id']."' ");
if(($invoice['order_by']!='admin'))
{
    if($invoice['entry_type']=='agent')
    {
    $mem_id=mysqli_fetch_array(mysqli_query($con,"select * from client_personal_profile where client_id='".$invoice['client_id']."'"));
    $text = "Distributer";
    $ccode =     $invoice['client_id'];
    }
    else if($invoice['entry_type']=='customer') 
    {
    $mem_id=mysqli_fetch_array(mysqli_query($con,"select * from customer_detail where client_id='".$invoice['cust_code']."'"));
    $text = "Customer";
    $ccode =     $invoice['cust_code'];
    }
    if($invoice['order_by']=='franchise')
    {
    $fr_det=mysqli_fetch_array(mysqli_query($con,"select * from master_franchise where id='".$invoice['user_id']."'")); 
    }
}
else
{
$mem_id=mysqli_fetch_array(mysqli_query($con,"select * from master_franchise where fr_code='".$invoice['client_id']."'"));  
}
if($invoice['invoice_type']=='transfer')
{
  $invoiceName = "Transfer";
  $ptype = "DP/Unit";  
} 
else{
  $invoiceName = "Tax"; 
  $ptype = "Price";   
}       
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html" />
<meta name="author" content="lolkittens" />
<title>Invoice | <?=COMPANY;?></title>
<link rel="stylesheet" href="../css/AdminLTE.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
body{
font-family: 'Cabin VF Beta', sans-serif; 
}
.main_area{
width: 100%;
min-height: 900px;
margin: auto;
padding: 0px;
font-size: 12px;
}
.inner{
width: 850px;
min-height: 800px;
margin: auto;
padding: 0px;
border: 1px solid black;
}
.center{
width: 100%;

margin: auto;
text-align: center;
font-size: 12px;


}
.left{
width: 43%;
height: 80px;
float: left;
clear: right;
}
.right{
width: 50%;
height: 80px;
margin-left: 20px;
float: left;
clear: right;
}
.text1{
font-size: 12px;
font-weight: bold;
text-align: right;
padding-left: 10px;
}
.text2{
font-size: 12px;
text-align: right;
}
.left1{
width: 45%;
height: 175px;
float: left;
clear: right;
}
.right1{
width: 45%;
height: 175px;
margin-left: 20px;
float: left;
clear: right;
}
.th{
font-size: 12px;
font-weight: bold;
text-align: left;
width: 25%;
}
.td{
font-size: 12px;
text-align: left;
width: 25%;
}
</style>
</head>
<body onload="window.print()">
<div class="main_area" > 
  <div class="inner">
         <div class="center"><strong><ins>Retail Invoice</ins></strong></div>   
         <div class="left"><img src="../upload/logo/logo.png" class="img-responsive" /><br /></div>
         <div class="right">
            <span style="text1"><strong><?=COMPANY;?></strong></span><br />
            <span style="text1"><?=ADDRESS;?></span>
            <span style="text1"><strong>Phone</strong>: <?=CONTACT;?></span>
            <span style="text1"><strong>Email</strong>: <?=EMAIL;?></span>
            <strong>GSTN</strong>: <?=GSTN;?>

         </div>
         <div style="clear: both;"></div><hr />
         <table style="width: 99%;" cellspacing="10" cellpadding="0">
            <tr>
                <td style="width: 33%;text-align: left;vertical-align: top;padding-left: 1%;">
                <span style="text1"><strong>Bill To:</strong></span><br />
                    
                    <?=strtoupper($mem_id['m_name']);?><br/>
                    Address</strong>: <?=ucwords($mem_id['m_address']);?><br/>
                    <?=strtoupper($mem_id['m_city']);?>, <?=strtoupper($mem_id['m_state']);?>, <?=$mem_id['m_pin'];?><br/>
                    Phone</strong>: <?=$mem_id['m_mobile'];?><br/>
                    Email</strong>: <?=strtoupper($mem_id['m_email']);?>
                    
                </td>
                <?php
                if(($invoice['order_by']=='franchise'))
                {
                ?>
                <td style="width: 33%;text-align: left;vertical-align: top;">
                <span style="text1"><strong>Stock Point:</strong></span><br />
                
                    <?=strtoupper($fr_det['fr_code']);?><br/>
                    Address</strong>: <?=ucwords($fr_det['m_address']);?><br/>
                    <?=strtoupper($fr_det['m_city']);?>, <?=strtoupper($fr_det['m_state']);?><br/>
                    Phone</strong>: <?=$fr_det['m_mobile'];?><br/>
                    Email</strong>: <?=strtoupper($fr_det['m_email']);?>
                    
                </td>
                <?php } ?>
                <td style="width: 33%;text-align: right;vertical-align: top;padding-left: 20px;">
                <table>
                    <tr>
                        <td><strong>Invoice For</strong> :</td>
                        <td><?=strtoupper($invoice['entry_type']);?></td>
                    </tr>
                    <tr>
                        <td><strong><?php echo $text?> ID</strong> :</td>
                        <td><?=strtoupper($ccode);?></td>
                    </tr>
                    <tr>
                        <td><strong>Invoice No.</strong> :</td>
                        <td><?=$invoice['invoice_no'];?></td>
                    </tr>
                    <tr>
                        <td><strong>Invoice Date</strong> :</td>
                        <td><?php if($invoice['approve_date']!="0000-00-00"){ echo date('d-m-Y',strtotime($invoice['approve_date']));}else{echo "00-00-0000";}?></td>
                    </tr>
                    <tr>
                        <td><strong>Payment Mode</strong> :</td>
                        <td><?=strtoupper($invoice['payment_method']);?></td>
                    </tr>
                    <tr>
                        <td><strong>Shipping Method</strong> :</td>
                        <td>By Hand</td>
                    </tr>
                    <tr>
                        <td><strong>Delivery Mode</strong> :</td>
                        <td>Selected Stockist</td>
                    </tr>
                </table>
                </td>
            </tr>
            </table><br />
            <table style="width: 98%;margin: auto;font-size: 11px;"  class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Product Name / HSN CODE</th>
                    <th>Unit Price</th>
                    <th>DP/CP</th>
                    <th>BV</th>
                    <th>QTY</th>
                    <th>GST Rate (%)</th>
                    <th>Tax</td>
                    <th>QTY * BV</th>
                    <th>Amount</th>
                </tr>
                <?php
              $i = 1;
              $total = 0;
              $totalbv = 0;
              $uprice=0;
              while($invoice_record = mysqli_fetch_array($invoiceDet))
              {
                $pcakage = mysqli_fetch_array(mysqli_query($con,"SELECT category FROM `master_product_category` WHERE cat_id= '".$invoice_record['category_id']."'"));
                $catName = $pcakage['category'];
                $subtotal = ($invoice_record["final_amt"]*$invoice_record["product_qty"]);
                $total = ($total + $subtotal);
                $totalbv = ($totalbv + $invoice_record['bv']);

                $discount = 0;
                if(!empty($invoice_record['discount'])&&$invoice_record['discount']!=0)
                {
                  $discount =  ($invoice_record["final_amt"] * ($invoice_record['discount']) / 100);
                }
                
                $gst = 0;
                $taxableValue = 0;
                if(!empty($invoice_record['product_gst'])&&$invoice_record['product_gst']!=0)
                {
                  $gstAmt = ($invoice_record['product_gst'] + 100);
                  $taxableValue   = (($invoice_record["final_amt"] * 100) / $gstAmt);
                  $gst  = ($invoice_record['final_amt']-$taxableValue);
                }
                $products = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `master_product` WHERE prod_id= '".$invoice_record['product_id']."'"));
                ////////////////////
                $uprice = ($uprice + ($products['amt']*$invoice_record['product_qty']));
                //echo $uprice."--".$products['amt']."--".$invoice_record['product_qty']."<br/>";
              ?>
                <tr>
                  <td><?=$i++;?></td>
                  <td><?=$catName?></td>
                  <td><?=$invoice_record['product_name']?> / <?=$invoice_record['product_code'];?></td>
                  <td><?=$products['amt'];?></td>
                  <td><?=$products['dp'];?></td>
                  <td><?=$products['bv'];?></td>
                  <td><?=$invoice_record['product_qty'];?></td>
                  <td><?php echo $invoice_record['product_gst']?> </td>
                  <td><?=number_format((float)($gst), 2, '.', '');?></td>
                  
                  <td><?=$invoice_record['bv'];?></td>
                  
                  <td><?=$invoice_record["final_amt"];?></td>
                </tr>
                <?php
                }
                
                ?>
                <tr>
                <td colspan="12" style="text-align: left;"><strong>Total BV: <?=$totalbv;?></strong></td>
                </tr>
            </table>
            <h5 style="margin-left: 2%;"><strong>TAX RECEIPT SUMMARY</strong></h5>
            <div style="width: 45%;height: 150px;float: left;clear: right;margin-left: 2%;border: 1px solid black;margin-right: 3%;">
                <table style="width: 98%;margin: auto;font-size: 12px;"  class="table table-striped">
                <tr>
                    <th>GST</th>
                    <th>PRICE</th>
                    <th>CGST</th>
                    <th>SGST</th>
                    <th>IGST</th>
                    <th>TAXABLE AMT.</th>
                </tr>
                <?php
                $invoiceSecond = mysqli_query($con, "SELECT product_gst,SUM(`final_amt`) AS final_amt FROM `customer_product_detail` WHERE `invoice_id` = '".$id."'  GROUP BY invoice_id,product_gst ORDER BY id ASC");
                while($invoice_record_sec = mysqli_fetch_array($invoiceSecond))
                {
                   if(!empty($invoice_record_sec['product_gst'])&&$invoice_record_sec['product_gst']!=0)
                    {
                        $gstAmtSec = ($invoice_record_sec['product_gst'] + 100);
                        $taxableValueSec   = (($invoice_record_sec["final_amt"] * 100) / $gstAmtSec);
                        $gstSec  = ($invoice_record_sec['final_amt']-$taxableValueSec);
                    } 
                    $cgst = $gstSec/2;
                    $igst='';
                    if(($mem_id['m_state']!='Uttar Pradesh'))
                    {
                        $igst = round($gstSec,2);
                        $show=1;
                        $cgst = 0;
                       
                    }
                    else
                    {
                        $show=0;
                        $igst=0;
                        $cgst = round($cgst,2);
                    }
                ?>
                <tr>
                    <td><?php echo round($invoice_record_sec['product_gst'],0)?>%</td>
                    <td><?php echo round($taxableValueSec,2)?></td>
                    <td><?php echo $cgst?></td>
                    <td><?php echo $cgst?></td>
                    <td><?php echo $igst?></td>
                    <td><?php echo $invoice_record_sec["final_amt"]?></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="7" style="text-align: left;"><strong>Amount in words: </strong><?php echo $currency_object->get_bd_amount_in_text($invoice['total_amt']+$invoice['shipping_charges']);?></td>
                </tr>
               </table> 
            </div>
            <div style="float: left;clear: right;width: 25%;height: 150px;"></div>
            <div style="width: 25%;height: 150px;float: left;clear: right;text-align: right;">
                <table style="text-align: right;">
                    <tr>
                        <td><strong>Tax Incl. Amount (Rs.)</strong> :</td>
                        <td><?=$uprice;?></td>
                    </tr>
                    <tr>
                        <td><strong>Discount (Rs.)</strong> :</td>
                        <td><?=$uprice - $invoice['total_amt'];?></td>
                    </tr>
                    <tr>
                        <td><strong>Tax Incl. Subtotal (Rs.)</strong> :</td>
                        <td><?php echo $invoice['total_amt']?></td>
                    </tr>
                    <tr>
                        <td><strong>Delivery Charges (Rs.)</strong> :</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td><strong>Tax Incl. Total (Rs.)</strong> :</td>
                        <td><?php echo $invoice['total_amt']?></td>
                    </tr>
                   
                </table>
            </div>
            <div style="clear: both;"></div><br />
            <div class="center">THANK YOU FOR YOUR ORDER. WE APPRECIATE YOUR BUSINESS.</div><hr />
            <h5 style="margin-left: 2%;"><strong>Terms & Conditions</strong></h5>
            <ul>
                <li>Any objection regarding the invoice will no entertained after 7 days of the of this invoice.</li>
                <li>Payment must be made by A/c Payee cheque / Deemand Draft, payable in Delhi in our favour.</li>
                <li>We declare that this invoice shows the actual price of the goods Described and that all particular are true and correct.</li>
                <li>All disputes arising out of the above will be settled in Varanasi Court Only.</li>
            </ul>
    </div>
</div>
</body>
</html>



</body>
</html>