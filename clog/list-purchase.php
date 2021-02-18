<?php
session_start();
require_once("inc/dbcn.php");
require('inc/iFunctions.php');
require('inc/req_authentication.php');


$datefrom=isset($_GET['datefrom'])?$_GET['datefrom']:'';
$status=isset($_GET['status'])?$_GET['status']:'';
$dateto=isset($_GET['dateto'])?$_GET['dateto']:'';
$external_category1=isset($_GET['category_id'])?$_GET['category_id']:'';
$get = $_GET;
foreach($get as $key=>$value) { //assuming you cleaned & validated the $_POST into $post
if($value!='')
  switch($key)
  {
     
     case 'search_text':
     $serachText = iClean($conn,$value);
     $wheres[]="invoice_no LIKE '%{$serachText}%'";
     break;
     case 'status':
     $serachText = iClean($conn,$value);
     $wheres[]="$key = '".$value."'";
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
$per_page = 100; //rows per page
//echo $q;

$full_sql = "SELECT * FROM `client_invoices` WHERE client_id = '".$client_id."' $q ORDER BY id DESC";    

$num = mysqli_num_rows(mysqli_query($conn,$full_sql));
$display_links = 11; //number of links to be displayed - odd number
//echo $full_sql;
if(isset($_REQUEST['page']))
$page = iClean($conn,$_REQUEST['page']);
//create object, pass the values
$cat_link = $_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING'];
//echo $cat_link;
$pageObj = new pagination($full_sql, $per_page, $page, $cat_link,$conn);
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
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>List Invoices : <?php echo COMPANY;?></title>
    <?php include("inc/common_head.php");?>
</head>
<body class="theme-red">
    <?php include("inc/header.php");?>
    <section>
    <?php include("inc/left.php");?>
    <?php include("inc/right.php");?>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                List Invoices
                            </h2>
                        </div>
                        <div class="body">
                            <form name="frm" method="GET">        
                            <input type="text" name="search_text" value=""   placeholder="Invoice no" style="width: 350px;"/>
                            
                            <select name="status" >
                            <option value="">Status</option>
                            <option value="Pending" <?php if($status=="Pending"){$selected='selected';}else{$selected="";}?>>Pending</option>
                            <option value="Approved" <?php if($status=="Approved"){$selected='selected';}else{$selected="";}?>>Delivered</option>
                            </select>
                            <?php echo $external_category;?>
                            From: <input type="date" name="datefrom"  value="<?php echo $datefrom;?>" style="width: 120px;" />    
                            
                            To: <input type="date" name="dateto"  value="<?php echo $dateto;?>" style="width: 120px;" /> 
                            <input type="submit" name="validate" value="SEARCH" class="btn btn-primary"/>
                            
                            </form>
                            <br />   
                            
                            <table class="header table table-bordered table-striped">
                            <thead class="table table-striped table-bordered">
                            <tr>
                            <th>Sr.No</th>
                            <th>Invoice Type</th>
                            <?php if($acc_profile['role']=='1'){?>     
                            <th>Customer ID</th>
                            <?php }?>
                            <th>Invoice No</th>
                               
                            <th>Invoice Date</th>
                            <th>Amount</th>
                            <th>Print</th> 
                            <th>Upload Slip</th>
                            <?php
                            if($acc_profile['role']=='1')
                            {
                            ?>     
                            <th>Action</th>
                            <?php
                            }
                            ?>
                            </tr>
                            </thead>
                            <tbody>	
                            <?php
                            $sr=1;
                            while($rs1=mysqli_fetch_array($rsd))
                            {
                            
                            ?>
                            <tr>
                            <td><?php echo $sr;?></td>
                            <td><?php echo $rs1['entry_type']?></td>
                            <td><?php echo $rs1['invoice_no']?></td>
                            
                            <td><?php echo date('d-m-Y',strtotime($rs1['invoice_date']))?></td>
                            <td><?php echo $rs1['total_amt'];?></td>
                            <td>
                            <a href="../franchise/retail_invoice.php?invoiceId=<?php echo $rs1['id'];?>&tocken=<?php echo $rs1['invoice_token'];?>" target="_blank"><i class="material-icons">print</i></a>
                            </td>
                            <td>
                            <?php
                            if($rs1['status']=='Pending')
                            {
                            ?>
                            <a href="activation_request.php?invoiceId=<?=$rs1['id'];?>&tocken=<?=$rs1['invoice_token'];?>" class='btn btn-xs btn-danger'>Upload</a></td>
                            <?php } ?>
                            <td>
                            
                            <?php
                            if($rs1['status']=='Pending')
                            {
                            ?>
                            <input type='submit' class='btn btn-xs btn-info' name="status" value="Pending" />         
                            <?php
                            }
                            elseif($rs1['status']=='Approved')
                            {
                            ?> 
                            <button class='btn btn-xs btn-success'> Delivered</button>
                            <?php
                            } 
                            ?> 
                            
                            </td>
                            </tr>
                            <?php 
                            $sr++;
                            } 
                            ?>
                            <tr>
                            <td colspan="11" style="color: red;"><br /><br /><center><?php echo $page_links; ?></center></td>
                            </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("inc/footerjs.php");?>
</body>
</html>
