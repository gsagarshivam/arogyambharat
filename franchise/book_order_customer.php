<?php
session_start();
require_once("inc/dbcn.php");
require_once("inc/iFunctions.php");
require_once("inc/req_authentication.php");
require_once("inc/formvalidator.php");
include('inc/SimpleImage.php');

if(!isset($_GET['act']))
{
  $_GET['act'] = ""; 
}
$act = iClean($conn,$_GET['act']); 
/*if($act=="addnew")
{*/


  $label="Add";

  if(isset($_POST['ok']))
  {
    $validator = new FormValidator();
    //$validator->addValidation("request_id","dontselect=0","Please provide Product Category");
    $validator->addValidation("firstname","req","Please enter customer firstname");
    $validator->addValidation("telephone","req","Please enter customer telephone");
    $validator->addValidation("address","req","Please enter customer address");
    if($validator->ValidateForm())
    {             

         $FY = FY;
        $INVPrefix = 'ARO';

        $franchiseid = $admin_det['id'];
        //$request_id = $_POST['request_id'];

        $franchise = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `master_franchise` WHERE `id` = '".$admin_det['id']."'")); 

        $client_id = iClean($conn,$_POST['mem_code']);
        $total_bv = 0;
        foreach ($_POST['prod_id'] as $pkey => $pvalue) 
        {
        # code...
        $product = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `master_product` WHERE `prod_id` = '".$pvalue."'")); 
        
        $total_amt = $total_amt + $_POST['bv'][$pkey];
        }

        $q = mysqli_query($conn,"SELECT client_id,client_intro_id FROM `customer_detail` WHERE client_id = '".$client_id."' AND status=1");
        $client_det = mysqli_fetch_array($q);
        
        
        
        /*if((($client_det['activation_status']==0) && ($total_amt<500)))
        {
          $validation_errors="ID Inactive first purchase min. 500";   
        } 
        else */if(mysqli_num_rows($q)==0)
        {
          $validation_errors="Invalid Customer Code";   
        }   
        
        else {
        $user_id_from = $admin_det['id'];
        $user_id = $admin_det['id'];
        $user_type = 'mlm';
        $invoice_type = "repurchase";
        //$client_id = $franchise['client_id'];
        $invoice_fy = $FY;
        $invoicePrefix = $INVPrefix;
        
        //select product list is not empty
        if(!empty($_POST['checkbox']))
        {
          $invoice_no = invoiceNoGenerate($conn, $invoicePrefix, $FY);
          $invoice_date = date('Y-m-d');
          $created_at = date('Y-m-d H:i:s');

          $invoiceTocken = str_shuffle("012345678901234567890123");
          $invoice_token = substr($invoiceTocken,1,8);

          $total_amt = 0;
          $total_bv = 0;
          $firstname = $_POST['firstname']; 
          $lastname = $_POST['lastname'];
          $email = $_POST['email']; 
          $telephone = $_POST['telephone']; 
          $address = $_POST['address'];
          $state = $_POST['state']; 
          $city = $_POST['city']; 
          $country = 'India'; 
          $postcode = $_POST['pin']; 
          $payment_method = $_POST['payment_method'];

          //'".iClean($conn,$user_id_from)."', 
           
          $invoiceinsstatus = mysqli_query($conn,"INSERT INTO `client_invoices` (`entry_type`,`user_id`,`order_by`, `user_type`, `invoice_fy`, `invoice_no`, `invoice_date`, 
          `cust_code`,`client_id`, `created_at`, `invoice_type`, `total_amt`, `total_bv`, `invoice_token`, `firstname`, `lastname`, `email`, `telephone`, `address`, `state`, `city`, `country`, `postcode`, `payment_method`) VALUES ( 
          'customer',
          '".iClean($conn,$user_id)."',
          'franchise', 
          '".iClean($conn,$user_type)."',
          '".iClean($conn,$invoice_fy)."', 
          '".iClean($conn,$invoice_no)."', 
          '".iClean($conn,$invoice_date)."',
          '".iClean($conn,$client_id)."',
           '".iClean($conn,$client_det['client_intro_id'])."',
          
          '".iClean($conn,$created_at)."',          
          '".iClean($conn,$invoice_type)."', 
          '".iClean($conn,$total_amt)."',
          '".iClean($conn,$total_bv)."',
          '".iClean($conn,$invoice_token)."',
          '".iClean($conn,$firstname)."',
          '".iClean($conn,$lastname)."',
          '".iClean($conn,$email)."',
          '".iClean($conn,$telephone)."',
          '".iClean($conn,$address)."',
          '".iClean($conn,$state)."',
          '".iClean($conn,$city)."',
          '".iClean($conn,$country)."',
          '".iClean($conn,$postcode)."',
          '".iClean($conn,$payment_method)."')")or die(mysqli_error($conn));
          //print_r($_POST['prod_id']);
          //print_r($_POST['prod_qty']);
          
          if($invoiceinsstatus)
          {
              $invoice_id = mysqli_insert_id($conn);
              $total_amt = 0;
              $total_bv = 0;
              $total_qty = 0;

              foreach ($_POST['prod_id'] as $pkey => $pvalue) 
              {
                # code...
                $product = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `master_product` WHERE `prod_id` = '".$pvalue."'")); 
                //echo "SELECT * FROM `master_franchise_product_qty` WHERE `prod_id` = '".$pvalue."' AND  'franchise_id' = '".$admin_det['id']."' ORDER BY id DESC LIMIT 1";
                $productAQty = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `master_franchise_product_qty` WHERE `prod_id` = ".$pvalue." AND  `franchise_id` = ".$admin_det['id']." ORDER BY id DESC LIMIT 1")); 
                //print_r($productAQty);
                //echo $this->input->post('transfer_qty_'.$pvalue)[0];
                if(!empty($_POST['prod_qty'][$pkey])&&$productAQty['current_qty']>=$_POST['prod_qty'][$pkey])
                //if(!empty($_POST['transfer_qty'][$pkey])&&$product['qty']>=$_POST['transfer_qty'][$pkey])
                {
                    //echo "fdsfsdfdsf";
                    $p_price = abs($product['amt']);
                    $p_bv = $product['bv'];
                    $discount = abs($product['discount']);
                    $gst = abs($product['gst']);
                    $transfer_qty = $_POST['product_qty'][$pkey];


                      $customer_product_detail_status = mysqli_query($conn,"INSERT INTO `customer_product_detail` (`invoice_id`,`product_id`,`category_id`,`client_id`,`product_name`,`product_code`,`product_qty`,`product_cost`,`discount`,`product_gst`,`final_amt`,`bv`,`invoice_date`,`order_type`) VALUES ('".iClean($conn,$invoice_id)."',  
                      '".iClean($conn,$product['prod_id'])."', 
                      '".iClean($conn,$product['fk_cid'])."',
                      '".iClean($conn,0)."', 
                      '".iClean($conn,$product['product_name'])."', 
                      '".iClean($conn,$product['product_code'])."',
                      '".iClean($conn,$_POST['product_qty'][$pkey])."',
                      '".iClean($conn,$_POST['product_cost'][$pkey])."',          
                      '".iClean($conn,$_POST['discount'][$pkey])."', 
                      '".iClean($conn,$_POST['product_gst'][$pkey])."',
                      '".iClean($conn,$_POST['final_amt'][$pkey])."',
                      '".iClean($conn,$_POST['bv'][$pkey])."',
                      '".date('Y-m-d H:i:s')."',
                      'Franchise')")or die(mysqli_error($conn));
                   
                      //$current_qty = $product['qty']-$transfer_qty;

                      /*$master_product_qty_status = mysqli_query($conn,"INSERT INTO `master_product_qty` (`prod_id`,`previous_qty`,`current_qty`,`added_from`,`invoice_id`,`updated_on`) VALUES (
                      '".iClean($conn,$product['prod_id'])."', 
                      '".iClean($conn,$product['qty'])."',
                      '".iClean($conn,$current_qty)."', 
                      'transfer', 
                      '".$invoice_id."',
                      '".date('Y-m-d H:i:s')."')")or die(mysqli_error($conn));*/

                    //$frprevqty = $this->db->order_by('id','DESC')->get_where('master_franchise_product_qty', array('franchise_id'=>$franchiseid, 'prod_id'=>$product['prod_id']))->row_array();

                    $frprevqty = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `master_franchise_product_qty` WHERE `franchise_id` = '".$franchiseid."' AND `prod_id` = '".$product['prod_id']."' ORDER BY id DESC")); 

                    if(empty($frprevqty))
                    {
                        $frprevious_qty = 0;
                        $frcurrent_qty = $transfer_qty;
                    }
                    else
                    {
                        $frprevious_qty = $frprevqty['current_qty'];
                        $frcurrent_qty = $frprevqty['current_qty']-$transfer_qty;
                    }

                    //$postFRQTY[] = array('franchise_id'=>$franchiseid, 'prod_id'=>$product['prod_id'], 'previous_qty'=>$frprevious_qty, 'current_qty'=>$frcurrent_qty, 'added_from'=>'transfer', 'invoice_id'=>$invoice_id, 'updated_on'=>date('Y-m-d H:i:s'));

                    $master_franchise_product_qty_status = mysqli_query($conn,"INSERT INTO `master_franchise_product_qty` (`franchise_id`, `prod_id`,`previous_qty`,`current_qty`,`added_from`,`invoice_id`,`updated_on`) VALUES ('".iClean($conn,$franchiseid)."',
                   '".iClean($conn,$product['prod_id'])."', 
                   '".iClean($conn,$frprevious_qty)."',
                   '".iClean($conn,$frcurrent_qty)."', 
                   'order', 
                   '".$invoice_id."',
                   '".date('Y-m-d H:i:s')."')")or die(mysqli_error($conn));

                    $total_amt = $total_amt + $_POST['final_amt'][$pkey];
                    $total_bv = $total_bv + $_POST['bv'][$pkey];
                    $total_qty = $total_qty + $transfer_qty;
                }
                  
              }

              if($customer_product_detail_status&&$master_franchise_product_qty_status)
              {
                //$this->db->insert_batch('customer_product_detail', $postPROD);
                //echo $this->db->last_query();
                //$this->db->update_batch('master_product',$updateArray, 'prod_id'); 

                //$this->db->insert_batch('master_product_qty', $postQTY);

                //$this->db->insert_batch('master_franchise_product_qty', $postFRQTY);

                //$this->db->update('client_invoices', array('total_amt'=>$total_amt,'total_qty'=>$total_qty,'total_bv'=>$total_bv), array('id'=>$invoice_id)); 

                mysqli_query($conn,"UPDATE `client_invoices` SET `total_amt` = '".$total_amt."', `total_qty` = '".$total_qty."', `total_bv` = '".$total_bv."'  WHERE id='".$invoice_id."'")or die(mysqli_error($conn));

                $msg="Customer Order Successfully";  
              }
              else
              {
                $validation_errors="Something went wrong!";  
              }
          }
          else
          {
            $validation_errors="Something went wrong!";  
          }
        }
        else
        {
          $validation_errors="You must have to add products to book order";
        }
      
      if(empty($validation_errors))
        {
        ?>
        <script type="text/javascript">
        alert('<?php echo $msg;?>');
        location.href="book_order_customer.php";
        </script>
        <?php
        }
        }
      }
      else
      {
        $validation_errors ='';
        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
           $validation_errors .= "<p>$inp_err</p>\n";
        }        
      }
  }
