<?php
session_start();
require_once("inc/dbcn.php");
require_once("inc/iFunctions.php");
require_once("inc/req_authentication.php");
require_once("inc/formvalidator.php");
include('inc/SimpleImage.php');
$act = iClean($conn,$_GET['act']); 
if($act=="addnew")
{
  $label="Add";
  $category=isset($_POST['category'])?$_POST['category']:'';
  $cat_id=isset($_POST['cat_id'])?$_POST['cat_id']:''; 
  $product_code=isset($_POST['product_code'])?$_POST['product_code']:'';
  $product_name=isset($_POST['product_name'])?$_POST['product_name']:'';
  $amt=isset($_POST['amt'])?$_POST['amt']:'';
  $bv=isset($_POST['bv'])?$_POST['bv']:'';
  $dp=isset($_POST['dp'])?$_POST['dp']:'';
  $gst=isset($_POST['gst'])?$_POST['gst']:0;
  $shopping_status=isset($_POST['shopping_status'])?$_POST['shopping_status']:'';
  $discount=isset($_POST['discount'])?$_POST['discount']:0;
  $descp=isset($_POST['descp'])?$_POST['descp']:'';
  $shipping_charge=isset($_POST['shipping_charge'])?$_POST['shipping_charge']:0;
  $qty=isset($_POST['qty'])?$_POST['qty']:1;

  if(isset($_POST['ok']))
  {
   	$validator = new FormValidator();
    $validator->addValidation("cat_id","dontselect=0","Please provide Product Category");
    $validator->addValidation("product_name","req","Please provide Product Name");
    $validator->addValidation("amt","req","Please provide Product Amount");
    //$validator->addValidation("bv","req","Please provide Product BV");
    if($validator->ValidateForm())
  	{
  	  
      if($_FILES["myfile"]["type"]!="")
      {
          $fileinfo = @getimagesize($_FILES["myfile"]["tmp_name"]);
          $width = $fileinfo[0];
          $height = $fileinfo[1];
          
          $allowed_image_extension = array(
              "png",
              "jpg",
              "jpeg"
          );
          
          // Get image file extension
          $file_extension = pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION);
          
          // Validate file input to check if is not empty
          if (! file_exists($_FILES["myfile"]["tmp_name"])) {
              $validation_errors = "Choose image file to upload.";
          }// Validate file input to check if is with valid extension
          else if (! in_array($file_extension, $allowed_image_extension)) {
              $validation_errors = "Upload valiid images. Only PNG and JPEG are allowed.";
          }// Validate image file size
          else if (($_FILES["myfile"]["size"] > 2000000)) {
              $validation_errors = "Image size exceeds 2MB";
          }// Validate image file dimension
          
          else
          {
              $target="../upload/products/";
              $filename=basename($_FILES["myfile"]["name"]);
              $target.=$filename;
              $tm=time();
              $tmp_file=$_FILES["myfile"]["tmp_name"];
              // move_uploaded_file($tmp_file,$target);
              $image = new SimpleImage();
              $image->load($tmp_file);
              $image->resizeToWidth(500);
              $filname=$tm.$filename;
              $image->save($filname,'../upload/products/');
              
              $image->resizeToWidth(250);
              $image->save($filname,'../upload/products/thumb/');
          }
      }
      else
      {
          $filname='';
          //$categoryIcon='';
      }
      if(!isset($validation_errors))
        {
      mysqli_query($conn,"INSERT INTO `master_product` (`fk_cid`,`product_code`,`product_name`,`amt`,`bv`,`dp`,`picup_mrp`,`gst`,`shopping_status`,`p_image`,`descp`,`discount`,`shipping_charge`,`qty`) VALUES ('".iClean($conn,$cat_id)."',  
        '".iClean($conn,strtoupper($product_code))."', 
        '".iClean($conn,strtoupper($product_name))."',
        '".iClean($conn,$amt)."', 
        '".iClean($conn,$bv)."', 
         '".iClean($conn,$dp)."',
         '0',
         '".iClean($conn,$gst)."',          
         '".iClean($conn,$shopping_status)."', 
         '".$filname."',
         '".iClean($conn,$descp)."',
         '".iClean($conn,$discount)."',
         '".iClean($conn,$shipping_charge)."',
         '".iClean($conn,$qty)."')")or die(mysqli_error($conn));
        $msg="Product Added Successfully";
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
  $result_con=mysqli_query($conn,"SELECT * FROM `master_product_category` WHERE pid=0 AND status=1 ORDER BY category ASC ");
  $cat="<select name=\"cat_id\" class=\"form-control\" required=\"required\">";
  $cat.="<option value=\"\">Category</option>\n";
  while($row_con=mysqli_fetch_array($result_con))
  {
    if($category==$row_con['cat_id']){$selected='selected';}else{$selected="";}
    $cat.='<option value="'.$row_con['cat_id'].'" style="font-weight:bold;" '.$selected.'>'.$row_con['category'].'</option>';

    $subresult_con=mysqli_query($conn,"SELECT * FROM `master_product_category` WHERE pid=".$row_con['cat_id']." AND status=1 ORDER BY category ASC ");

    while($subrow_con=mysqli_fetch_array($subresult_con)) {
      if($category==$subrow_con['cat_id']){$selected='selected';}else{$selected="";}
      $cat.='<option value="'.$subrow_con['cat_id'].'" '.$selected.'> -- '.$subrow_con['category'].'</option>';
    }
    
    //$cat.="\t<option value='".$row_con['cat_id']."' ".$selected.">".$row_con['category']."</option>\n";	
    $selected="";
  }
  $cat.="</select>\n";
}
###############################
if($act=="updt")
{
  $label="Update";
  $uid=iClean($conn,$_GET['uid']);
  $rs_br=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `master_product` WHERE prod_id='".$uid."'"));

  $cat_id=isset($_POST['cat_id'])?$_POST['cat_id']:$rs_br['fk_cid'];
  $product_code=isset($_POST['product_code'])?$_POST['product_code']:$rs_br['product_code'];
  $product_name=isset($_POST['product_name'])?$_POST['product_name']:$rs_br['product_name'];
  $amt=isset($_POST['amt'])?$_POST['amt']:$rs_br['amt'];
  $bv=isset($_POST['bv'])?$_POST['bv']:$rs_br['bv'];
  $dp=isset($_POST['dp'])?$_POST['dp']:$rs_br['dp'];
  $picup_mrp=isset($_POST['picup_mrp'])?$_POST['picup_mrp']:$rs_br['picup_mrp'];
  $gst=isset($_POST['gst'])?$_POST['gst']:$rs_br['gst'];
  $shopping_status=isset($_POST['shopping_status'])?$_POST['shopping_status']:$rs_br['shopping_status']; 
  $descp=isset($_POST['descp'])?$_POST['descp']:$rs_br['descp'];   
  $discount=isset($_POST['discount'])?$_POST['discount']:$rs_br['discount'];
  $shipping_charge=isset($_POST['shipping_charge'])?$_POST['shipping_charge']:$rs_br['shipping_charge'];
  $qty=isset($_POST['qty'])?$_POST['qty']:$rs_br['qty'];

  if(isset($_POST['ok']))
  {
    $validator = new FormValidator();
    $validator->addValidation("cat_id","dontselect=0","Please provide Product Category");
    $validator->addValidation("product_name","req","Please provide Product Name");
    $validator->addValidation("amt","req","Please provide Product Amount");
    //$validator->addValidation("bv","req","Please provide Product BV");
    if($validator->ValidateForm())
    {  
        if($_FILES["myfile"]["type"]!="")
        {
            $fileinfo = @getimagesize($_FILES["myfile"]["tmp_name"]);
            $width = $fileinfo[0];
            $height = $fileinfo[1];
            
            $allowed_image_extension = array(
                "png",
                "jpg",
                "jpeg"
            );
            
            // Get image file extension
            $file_extension = pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION);
            
            // Validate file input to check if is not empty
            if (! file_exists($_FILES["myfile"]["tmp_name"])) {
                $validation_errors = "Choose image file to upload.";
            }// Validate file input to check if is with valid extension
            else if (! in_array($file_extension, $allowed_image_extension)) {
                $validation_errors = "Upload valiid images. Only PNG and JPEG are allowed.";
            }// Validate image file size
            else if (($_FILES["myfile"]["size"] > 2000000)) {
                $validation_errors = "Image size exceeds 2MB";
            }// Validate image file dimension
            
            else
            {
                $target="../upload/products/";
                $filename=basename($_FILES["myfile"]["name"]);
                $target.=$filename;
                $tm=time();
                $tmp_file=$_FILES["myfile"]["tmp_name"];
                // move_uploaded_file($tmp_file,$target);
                $image = new SimpleImage();
                $image->load($tmp_file);
                $image->resizeToWidth(500);
                $filname=$tm.$filename;
                $image->save($filname,'../upload/products/');
                
                $image->resizeToWidth(250);
                $image->save($filname,'../upload/products/thumb/');
            }
        }
        else
        {

          $fileinfo = @getimagesize('../upload/products/'.$rs_br['p_image']);
          $width = $fileinfo[0];
          $height = $fileinfo[1];
          //print_r($fileinfo);
            
          if ($width != 500 && $height != 500) {
            $validation_errors="Must upload a file of selected banner size";
          }

        	$filname=$rs_br['p_image'];
        }
         
        if(!isset($validation_errors))
        { 
           
        $sql="UPDATE `master_product` SET
        shipping_charge = '".iClean($conn,$shipping_charge)."',
        product_name='".iClean($conn,strtoupper($product_name))."',
        product_code='".iClean($conn,strtoupper($product_code))."',
        amt='".iClean($conn,$amt)."',
        discount='".iClean($conn,$discount)."',
        gst='".iClean($conn,$gst)."',
        fk_cid='".iClean($conn,$cat_id)."',
        bv='".iClean($conn,$bv)."',
        dp='".iClean($conn,$dp)."',
        
        shopping_status='".iClean($conn,$shopping_status)."',
        p_image='".$filname."',
        descp= '".iClean($conn,$descp)."'
        WHERE prod_id='".$uid."'"; 
        mysqli_query($conn,$sql)or die(mysqli_error($conn));

        if(!empty($_POST['qty'])&&($_POST['qty']!=$_POST['previous_qty']))
        {
          mysqli_query($conn,"UPDATE `master_product` SET qty = qty + '".$_POST['qty']."' WHERE prod_id='".$uid."'")or die(mysqli_error($conn));

          mysqli_query($conn,"INSERT INTO `master_product_qty` (`prod_id`,`added_from`,`current_qty`,`previous_qty`) VALUES ('".iClean($conn,$uid)."',
          '".iClean($conn,'stock')."', 
          '".iClean($conn,$_POST['qty'])."', 
          '".iClean($conn,$_POST['previous_qty'])."')")or die(mysqli_error($conn));
        }

        $msg="Product Updated Successfully";

        ?>
        <script type="text/javascript">
        location.href="MasterProduct.php?act=addnew";
        </script>
        <?php
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
  $result_con=mysqli_query($conn,"SELECT * FROM `master_product_category` WHERE pid=0 AND status=1");
  $cat="<select name=\"cat_id\" class=\"form-control\" required=\"required\">";
  while($row_con=mysqli_fetch_array($result_con))
  {
    if($cat_id==$row_con['cat_id']){$selected='selected';}else{$selected="";}
    $cat.='<option value="'.$row_con['cat_id'].'" style="font-weight:bold;" '.$selected.'>'.$row_con['category'].'</option>';

    $subresult_con=mysqli_query($conn,"SELECT * FROM `master_product_category` WHERE pid=".$row_con['cat_id']." AND status=1 ORDER BY category ASC ");

    while($subrow_con=mysqli_fetch_array($subresult_con)) {
      if($cat_id==$subrow_con['cat_id']){$selected='selected';}else{$selected="";}
      $cat.='<option value="'.$subrow_con['cat_id'].'" '.$selected.'> -- '.$subrow_con['category'].'</option>';
    }
    
    /*if($cat_id==$row_con['cat_id']){$selected='selected';}else{$selected="";}
      $cat.="\t<option value='".$row_con['cat_id']."' ".$selected.">".$row_con['category']."</option>\n";*/
    $selected="";
  }
  $cat.="</select>\n";
}

if($act=="stock")
{

  if(!empty($_GET['prod_id'])&&!empty($_GET['current_qty'])&&!empty($_GET['vendor_id'])&&!empty($_GET['previous_qty']))
  {
    mysqli_query($conn,"UPDATE `master_product` SET qty = qty + '".$_GET['current_qty']."' WHERE prod_id='".$_GET['prod_id']."'")or die(mysqli_error($conn));

    mysqli_query($conn,"INSERT INTO `master_product_qty` (`vendor_id`,`prod_id`,`added_from`,`current_qty`,`previous_qty`) VALUES (
      '".iClean($conn,$_GET['vendor_id'])."',
      '".iClean($conn,$_GET['prod_id'])."',
      '".iClean($conn,'stock')."', 
      '".iClean($conn,$_GET['current_qty'])."', 
      '".iClean($conn,$_GET['previous_qty'])."')")or die(mysqli_error($conn));

    $msg="Stock Added Successfully";

    ?>
    <script type="text/javascript">
    location.href="MasterProduct.php?act=addnew";
    </script>
    <?php
  }
  else
  {
    
  }

}

$v_con=mysqli_query($conn,"SELECT * FROM `vendors_profile` WHERE m_status=1");
$vendor="<select name=\"vendor_id\" class=\"form-control\" required=\"required\">";
$vendor.='<option value="">Select Vendor</option>';
while($vrow_con=mysqli_fetch_array($v_con))
{
  $vendor.='<option value="'.$vrow_con['id'].'">'.$vrow_con['m_company_name'].'</option>';
}
$vendor.="</select>\n";

if(isset($_POST['delete']))
{
    $uid=iClean($conn,$_POST['delete']);
    $rs=mysqli_fetch_array(mysqli_query($conn,"SELECT p_image FROM `master_product` WHERE `prod_id` = '".$uid."'"));
    $image="../upload/products/".$rs['p_image'];
    $thumb="../upload/products/thumb/".$rs['p_image'];
    @unlink($image);
    @unlink($thumb);
    mysqli_query($conn,"DELETE FROM `master_product` WHERE `prod_id`='".$uid."'") or die(mysqli_error($conn));
    ?>
    <script type="text/javascript">
    location.href="MasterProduct.php?act=addnew";
    </script>
    <?php
}
if((isset($_POST['set_status'])))
{
    $id=iClean($conn,$_POST['set_status']);
    $rs_del2=mysqli_fetch_array(mysqli_query($conn,"SELECT show_status FROM `master_product` WHERE prod_id='".$id."'"))or die(mysqli_error($conn));
    if($rs_del2['show_status']==0)
    {
    $val=1; 
    }
    if($rs_del2['show_status']==1)
    {
    $val=0;  
    }    
    $sql2="update `master_product` set
    show_status='".$val."'
    where prod_id='".$id."'"; 
    mysqli_query($conn,$sql2)or die(mysqli_error($conn));
}
$act=isset($_GET['act'])?$_GET['act']:'';
$search_text=isset($_GET['search_text'])?$_GET['search_text']:'';
$get = $_GET;
foreach($get as $key=>$value) { //assuming you cleaned & validated the $_POST into $post
if($value!='')
  switch($key)
  {
   case 'search_text':
    $serachText = mysql_real_escape_string($value);
    $wheres[]="product_name LIKE '%{$serachText}%' OR product_code LIKE '{$serachText}%'";
    break;
  }
}
if(empty($wheres)){$q = "";}
else
{
$q=implode('  AND ', $wheres);
$q=" WHERE ".$q;
}
###############  Start Paging Code ##########################
require_once("inc/class.pagination.php");
$page = 1; //default page
$per_page = 20; //rows per page
$full_sql = "SELECT * FROM `master_product` $q ORDER BY prod_id DESC";
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
<title><?php echo $label;?> Product Entry: <?php echo COMPANY?></title>
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
 <h4 class="mt-0 header-title"><?php echo $label;?> Product Entry</h4>
  <form method="POST" class="form-horizontal" enctype="multipart/form-data">
 <?php if(isset($validation_errors)){echo "<div class=\"alert alert-danger bg-danger text-white mb-0\">".$validation_errors."</div>";}?>
 <?php if(isset($msg)){echo "<div class=\"alert alert-danger bg-success text-white mb-0\">".$msg."</div>";}?><br />
  <br />
  <div class="form-body">

    <div class="row">
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput1">Product Category</label>
          <div class="col-md-9">
          <?php echo $cat;?> 
           </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput2">Product Code</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo $product_code;?>" name="product_code"  class="form-control" placeholder="Product Code" />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Product Name</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo $product_name;?>" name="product_name"  class="form-control" required="required"/>
          </div>
        </div>
      </div>
    </div>

    <!-- Comments -->  
    <div class="row">
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Price(MRP)</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo $amt;?>" name="amt"  class="form-control" required="required" />
          </div>
        </div>
      </div>  
      <div class="col-md-4">
        <div class="form-group row" >
          <label class="col-md-3 label-control" for="userinput4">DP Price</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo $dp;?>" name="dp"  class="form-control"/>
          </div>
      </div>
      </div>
      <div class="col-md-4">

          <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Product PV</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo $bv;?>" name="bv"  class="form-control" />
          </div>
        </div>

    </div>
   </div> 
    <!-- Comments --> 
    </div>
    <div class="row">

      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">GST</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo $gst;?>" name="gst"  class="form-control" />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Discount</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo $discount;?>" name="discount"  class="form-control" />
            (Discount add in % Value)
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Show Online</label>
          <div class="col-md-9">
            <input type="radio" value="1" name="shopping_status" required="required" checked="checked"  <?php if($shopping_status==1)echo "checked";?> /> Yes
            <input type="radio" value="0" name="shopping_status" required="required"  <?php if($shopping_status==0)echo "checked";?> /> No
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Quantity</label>
          <div class="col-md-9">
            <input type="number" min="<?php echo (isset($act)&&($act=="addnew"))?'1':'0'; ?>" minlength="1" name="qty" class="form-control" value="0"/>
            <?php echo (isset($act)&&($act=="addnew"))?'':'<span>Previous Quantity :: '.$qty.'</span>'; ?>
            <input type="hidden" name="previous_qty" value="<?php echo $qty; ?>"/>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="form-group row">
          <label class="col-md-2 label-control" for="userinput3">Description</label>
          <div class="col-md-10">
            <textarea name="descp" id="field" rows="10" cols="80" class="form-control"><?php echo $descp;?></textarea>
            <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'field' );
            </script>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-5">
        <div class="form-group row">
          <label class="col-md-2 label-control" for="userinput4">Product Image</label>
          <div class="col-md-10">
            <input type="file" name="myfile" /> 
            
            <?php
            if($act=='updt')
            {
            ?>
            <a href="../upload/products/<?php echo $rs_br['p_image']?>" target="_blank"><img src="../upload/products/<?php echo $rs_br['p_image']?>" style="width: 110px;"/></a>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      
    </div>

    <div class="form-actions text-right">
      <button type="submit" class="btn btn-primary" name="ok">
        <i class="mdi mdi-call-missed h6"></i> <?php echo $label;?>
      </button>
    </div>
  </div>
  
</form>  
</div>
</div>
</div>
</div>
</div>
 <div class="container-fluid">
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">
 <h4 class="mt-0 header-title">List PRODUCT </h4>
 <form class="form form-horizontal" name="frm" method="GET">
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <div class="col-md-12">
        <input type="text" id="userinput1" class="form-control border-primary" placeholder="Product Name or Code"
        name="search_text" value="<?php echo $search_text?>"/>
        <input type="hidden" name="act" value="<?php echo $act?>"/>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="form-group row">
     <div class="col-md-12">
        <button type="submit" class="btn btn-primary" name="save">
      <i class="la la-search"></i> Search
    </button>
      </div>
    </div>
  </div>
  </div>
  </form><br />
    <form method="POST" class="form-horizontal">   
    <div class="form-group row">
    <div class="col-sm-12">
        <div class="table-responsive">
    	<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
			<thead>
			<tr>
				<th style="width: 30px;">Sr.no</td>
                    <th>Product ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Price</th>
                    <th>Discount(%)</th>
                    <th>GST(%)</th>
                    <th>PV</th>
                    <th>DP</th> 
                    <th>Qty.</th>
                    <!-- <th>Pickup Price</th> -->
                    <th>Show Online</th>
                    <th>Image</th>
                <th style="width: 160px;">Action</th>
			</tr>
			</thead>
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
                $background="color: red;";
            } 
            ?>
            <tr style="<?php echo $background;?>">
                <td><?php echo $i;?></td>
                <td><?php echo $rs['prod_id']?></td>
                <td><?php echo $catname['category']?></td>
                <td><?php echo $rs['product_name']?></td>
                <td><?php echo $rs['product_code']?></td>
                <td><?php echo $rs['amt']?></td>
                <td><?php echo $rs['discount']?></td>
                <td><?php echo $rs['gst']?></td>
                <td><?php echo $rs['bv']?> </td> 
                <td><?php echo $rs['dp']?></td>
                <td><?php echo $rs['qty']?></td>
                <!-- <td><?php //echo $rs['picup_mrp']?></td> -->
                <td><?php if($rs['shopping_status']==1){ echo "Yes";}else{ echo "No";}?></td>
                <td><img src="../upload/products/<?php echo $rs['p_image']?>" style="height: 50px;"/></td>
                <td>
                <a class="btn btn-info btn-sm" href="<?php echo $_SERVER['PHP_SELF']."?uid=".$rs['prod_id']?>&act=updt"><i class="mdi mdi-grease-pencil h5"></i></a> &nbsp;
                <button type="submit" name="delete" value="<?php echo $rs['prod_id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"><i class="mdi mdi-delete-forever h5"></i></button>&nbsp; 
                <button type="submit" name="set_status" value="<?php echo $rs['prod_id']?>" class="<?php echo $class?>" onclick="return confirm('Are you sure you want to change status?')"><?php echo $icon?></button>  
                
                </td>
            </tr>
			<?php $i++;}  ?>
			</table>
            </div>
    </div>
    </div>
    <div class="form-group row">
    <div class="col-sm-12 pull-right">
        <?php echo $page_links; ?>     
    </div>
    </div>
    </form>
</div>
</div>
</div><!-- end col -->
</div><!-- end row -->
</div><!-- end container -->
</div>
                          
<?php include("inc/footer.php");?>
<?php include("inc/footerjs.php");?>


<script type="text/javascript">
function addChallan(id, name, previous_qty)
{
    //alert('add challan');
    $("#prod_id").val(id);
    $("#ch_prod").text(name);
    $("#previous_qty").val(previous_qty);

    /*if(type=='Scrap')
    {   
        $(".hidefield").hide();
        $("input[name=challan_no]").prop('required',false);
    }
    else
    {   
        $(".hidefield").show();
        $("input[name=challan_no]").prop('required',true);
    }*/

    $("#add-challan").modal('show');
}
</script>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="add-challan">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Add Stock [<span id="ch_prod"></span>]</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="GET" enctype="multipart/form-data">
        <input type="hidden" name="prod_id" id="prod_id" value="" required="">
        <input type="hidden" name="previous_qty" id="previous_qty" value="" required="">
        <input type="hidden" name="act" value="stock"/>
        <div class="modal-body">
          <div class="form-group hidefield">
            <?php echo $vendor;?> 
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <label for="quantity">Quantity</label>
              <input type="number" min="1" minlength="1" name="current_qty" placeholder="Enter Stock Quantity" required="" class="form-control">
            </div>
            <!-- <div class="form-group col-md-6">
              <label for="image">Upload Image</label>
              <input type="file" class="form-control1" id="files" name="image" required="" onchange="preview_image(event)"/> 
              <span>*<span class="selType">Upload Image</span> size not greater than 2 MB.</span>
              <img id="output_image" style="width: 60px;"/>
            </div> -->
          </div>
          <div class="form-group">
            <!-- <label for="remark">Remark</label>
            <textarea name="remark" class="form-control"></textarea> -->
          </div>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <button type="submit" class="btn btn-success">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div> 

</body>
</html>