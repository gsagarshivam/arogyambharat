<?php
session_start();
require_once("inc/dbcn.php");
require_once("inc/iFunctions.php");
require_once("inc/req_authentication.php");
require_once("inc/formvalidator.php");

///////////////////////////////////////////////////////
$datefrom=isset($_GET['datefrom'])?$_GET['datefrom']:'';
$dateto=isset($_GET['dateto'])?$_GET['dateto']:'';
$cust_code=isset($_GET['cust_code'])?iClean($conn,$_GET['cust_code']):'';
$client_id=isset($_GET['client_id'])?iClean($conn,$_GET['client_id']):'';
$invoice_no=isset($_GET['invoice_no'])?iClean($conn,$_GET['invoice_no']):'';
$status=isset($_GET['status'])?iClean($conn,$_GET['status']):'';
$entry_type=isset($_GET['entry_type'])?iClean($conn,$_GET['entry_type']):'';
$get = $_GET;
foreach($get as $key=>$value) { //assuming you cleaned & validated the $_POST into $post
if($value!='')
  switch($key)
  {
     case 'invoice_no':
     case 'cust_code':
     case 'client_id':
     case 'status':
     case 'entry_type':
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
$per_page = 50; //rows per page
$full_sql = "SELECT * FROM client_invoices WHERE user_type='mlm' AND invoice_no!=''  $q ORDER BY id DESC";
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
    <form name="frm1" method="GET">
    <input type="hidden" name="ids" value="<?php echo $_GET['ids'];?>"/>
    <input type="hidden" name="offer_direct" value="<?php echo $_GET['offer_direct'];?>"/>
    <table>
    <tr>
    <td>
    <select name="entry_type" class="form-control" style="width: 190px;">
    <option value="">Invoice Type</option>
    <option value="agent" <?php if($entry_type=="agent"){echo "selected";}?>>Agent</option>
    <option value="customer" <?php if($entry_type=="customer"){echo "selected";}?>>Customer</option>
    </select>
    </td>
    <td>
    <input type="text" name="invoice_no" value="<?php echo $invoice_no;?>"   placeholder="Invoice No" class="form-control" style="width: 190px;"/>
    </td>
    
    <td>
    <input type="text" name="cust_code" value="<?php echo $cust_code;?>"  placeholder="Customer ID" class="form-control" style="width: 190px;"/> 
    </td>
    <td>
    <input type="text" name="client_id" value="<?php echo $client_id;?>"  placeholder="Agent ID" class="form-control" style="width: 190px;"/> 
    </td>
    
    <td>
    <select name="status" class="form-control" style="width: 110px;">
    <option value="">Status</option>
    <option value="Pending" <?php if($status=="Pending"){echo "selected";}?>>Pending</option>
    <option value="Approved" <?php if($status=="Approved"){echo "selected";}?>>Approved</option>
    </select>
    </td>
    <td>
    <input type="date" name="datefrom" class="form-control" value="<?php echo $datefrom;?>"  id="paid_on" value="" style="width: 110px;" />    
    </td>
    <td>
    <input type="date" name="dateto" class="form-control" value="<?php echo $dateto;?>"  id="paid_on1" value="" style="width: 110px;" /> 
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
            <th>Bill For</th>
            <th>Order No.</th>
            <th>Order Date</th>
            <th>Cust Code</th>
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
    		while($rs1=mysqli_fetch_array($rsd))
    		{
            $client_id=$rs1['client_id'];
            if($rs1['entry_type']=='agent')
            {
            $profile=mysqli_fetch_array(mysqli_query($conn,"select * from client_personal_profile  where client_id='".$client_id."' "));
            }
            else
            {
            $profile=mysqli_fetch_array(mysqli_query($conn,"select * from customer_detail where client_id='".$rs1['cust_code']."'"));
            
            }
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
            <td style="text-transform: uppercase;"><?php echo $profile['m_name']?></td>
    		<td><?php echo $profile['m_mobile']?></td>
            <td><?php echo $profile['m_address']?></td>
            <td><?php echo $rs1['payment_method'];?></td>
            
            <td><?php echo $rs1['total_amt'];?></td>
            <td><?php echo $rs1['total_bv'];?></td> 
             <td><?php echo $rs1['status'];?></td>
    		<td>
            <a class="btn btn-info btn-sm" href="../franchise/retail_invoice.php?invoiceId=<?php echo $rs1['id'];?>&tocken=<?php echo $rs1['invoice_token'];?>" target="_blank"><i class="mdi mdi-cloud-print h5"></i></a> &nbsp;

            </td>
            </tr>
    		<?php 
			$i++;
			 
            }
            ?>
            <tr>
                <td colspan="9" class="text-right"><strong>Total</strong></td>
                <td ><strong><?php echo $totalAmt;?></strong></td>
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