/*}*/



function invoiceNoGenerate($conn, $INVPrefix, $FY)
{  
  $q = mysqli_query($conn,"SELECT invoice_no FROM `client_invoices` WHERE user_type='mlm' ORDER BY id DESC LIMIT 1");   
  $rs_order = mysqli_fetch_array($q) ;  
  //print_r($rs_order);
  if (mysqli_num_rows($q)==0)
  {
    $srno = 6000358;
    $invoiceNo = $INVPrefix."-".$srno;
  }
  else
  {
    $srno = substr($rs_order['invoice_no'],-7);
    $srno = $srno + 1;
    $srno = sprintf("%07d", $srno);
    $invoiceNo = $INVPrefix."-".$srno;
  }  
  return $invoiceNo;
}
###############  Start Paging Code ##########################
require_once("inc/class.pagination.php");
$page = 1; //default page
$per_page = 20; //rows per page
//$full_sql = "SELECT * FROM `master_franchise_product_qty` $q ORDER BY prod_id DESC";

$full_sql = "SELECT DISTINCT `mp`.*, `frqty`.`id`, `frqty`.`prod_id`, `frqty`.`previous_qty`, `frqty`.`current_qty`, `frqty`.`updated_on`, `frqty`.`min_qty_rem` FROM `master_franchise_product_qty` `frqty` INNER JOIN `master_product` `mp` ON `mp`.`prod_id`=`frqty`.`prod_id` INNER JOIN (SELECT prod_id, MAX(id) AS max_prod_id FROM master_franchise_product_qty WHERE franchise_id = ".$admin_det['id']." GROUP BY prod_id) as smpc ON `frqty`.`prod_id` = `smpc`.`prod_id`  AND `frqty`.`franchise_id` = ".$admin_det['id']." WHERE `frqty`.`franchise_id` = ".$admin_det['id']." ORDER BY `frqty`.`id` DESC";

