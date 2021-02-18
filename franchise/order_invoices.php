<?php
session_start();
require_once("inc/dbcn.php");
require_once("inc/iFunctions.php");
require_once("inc/req_authentication.php");
require_once("inc/formvalidator.php");

if((isset($_POST['delete'])))
{
    $id=iClean($conn,$_POST['delete']);
    $rsd_product=mysqli_query($conn,"SELECT * FROM `customer_product_detail` WHERE invoice_id='".$id."'");
    while($rs_product = mysqli_fetch_array($rsd_product))
    {
        $fr_invoice=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `master_franchise_product_qty` WHERE prod_id='".$rs_product['product_id']."' AND franchise_id= '".$admin_det['id']."' AND added_from='order' ORDER BY id DESC LIMIT 1"));
        $cur = ($fr_invoice['previous_qty'] + $rs_product['product_qty']);
        //echo $fr_invoice['previous_qty']."--".$rs_product['product_qty']."--".$fr_invoice['current_qty']."--".$cur."<br/>"; 
        
        $sql2="update `master_franchise_product_qty` set current_qty = (current_qty + '".$rs_product['product_qty']."') where id ='".$fr_invoice['id']."'"; 
        mysqli_query($conn,$sql2)or die(mysqli_error($conn));
    }
    mysqli_query($conn,"DELETE FROM `customer_free_product_detail` WHERE `invoice_id` = '".$id."'") or die(mysqli_error($conn));
    mysqli_query($conn,"DELETE FROM `customer_product_detail` WHERE `invoice_id` = '".$id."'") or die(mysqli_error($conn));
    mysqli_query($conn,"DELETE FROM `client_invoices` WHERE `id` = '".$id."'") or die(mysqli_error($conn));
    mysqli_query($conn,"DELETE FROM `income_shopping` WHERE `invoice_id` = '".$id."'") or die(mysqli_error($conn));
    $msg = "Invoce Deleted and product return in your stock";
}
if((isset($_POST['cstatus'])))
{
    $id=iClean($conn,$_POST['cstatus']);
    $rs_del2=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `client_invoices` WHERE id='".$id."'"))or die(mysqli_error($conn));
    $rs_del5=mysqli_fetch_array(mysqli_query($conn,"SELECT activation_status,id,client_id FROM `client_account_profile` WHERE client_id='".$rs_del2['client_id']."'"))or die(mysqli_error($conn));

    if($rs_del2['status']=='Pending')
    {   
    $val='Approved'; 
    //Order Approved
    include('../clog/inc/sms_setting.php');
    $smsOrder = "Order Update: Your Order of total ".$rs_del2['total_qty']." products worth Rs. ".($rs_del2['total_amt']+$rs_del2["shipping_charges"])." has been delivered today.";
    sendsmsPOST($rs_del2['telephone'],$senderId,$route,$smsOrder,$serverUrl,$authKey);
    if($rs_del5['activation_status']==0)
    {
        $actType = "activation";
    }
    else
    {
        $actType = "repurchase";
    }
    $sql3="UPDATE `client_invoices` SET
    status='".$val."',
    approve_date='".date('Y-m-d')."',
    invoice_type='".$actType."'
    where id='".$id."'"; 
    mysqli_query($conn,$sql3)or die(mysqli_error($conn));
    
    $totInvoice = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(`total_bv`) AS total_bv FROM `client_invoices` WHERE client_id='".$rs_del2['client_id']."' AND status='Approved' AND user_type='mlm'"))or die(mysqli_error($conn));
    
        
        
    if(($rs_del5['activation_status']==0) && ($totInvoice['total_bv']>=500) )
    {
    $sql2="update `client_account_profile` set activation_status='1',activation_date = '".date('Y-m-d')."',activation_time = '".time()."' where client_id='".$rs_del2['client_id']."'"; 
    mysqli_query($conn,$sql2)or die(mysqli_error($conn));
    
    }


    /////////////////////////////////////////
    
    
    $BVPER = 10;
    $TDS = 0;
    $ADMIN = 0;
    $entry_date = date('Y-m-d');
    $iType = "Direct Sales Income";
    $trans_msg = "Direct Sales Income distribution ";
    $Income = (($rs_del2['total_bv'] * $BVPER)/100);
    $tds_charge = $TDS/100 * $Income;
    $admin_charge = $ADMIN/100 * $Income;
    $total_amount_final = $Income - $tds_charge - $admin_charge;
    

   if(mysqli_num_rows(mysqli_query($conn, "SELECT id FROM `income_shopping` WHERE `user_id`= '".$rs_del5['id']."' AND invoice_id = '".$id."' AND  `income_type` = '".$iType."'"))==0)
   {
   //echo ++$i."--------".$agdet['client_id']."----Total BV----".$bv['total_bv']."-----Total Income-".$Income."<br/>";
    mysqli_query($conn, "INSERT INTO `income_shopping` (`income_type`,`invoice_id`,`client_id`, `user_id`, `total_amt`,`total_bv`,`bv_percentage`, `tds_charges`,`total_commission`,`payable_income`,`entry_date`,`admin_charges`,`closing_month`,`payout_date`) VALUES 
    ('".$iType."','".$id."','".$rs_del5['client_id']."','".$rs_del5['id']."', '".$rs_del2['total_amt']."','".$rs_del2['total_bv']."','".$BVPER."','".$tds_charge."','".$Income."','".$total_amount_final."', '".date('Y-m-d')."', '".$admin_charge."', '".date('m')."','".date('Y-m-d')."')")or die(mysqli_error($conn));
   
    } 
    }
}
///////////////////////////////////////////////////////
$datefrom=isset($_GET['datefrom'])?$_GET['datefrom']:'';
$dateto=isset($_GET['dateto'])?$_GET['dateto']:'';
$client_id=isset($_GET['client_id'])?iClean($conn,$_GET['client_id']):'';
$invoice_no=isset($_GET['invoice_no'])?iClean($conn,$_GET['invoice_no']):'';
$entry_type=isset($_GET['entry_type'])?iClean($conn,$_GET['entry_type']):'';
$status=isset($_GET['status'])?iClean($conn,$_GET['status']):'';
$per_page=isset($_GET['per_page_selected'])?$_GET['per_page_selected']:'20';
$get = $_GET;
foreach($get as $key=>$value) { //assuming you cleaned & validated the $_POST into $post
if($value!='')
  switch($key)
  {
     case 'entry_type':
     case 'invoice_no':
     case 'client_id':
     case 'status':
     $wheres[]="$key = '{$value}'";
     break;
     case 'datefrom':
     $key = 'invoice_date';
     $wheres[]="$key >= '".date('Y-m-d', strtotime($value))."'";
     break;
     case 'dateto':
     $key = 'invoice_date';
     $wheres[]="$key <= '".date('Y-m-d', strtotime($value))."'";
     break;
  }
}
if(empty($wheres)){$q = "";}
else{
$q=' AND ' . implode(' AND ', $wheres);
}

###############  Start Paging Code ##########################
require_once("inc/class.pagination.php");
$page = 1; //default page
//$per_page = 50; //rows per page
$full_sql = "SELECT * FROM client_invoices WHERE order_by='franchise' AND user_type ='mlm' AND user_id = '".$admin_det['id']."' $q ORDER BY id DESC";
$num = mysqli_num_rows(mysqli_query($conn,$full_sql));    
$display_links = 11; //number of links to be displayed - odd number
//echo $full_sql;
if(isset($_REQUEST['page']))
$page = iClean($conn,$_REQUEST['page']);
//create object, pass the values
$cat_link = $_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING'];
//echo $cat_link;
$pageObj = new pagination($full_sql,$per_page,$page,$cat_link,$conn);
//sql after getting split in to pages
$sql = $pageObj->get_query();
$rsd = mysqli_query($conn,$sql);
//starting serial number
$sl_start = $pageObj->offset;
//get the links and store it in a variable
$page_links = $pageObj->get_links($display_links);
###############  End Paging Code ############################
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>List Orders : <?php echo COMPANY?></title>
<?php include("inc/common_head.php");?>
</head>
<body>
<div class="header-bg">
<?php include("inc/header.php");?>

</div>
 </div>
 <div class="wrapper">
 <div class="container-fluid">
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">
 <h4 class="mt-0 header-title">List Orders</h4>
  <?php if(isset($msg)){echo "<div class=\"alert alert-success bg-success text-white mb-0\">".$msg."</div>";}?>
    <form name="frm1" method="GET">
    <table>
    <tr>
    <td>
    <input type="text" name="invoice_no" value="<?php echo $invoice_no;?>"   placeholder="Invoice No" class="form-control" style="width: 190px;"/>
    </td>
    <td>
    <input type="text" name="client_id" value="<?php //echo $client_id;?>"  placeholder="Customer Name" class="form-control" style="width: 190px;"/> 
    </td>
    <td>
    <select name="status" class="form-control" style="width: 110px;">
    <option value="">Status</option>
    <option value="Pending" <?php if($status=="Pending"){echo "selected";}?>>Pending</option>
    <option value="Approved" <?php if($status=="Approved"){echo "selected";}?>>Approved</option>
    </select>
    </td>
    <td>
    <select name="entry_type" class="form-control" style="width: 110px;">
    <option value="">Invoice For</option>
    <option value="agent" <?php if($entry_type=="agent"){echo "selected";}?>>Agent</option>
    <option value="customer" <?php if($entry_type=="customer"){echo "selected";}?>>Customer</option>
    </select>
    </td>
    <td>
    <select name="per_page_selected" onchange="this.form.submit()" class="form-control" style="width: 90px;">
    <option value="20"  <?php if($per_page==20){echo "selected";}else{echo "";}?>>20</option>
    <option value="100"  <?php if($per_page==100){echo "selected";}else{echo "";}?>>100</option>
    <option value="500"  <?php if($per_page==500){echo "selected";}else{echo "";}?>>500</option>
    <option value="1000"  <?php if($per_page==1000){echo "selected";}else{echo "";}?>>1000</option>
    <option value="10000"  <?php if($per_page==10000){echo "selected";}else{echo "";}?>>All</option>
    </select>
    </td>
    <td>
    <input type="date" name="datefrom" class="form-control"  id="paid_on" value="" style="width: 190px;" />    
    </td>
    <td>
    <input type="date" name="dateto" class="form-control"  id="paid_on1" value="" style="width: 190px;" /> 
    </td>
    <td>
    <input type="submit" name="validate" value="SEARCH" class="btn btn-primary"/>
    </td>
    </tr>
    </table>
    <br />
    Total User : <?php echo $num;?>
    </form>
    <button class="btn btn-success">Export</button><br />
    <form method="POST" class="form-horizontal">   
    <div class="form-group row">
    <div class="col-sm-12">
        <div class="table-responsive">
    	<table class="table table-striped table-bordered"  id="table2excel" style="text-transform: uppercase;">
            <thead>
            <tr>
            <th width="20">Sr.No</th>
            <th>Invoice Type</th>
            <th>Order No.</th>
            <th>Order Date</th>
            <th>Cust.Code</th>
            <th>Agent ID</th>
            <th>Agent Name</th>
            <th>Agent Mobile</th>
            <th>Address</th>
            <th>Txn Mode</th>
            <th>Txn Amt.</th>
            <th>Txn BV</th>
            <th>Txn Status</th>
            <th style="width: 120px;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            $totalAmt=0;
            $totalBv=0;
    		while($rs1=mysqli_fetch_array($rsd))
    		{
            $client_id=$rs1['client_id'];
            $profile=mysqli_fetch_array(mysqli_query($conn,"select * from client_personal_profile  where client_id='".$client_id."' "));
            if($rs1['status']=='Approved')
            {
                $class = "btn btn-success btn-sm";
                $icon = "<i class=\"mdi mdi-account-check h5\"></i>";
                $background = "";
            } 
            else
            {
                $class = "btn btn-warning btn-sm";
                $icon = "<i class=\"mdi mdi-account-off h5\"></i>";
                $background="color: red;";
            }
            $totalAmt = $totalAmt+$rs1['total_amt'];
            $totalBv = $totalBv+$rs1['total_bv'];
            ?>
            <tr style="<?php echo $background?>">
            <td><?php echo $i;?>&nbsp;&nbsp;</td>
            <td><?php echo $rs1['entry_type'];?></td>
            <td><?php echo $rs1['invoice_no'];?></td>
            <td><?php echo date('d-m-Y', strtotime($rs1['invoice_date']));?></td>
            <td><?php echo $rs1['cust_code']?></td>
            <td><?php echo $rs1['client_id']?></td>
            <td style="text-transform: uppercase;"><?php echo $rs1['firstname']?></td>
    		<td><?php echo $rs1['telephone']?></td>
            <td><?php echo $rs1['address']?></td>
            <td><?php echo $rs1['payment_method'];?></td>
            <td><?php echo $rs1['total_amt'];?></td>
            <td><?php echo $rs1['total_bv'];?></td>
            <td><?php echo $rs1['status'];?></td>
    		<td>
            <?php
             if($rs1['status']=='Pending')
            {
            ?>
            <button type="submit" name="cstatus" value="<?php echo $rs1['id']?>" class="<?php echo $class?>" onclick="return confirm('Are you sure you want to change status?')"><?php echo $icon?></button> &nbsp; 
            <button type="submit" name="delete" value="<?php echo $rs1['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure invoce delete to record forever?')"><i class="mdi mdi-delete-forever h5"></i></button> &nbsp; 

            <?php
            }
            ?>
            <a class="btn btn-info btn-sm" href="retail_invoice.php?invoiceId=<?php echo $rs1['id'];?>&tocken=<?php echo $rs1['invoice_token'];?>" target="_blank"><i class="mdi mdi-cloud-print h5"></i></a> &nbsp;

            </td>
            </tr>
    		<?php 
			$i++;
			 
            }
            ?>
            <tr>
                <td colspan="8" class="text-right"><strong>Total</strong></td>
                <td ><strong><?php echo $totalAmt ;?></strong></td>
                <td ><strong><?php echo $totalBv;?></strong></td>
                <td colspan="2"></td>
            </tr>
           </tbody>
            </table>
            </div>
    </div>
    </div>
    </form>
    <div class="form-group row">
    <div class="col-sm-12 pull-right">
        <?php echo $page_links; ?>     
    </div>
     </div>
    

</div>
</div>
</div><!-- end col -->
</div><!-- end row -->
</div><!-- end container -->
</div>
                          
<?php include("inc/footer.php");?>
<?php //include("inc/footerjs.php");?>
</body>
</html>