//echo $full_sql;
$num = mysqli_num_rows(mysqli_query($conn,$full_sql));
$display_links = 11; //number of links to be displayed - odd number
//check page number
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
<html lang="en">
<head>
<title> Book Customer Order: <?php echo COMPANY?></title>
<?php include("inc/common_head.php");?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" integrity="sha256-p6xU9YulB7E2Ic62/PX+h59ayb3PBJ0WFTEQxq0EjHw=" crossorigin="anonymous" />
<script src="inc/filter1.js" type="text/javascript" charset="utf-8"></script>
<script src="inc/filter2.js" type="text/javascript" charset="utf-8"></script>
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
    <h4 class="mt-0 header-title">Book Customer Order</h4>
    <hr><br>
    <form method="POST" class="form-horizontal" enctype="multipart/form-data">   
    <?php if(isset($validation_errors)){echo "<div class=\"alert alert-danger bg-danger text-white mb-0\">".$validation_errors."</div>";}?>
 <br>
      <input type="hidden" id="product_id" value="0">
      <div class="form-body">
      
        <div class="row">
          <div class="col-md-6">
            <div class="form-group row" style="display: none;">
              <label class="col-md-5 label-control" for="userinput1">Customer</label>
              <div class="col-md-7">
                <select name="customer_type" id="customer_type" class="form-control" required="">                  
                  <option value="customer" selected="">Customer</option>
                </select>
              </div>
            </div>
            <div class="form-group row" id="member_code">
              <label class="col-md-3 label-control" for="userinput1">&nbsp;&nbsp;&nbsp;Customer ID</label>
              <div class="col-md-9">
                <input type="text" value="" name="mem_code" id="mem_code" class="form-control" placeholder="Customer Code"/>
                <input type="hidden" id="client_id" name="client_id">
              </div>
            </div>
          </div>
          <div class="col-md-6"></div>
          <div class="col-md-12"><hr></div>
          <div class="col-md-6">
            <div id="client_data" style="margin-left: 10px;">
              <div class="form-group row">
                <label class="col-md-3 label-control" for="userinput1">Customer First Name</label>
                <div class="col-md-9">
                  <input type="text" value="" name="firstname" class="form-control" placeholder="Customer first name" required="" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="userinput1">Customer Mobile</label>
                <div class="col-md-9">
                  <input type="text" value="" name="telephone" class="form-control" placeholder="Customer Mobile" required="" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="userinput1">Customer Address</label>
                <div class="col-md-9">
                  <textarea name="address" id="address" class="form-control" required=""></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div id="client_data" style="margin-left: 10px;">
              <div class="form-group row">
                <label class="col-md-3 label-control" for="userinput1">Customer Lastname</label>
                <div class="col-md-9">
                  <input type="text" value="" name="lastname" class="form-control" placeholder="Customer last name" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="userinput1">Customer Email</label>
                <div class="col-md-9">
                  <input type="email" value="" name="email" class="form-control" placeholder="Customer Email"  />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="userinput1">Customer City</label>
                <div class="col-md-9">
                  <input type="text" value="" name="city" class="form-control" placeholder="Customer City"  />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="userinput1">Customer State</label>
                <div class="col-md-9">
                  <input type="text" value="" name="state" class="form-control" placeholder="Customer State" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-md-3 label-control" for="userinput1">Customer Pincode</label>
                <div class="col-md-9">
                  <input type="text" value="" name="pin" class="form-control" placeholder="Customer Pincode"  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12" id="productlist">
            <hr>
            <!-- Large modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Open Product List</button>
            <br><br>
            <div class="table-responsive">
              <table class="table table-bordered table-stripped table-condensed table-striped table-sm table-xs" id="selectedPackageList">
                <thead>
                  <tr>
                    <td class="text-left">Sr. No.</td>
                    <td class="text-left">Category</td>
                    <td class="text-left">Product Name</td>
                    <td class="text-left">Product Code</td>
                    <td class="text-right">BV</td>
                    <td class="text-right">MRP</td>
                    <td class="text-right">Taxable Amt.</td>
                    <td class="text-right">SGST</td>
                    <td class="text-right">CGST</td>
                    <!-- <td class="text-left">Avail. Qty</td> -->
                    <td class="text-left">Sale Qty</td>
                    <td class="text-left">Rate</td>
                    <td class="text-left">Discount</td>
                    <td class="text-right">Amount</td>
                    <td class="text-center">Remove</td>
                  </tr>
                </thead>
                <tbody id="orderPageBody">
                  <tr><td colspan="16" class="text-center"><strong>No product select for package.</strong></td></tr>
                </tbody>
              </table>
            </div>


            <?php
            $full_sql = "SELECT DISTINCT `mp`.*, `frqty`.`id`, `frqty`.`prod_id`, `frqty`.`previous_qty`, `frqty`.`current_qty`, `frqty`.`updated_on`, `frqty`.`min_qty_rem` FROM `master_franchise_product_qty` `frqty` INNER JOIN `master_product` `mp` ON `mp`.`prod_id`=`frqty`.`prod_id` INNER JOIN (SELECT prod_id, MAX(id) AS max_prod_id FROM master_franchise_product_qty WHERE franchise_id = ".$admin_det['id']." GROUP BY prod_id) as smpc ON `frqty`.`prod_id` = `smpc`.`prod_id` AND frqty.id = smpc.max_prod_id AND `frqty`.`franchise_id` = ".$admin_det['id']." WHERE `frqty`.`franchise_id` = ".$admin_det['id']." ORDER BY `frqty`.`id` DESC";
            $rsd = mysqli_query($conn,$full_sql);
            ?>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Products for Book Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <input type="text" name="filter" value="" id="filter" size="20" placeholder="Search here.." />
                    <div class="table-responsive container1" style="max-height: 400px;">
                      <table class="table table-bordered table-stripped table-condensed table-striped table-sm" id="packagetable" width="100%" cellspacing="0" style="font-size: 12px;" style="width:100%;">
                        <thead>
                          <tr>
                            <th><input class="check-all" type="checkbox" onchange="checkAll(this)" name="chk[]"/></th>
                            <th>S.no</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>BV</th>
                            <th>Price</th>
                            <th>Discount(%)</th>
                            <th>GST(%)</th>
                            <th>Shipping</th>
                            <th>Avail. Qty</th>
                            <th>Image</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $i=1;
                        while($rs=mysqli_fetch_array($rsd)){
                          $catname = mysqli_fetch_array(mysqli_query($conn,"SELECT category FROM `master_product_category` WHERE `cat_id` = '".$rs['fk_cid']."'")); 
                          if($rs['show_status']==1){
                              $class = "btn btn-success btn-sm";
                              $icon = "<i class=\"mdi mdi-account-check h5\"></i>";
                              $background = "";
                          } 
                          else{
                              $class = "btn btn-warning btn-sm";
                              $icon = "<i class=\"mdi mdi-account-multiple-minus h5\"></i>";
                              $background="";
                          } 
                          $rs['category'] = $catname['category'];

                          $chk_deals = '';
                          if($rs['current_qty']>0)
                          {
                            $chk_deals = '<input class="Checkbox" name="checkbox[]" type="checkbox" value="'.$rs['prod_id'].'"/>';
                          }
                          ?>
                          <tr style="<?php echo $background;?>">
                            <td><?php echo $chk_deals; ?></td>
                            <td><?php echo $i;?></td>
                            <td>
                              <input type="hidden" value="<?php echo $catname['category']?>" id="product_category_<?php echo $rs['prod_id']?>">
                              <?php echo $catname['category']?>
                            </td>
                            <td>
                              <input type="hidden" value="<?php echo $rs['product_name']?>" id="product_name_<?php echo $rs['prod_id']?>"><?php echo $rs['product_name']?>
                            </td>
                            <td>
                              <input type="hidden" value="<?php echo $rs['product_code']?>" id="product_code_<?php echo $rs['prod_id']?>"><?php echo $rs['product_code']?>
                            </td>
                            <td>
                              <input type="hidden" value="<?php echo $rs['bv']?>" id="product_bv_<?php echo $rs['prod_id']?>"><?php echo $rs['bv']?>
                            </td>
                            <td>
                              <input type="hidden" value="<?php echo $rs['dp']?>" id="product_amt_<?php echo $rs['prod_id']?>">
                              <?php echo $rs['dp']?>
                            </td>
                            <td>
                              <input type="hidden" value="<?php echo $rs['discount']?>" id="product_discount_<?php echo $rs['prod_id']?>"><?php echo $rs['discount']?>
                            </td>
                            <td>
                              <input type="hidden" value="<?php echo $rs['gst']?>" id="product_gst_<?php echo $rs['prod_id']?>">
                              <?php echo $rs['gst']?>
                            </td>
                            <td>
                              <input type="hidden" value="<?php echo $rs['shipping_charge']?>" id="product_shipping_charge_<?php echo $rs['prod_id']?>">
                              <?php echo $rs['shipping_charge']?>
                            </td>
                            <td>
                              <input type="hidden" value="<?php echo $rs['current_qty']?>" id="product_qty_<?php echo $rs['prod_id']?>">
                              <?php echo $rs['current_qty']?>
                            </td>
                            <td>
                              <input type="hidden" value="<?php echo $rs['p_image']?>" id="product_image_<?php echo $rs['prod_id']?>">
                              <img src="../upload/products/<?php echo $rs['p_image']?>" style="height: 50px;"/>
                            </td>
                          </tr>
                        <?php $i++;}  ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button> 
                  </div>-->
                </div>                  
              </div>
            </div>

            <div class="row">
              <div class="col-md-8"></div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="payment_method">Payment Mode</label>
                  <select class="form-control" name="payment_method" required="">
                    <option value="Cheque/DD">Cheque/DD</option>
                    <option value="Cash">Cash</option>
                    <option value="Direct Transfer">Direct Transfer</option>
                  </select>
                </div>
              </div>
            </div>
            
            

            <hr>
            <br>
          </div>
        </div>
      </div>
      <hr>
      <div class="form-group row">
        <!-- <label class="col-md-2 label-control" for="userinput3"></label> -->
        <div class="col-md-12 text-right">
          <button type="submit" name="ok" class="btn btn-primary waves-effect waves-light">SUBMIT ORDER</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
</div>
                          
<?php include("inc/footer.php");?>
<?php include("inc/footerjs.php");?>

<script type="text/javascript">
// Call the dataTables jQuery plugin

$(document).ready(function(){

    if (window.localStorage)
    {
        localStorage.ordercart = '';
    }
    
    localStorage.removeItem(ordercart);
    var ordercart = [];
    $(function () {
        if(localStorage.ordercart)
        {
            ordercart = JSON.parse(localStorage.ordercart);
            showCart();
        }
        else
        {
            localStorage.removeItem(ordercart);
        }
    });

    

    


    $('#packagetable tbody').on( 'click', '.Checkbox', function () {
        if(this.checked==true)
        {
          //alert($(this).val());
          var prod_id = $(this).val();
          var category = $("#product_category_"+prod_id).val();
          var product_name = $("#product_name_"+prod_id).val();
          //alert(product_name);
          var product_code = $("#product_code_"+prod_id).val();
          var product_amt = $("#product_amt_"+prod_id).val();
          var product_discount = $("#product_discount_"+prod_id).val();
          var product_gst = $("#product_gst_"+prod_id).val();
          var product_shipping_charge = $("#product_shipping_charge_"+prod_id).val();
          var product_qty = $("#product_qty_"+prod_id).val();
          var product_image = $("#product_image_"+prod_id).val();
          var product_bv = $("#product_bv_"+prod_id).val();
          console.log(this);
            /*console.log( ptable.api().row( this.closest('tr') ).data() );
            var data = ptable.api().row( this.closest('tr') ).data();
            console.log(data);*/
            var data = {"category":category, "sub_category":"", "product_type":"", "prod_id":prod_id, "product_name":product_name, "product_code":product_code, "amt":product_amt, "qty":product_qty, "op":"", "picup_mrp":"", "dp":"", "pv":"", "gst":product_gst, "discount":product_discount, "bv":product_bv}
            addToCart(data);
        }
        else
        {
            console.log( ptable.api().row( this.closest('tr') ).data() );
            var data = ptable.api().row( this.closest('tr') ).data();
            console.log(data.prod_id);
            if(ordercart.length!=0)
            {
                for (var i in ordercart) {
                    if(ordercart[i].ProductID == data.prod_id)
                    {   
                        deleteItem(i);
                        return;
                    }
                }
            }
        }
    });


    $('#selectedPackageList tbody').on( 'click', '.btn-danger', function () {
        var tr = $(this).closest("tr").remove();
        //console.log('findid'+ $(this).closest("tr").find('input[name="prod_id[]"]').val());
        var prod_id = $(this).closest("tr").find('input[name="prod_id[]"]').val();
        console.log(prod_id);
        if(ordercart.length!=0)
        {
            for (var i in ordercart) {
                if(ordercart[i].ProductID == prod_id)
                {   
                    //$('.Checkbox').prop('checked', false, value == prod_id);
                    deleteItem(i);
                    return;
                }
            }
        }
    });


    $('#selectedPackageList tbody').on('change keyup', '.update-qty', function () {
        //var tr = $(this).closest("tr").remove();
        //console.log('findid'+ $(this).closest("tr").find('input[name="prod_id[]"]').val());
        var qty = $(this).val();
        var prod_id = $(this).closest("tr").find('input[name="prod_id[]"]').val();
        console.log(prod_id);
        if(ordercart.length!=0)
        {
            for (var i in ordercart) {
                if(ordercart[i].ProductID == prod_id)
                {   
                    //alert(ordercart[i].available_qty+' '+qty);
                    //$('.Checkbox').prop('checked', false, value == prod_id);
                    if(parseInt(ordercart[i].available_qty)>=parseInt(qty))
                    { 
                        updateItem(prod_id, qty);
                    }
                    else
                    {
                        updateItem(prod_id, ordercart[i].available_qty);
                        alert("Qty is required to available qty!");
                    }
                    $(this).focus();
                    return;
                }
            }
        }
    });




function addToCart(data) {
    var j = 1
    // update qty if product is already present
    for (var i in ordercart) {
        if(ordercart[i].ProductID == data.prod_id)
        {
            ordercart[i].Qty = parseInt(ordercart[i].Qty) + parseInt(qty);
            saveCart();
            showCart();            
            return;
        }
        j++;
    }

    if(data.sub_category==null)
    {
        data.sub_category = '';
    }
    // create JavaScript Object
    //var item = { ProductID: data.prod_id, Name: data.product_name, Price: data.amt, Qty: 1, Image: data.image, Discount:data.discount, BV: data.bv, DP:data.dp};
    var item = { SrNo: j, Category: data.category, SubCategory: data.sub_category, ProductType: data.product_type, ProductID: data.prod_id, Name: data.product_name, Code: data.product_code, MRP: data.amt, Price: data.amt, Qty: 1, Image: data.image, Discount:data.discount, GST: data.gst, BV: data.bv, available_qty: data.qty, transferQty:1, OP: data.op, PP: data.picup_mrp, DP: data.dp, PV: data.pv, Category: data.category,};
    console.log(item); 
    ordercart.push(item);
    saveCart();
    showCart();
}

function updateItem(productId, qty)
{
    if(ordercart.length!=0)
    {
        for (var i in ordercart) {
            if(ordercart[i].ProductID == productId)
            {   
                //var qty = $(this).closest("div.quantity").find("input[name='quantity']").val();
                //var qty = $(this).val();
                //var qty = $("#quantity_"+productId+"_"+i).val();
                //console.log(qty);
                if(qty!=undefined)
                {
                    quantity = qty;
                }

                if(quantity!=NaN&&quantity!=undefined&&quantity!=0)
                {
                    console.log(quantity);
                    ordercart[i].Qty = parseInt(quantity);
                    ordercart[i].transferQty = parseInt(quantity);
                    saveCart();
                    showCart(); 
                }
                
                return;
            }
        }
    }
}


function removeItem(productId) {
    if(ordercart.length!=0)
    {
        for (var i in ordercart) {
            if(ordercart[i].ProductID == productId)
            {   
                deleteItem(i);
                return;
            }
        }
    }
}

function deleteItem(index){
    ordercart.splice(index,1); // delete item at index
    saveCart();
    showCart();
}

function saveCart() {
    if (window.localStorage)
    {
        localStorage.ordercart = JSON.stringify(ordercart);
    }
}


function showCart() 
{
    

    if (ordercart.length == 0) {
        //$("#cart").css("visibility", "hidden");
        $("#orderTQty").html(0);
        $("#orderTAmt").html(0);
        $("#orderBody").html('<tr><td colspan="6" align="center"><strong>No product select for package.</strong></td></tr>');
        $("#orderPageBody").html('<tr><td colspan="21" align="center"><strong>No product select for package.</strong></td></tr>');
        $("#orderBodyTotal").html('');
        $("#orderPageBodyTotal").html('');
        $(".checkout-cart").attr({'disabled':true,'href':'cart.php'});
        return;
    }

    $(".checkout-cart").attr({'disabled':false,'href':'checkout.php'});
    $("#cart").css("visibility", "visible");
    $("#orderBody").empty();
    var rows = '';
    var rowscart = '';
    var prodQty = 0;
    var totalPrice = 0;
    var totalPP = 0;
    var totalDP = 0;
    var totalPV = 0;
    var totalBV = 0;
    var taxableAmt = 0;
    var totalDiscount = 0;
    var GSTAmt = 0;
    var NetAmt = 0;

    for (var i in ordercart) 
    {
        var item = ordercart[i];
        
        //console.log(item.Qty);
        if(item.Qty==null)
        {
            //console.log('test');
            item.Qty = 1;
        }

        
        var customer_type = $("#customer_type option:selected").val();
        //alert(customer_type);
        
        //var prodMRP = parseInt(item.Qty) * parseFloat(item.MRP);
        //var prodOP = parseInt(item.Qty) * parseFloat(item.OP);
        //var prodDiscount = parseInt(item.Qty) * parseFloat(item.Discount);

        var prodPP = parseInt(item.Qty) * parseFloat(item.PP);
        var prodDP = parseInt(item.Qty) * parseFloat(item.DP);
        var prodPV = parseInt(item.Qty) * parseFloat(item.PV);
        var prodBV = parseInt(item.Qty) * parseFloat(item.BV);

        totalPV = (parseFloat(totalPV) + parseFloat(prodPV)).toFixed(2);

        if(customer_type=='associate')
        {
            //RATE=ARP if invoice PV <=  55
            //RATE=ARP if invoice PV > 55
            
            if(parseInt(totalPV)<=55)
            {
                var rate = parseFloat(item.Discount);
                //alert(rate);
            }
            else
            {
                var rate = parseFloat(item.PP);
            }
        }
        else if(customer_type=='customer')
        {
            if(item.OP!='')
            {
                var rate = parseFloat(item.OP);
            }
            else
            {
                var rate = parseFloat(item.MRP);
            }
        }
        else
        {
            var rate = parseFloat(item.OP);
        }

        

        var ptaxableAmt = ((parseFloat(rate)*100)/(100+parseFloat(item.GST))).toFixed(2);

        var sgst = parseFloat(item.GST)/2;
        var cgst = parseFloat(item.GST)/2;
        
        var discount = parseFloat(item.MRP)-parseFloat(rate);

        var prodPrice = parseInt(item.Qty) * parseFloat(rate);

        var gst_charge = ptaxableAmt;//parseFloat(item.GST)/100 * parseFloat(item.DP);

        var prodBV = parseInt(item.Qty) * parseFloat(item.BV);

        /*rowscart += '<tr><td class="text-left">'+ item.SrNo +'</td><td class="text-left">'+ item.Category +'</td><td class="text-left">'+ item.SubCategory +'</td><td class="text-left">'+ item.ProductType +'</td><td class="text-left">'+ item.Name +'</td><td class="text-left">'+ item.Code +'</td><td class="text-right"><i class="fa fa-inr"></i> '+ item.MRP +'</td><td class="text-left">'+ item.OP +'</td><td class="text-right">'+ item.Discount +'</td><td class="text-right">'+ item.PP +'</td><td class="text-right"><i class="fa fa-inr"></i> '+ item.DP +'</td><td class="text-left">'+ item.BV +'</td><td class="text-left">'+ item.PV +'</td><td class="text-right">'+ ptaxableAmt +'</td><td class="text-right">'+ sgst +'</td><td class="text-right">'+ cgst +'</td><td class="text-right"><input type="number" min="1" minlenght="1" name="prod_qty[]" value="'+item.transferQty+'" class="update-qty form-control" style="width:80px;" ></td><td class="text-right"><i class="fa fa-inr"></i> '+ rate +'</td><td class="text-right"><i class="fa fa-inr"></i> '+ discount +'</td><td class="text-right"><i class="fa fa-inr"></i> '+ prodPrice +'</td><td class="text-center"><a  class="btn btn-danger btn-xs btn-sm" title="Remove"><i class="fa fa-times-circle"></i></a></td>';*/

        rowscart += '<tr><td class="text-left">'+ item.SrNo +'</td><td class="text-left">'+ item.Category +'</td><td class="text-left">'+ item.Name +'</td><td class="text-left">'+ item.Code +'</td><td class="text-left">'+ item.BV +'</td><td class="text-right"><i class="fa fa-inr"></i> '+ item.MRP +'</td><td class="text-right">'+ ptaxableAmt +'</td><td class="text-right">'+ sgst +'</td><td class="text-right">'+ cgst +'</td><td class="text-right"><input type="number" min="1" minlenght="1" name="prod_qty[]" value="'+item.transferQty+'" class="update-qty form-control" style="width:80px;" ></td><td class="text-right"><i class="fa fa-inr"></i> '+ parseInt(item.Qty) * parseFloat(rate) +'</td><td class="text-right"><i class="fa fa-inr"></i> '+ parseInt(item.Qty) * parseFloat(discount) +'</td><td class="text-right"><i class="fa fa-inr"></i> '+ prodPrice +'</td><td class="text-center"><a  class="btn btn-danger btn-xs btn-sm" title="Remove"><i class="fa fa-times-circle"></i></a></td>';

        rowscart += '<input type="hidden" name="prod_id[]" value="'+ item.ProductID +'">';
        rowscart += '<input type="hidden" name="product_cost[]" value="'+ item.MRP +'">';
        rowscart += '<input type="hidden" name="discount[]" value="'+ discount +'">';
        rowscart += '<input type="hidden" name="product_gst[]" value="'+ item.GST +'">';
        rowscart += '<input type="hidden" name="product_qty[]" value="'+ item.transferQty +'">';
        rowscart += '<input type="hidden" name="bv[]" value="'+ prodBV +'">';
        rowscart += '<input type="hidden" name="arp[]" value="'+ item.Discount +'">';
        rowscart += '<input type="hidden" name="op[]" value="'+ item.OP +'">';
        rowscart += '<input type="hidden" name="pp[]" value="'+ item.PP +'">';
        rowscart += '<input type="hidden" name="dp[]" value="'+ item.DP +'">';
        rowscart += '<input type="hidden" name="pv[]" value="'+ item.PV +'">';
        rowscart += '<input type="hidden" name="taxable_amt[]" value="'+ ptaxableAmt +'">';
        rowscart += '<input type="hidden" name="rate[]" value="'+ rate +'">';
        rowscart += '<input type="hidden" name="final_amt[]" value="'+ prodPrice +'">';
        rowscart += '</tr>';




        totalDiscount = (parseFloat(totalDiscount) + parseFloat(discount)).toFixed(2);

        totalPrice = (parseFloat(totalPrice) + parseFloat(prodPrice)).toFixed(2);

        //totalPP = totalPP + prodPP;
        //totalPP = totalPP + prodPP;
        totalPP = (parseFloat(totalPP) + parseFloat(prodPP)).toFixed(2);
        totalDP = (parseFloat(totalDP) + parseFloat(prodDP)).toFixed(2);
        
        totalBV = (parseFloat(totalBV) + parseFloat(prodBV)).toFixed(2);

        prodQty = prodQty + parseInt(item.Qty);

        taxableAmt = (parseFloat(taxableAmt) + parseFloat(gst_charge)).toFixed(2);
        GSTAmt = (parseFloat(GSTAmt) + parseFloat(sgst) + parseFloat(cgst)).toFixed(2);

        CGST = parseFloat(GSTAmt/2).toFixed(2);
        SGST = parseFloat(GSTAmt/2).toFixed(2);

        NetAmt = taxableAmt + totalPrice
    }

    //rowscart += '<tr><td colspan="5"></td><td class="text-right">Total :</td><td class="text-right"> '+ totalPP +'</td><td class="text-right"> '+ totalDP +'</td><td class="text-right"> '+ totalBV +'</td><td class="text-right"> '+ totalPV +'</td><td class="text-right"> '+ taxableAmt +'</td><td class="text-right"> '+ CGST +'</td><td class="text-right"> '+ SGST +'</td><td class="text-right">'+ prodQty +'</td><td class="text-right">'+ totalPrice +'</td><td class="text-right">'+ totalDiscount +'</td><td class="text-right">'+ totalPrice +'</td><td class="text-right"></td></tr>';

    rowscart += '<tr><td colspan="5"></td><td class="text-right">Total :</td><td class="text-right"> '+ taxableAmt +'</td><td class="text-right"> '+ CGST +'</td><td class="text-right"> '+ SGST +'</td><td class="text-right">'+ prodQty +'</td><td class="text-right">'+ totalPrice +'</td><td class="text-right">Total BV '+ totalBV +'</td><td class="text-right">'+ totalPrice +'</td><td class="text-right"></td></tr>';
    
    rowscart += '<tr><td colspan="11"></td><td class="text-right">Amount Paid:</td><td class="text-right"><i class="fa fa-inr"></i>  '+ totalPrice +'</td><td class="text-left"></td></tr>';


    $("#orderTQty").html(prodQty);
    $("#orderTAmt").html(totalPrice);
    //$("#orderBody").append(rows);
    $("#orderBody").html(rows);
    $("#orderPageBody").html(rowscart);
}


$('#customer_type').change('on', function() {
    if($(this).val()=="customer") {
        $("#client_data").show(300);
        $("#member_code").hide();
        $("input[name=mem_code]").prop('required',false);
        $("input[name=firstname]").prop('required',true);
        $("input[name=telephone]").prop('required',true);
        $("input[name=address]").prop('required',true);
    } else {
        $("#client_data").hide(200);
        $("#member_code").show();
        $("input[name=mem_code]").prop('required',true);
        $("input[name=firstname]").prop('required',false);
        $("input[name=telephone]").prop('required',false);
        $("input[name=address]").prop('required',false);
    }

    showCart();
});

});


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $( "#mem_code" ).autocomplete({
          source: function( request, response ) {
            $.ajax({
                    url: "inc/getmecustcode.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term,request:1
                },
                success: function( data ) {
                    response( data );
                }
            });
            },
            select: function (event, ui) 
            {
                $(this).val(ui.item.label); // display the selected text
                var userid = ui.item.value; // selected value
                $("#client_id").val(userid);
                // AJAX
                $.ajax({
                    url: 'inc/getmecustcode.php',
                    type: 'post',
                    data: {userid:userid,request:2},
                    dataType: 'json',
                    success:function(response)
                    {
                        var len = response.length;

                        if(len > 0)
                        {
                            var fullname = response[0]['fullname'];
                            var email = response[0]['email'];
                            var mobile = response[0]['mobile'];
                            var address = response[0]['address'];
                            var city = response[0]['city'];
                            var state = response[0]['state'];
                            var pin = response[0]['pin'];

                            $("input[name=client_id]").val(userid);
                            $("input[name=firstname]").val(fullname);
                            $("input[name=email]").val(email);
                            $("input[name=telephone]").val(mobile);  
                            $("#address").val(address);
                            $("input[name=city]").val(city);
                            $("input[name=state]").val(state);
                            $("input[name=pin]").val(pin);

                            //console.log('<div class="well"><ul><li>Name: '+fullname+'</li><li>Email: '+email+'</li><li>Mobile: '+mobile+'</li><li>Address: '+address+'</li></ul></div>');

                            // Set value to textboxes
                            //$("#client_data").html('<div class=""><ul class="list-group"><li class="list-group-item list-group-item-action">Name: '+fullname+'</li><li class="list-group-item list-group-item-action">Email: '+email+'</li><li class="list-group-item list-group-item-action">Mobile: '+mobile+'</li><li class="list-group-item list-group-item-action">Address: '+address+'</li></ul></div>');
                            //document.getElementById('client_data').value = '<div class="well"><ul><li>Name: '+fullname+'</li><li>Email: '+email+'</li><li>Mobile: '+mobile+'</li><li>Address: '+address+'</li></ul></div>';
                            /*document.getElementById('age_'+index).value = age;
                            document.getElementById('email_'+index).value = email;
                            document.getElementById('salary_'+index).value = salary;*/
                            //$("#client_data").show(300);
                        }
             
                    }
                });

                return false;
            }
          /*source: "<?php //echo base_url('backend/Backend/getmemcode');?>",
          select: function (event, ui) {
            console.log(ui.item);
          $("#txtAllowSearch").val(ui.item.label); // display the selected text
          $("#client_id").val(ui.item.value); // save selected id to hidden input*/

        }).focus(function() {
            $(this).autocomplete('search', $(this).val())
        });
    });
</script>
</body>
</html>