<?php
session_start();
require_once("inc/dbcn.php");
require_once("inc/iFunctions.php");
require_once("inc/req_authentication.php");
require_once("inc/formvalidator.php");
include('inc/SimpleImage.php');
if($_GET['act']=="addnew")
{
    $label="Add";
    $category=isset($_POST['category'])?$_POST['category']:'';

if(isset($_POST['ok']))
{
 	$validator = new FormValidator();
    $validator->addValidation("category","req","Please provide category name");
    if($validator->ValidateForm())
    	{
    	  if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `master_product_category` WHERE category = '".iClean($conn,strtoupper($category))."'"))==0)
          { 
    	  mysqli_query($conn,"INSERT INTO `master_product_category` (`category`)
	       VALUES (
           '".iClean($conn,strtoupper($category))."')")or die(mysqli_error($conn));
	       $msg="Category Added Successfully";
          }
          else
          {
            $validation_errors = "Category already exist!";
          }
    }
    else
    {
        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
           $validation_errors .= "<p>$inp_err</p>\n";
        }        
    }
}

}
###############################
if($_GET['act']=="updt")
{
$label="Update";
$uid=iClean($conn,$_GET['uid']);
$rs_br=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `master_product_category` WHERE cat_id='".$uid."'"));
$category=isset($_POST['category'])?$_POST['category']:$rs_br['category'];
if(isset($_POST['ok']))
    {
    $validator = new FormValidator();
    $validator->addValidation("category","req","Please provide Category");
    if($validator->ValidateForm())
    	{
    	$sql="update `master_product_category` set
        category='".iClean($conn,strtoupper($category))."'
        where cat_id='".$uid."'"; 
           mysqli_query($conn,$sql)or die(mysqli_error($conn));
          $msg="Category Updated Successfully";
    }
    else
    {
        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
           $validation_errors .= "<p>$inp_err</p>\n";
        }        
    }


    }
}
if(isset($_POST['delete']))
{
    $uid=iClean($conn,$_POST['delete']);
    $rs=mysqli_fetch_array(mysqli_query($conn,"SELECT status FROM `master_product_category` WHERE `cat_id` = '".$uid."'"));
    if($rs['status']==0)
    {
        $val=1;
    }
    else
    {
      $val=0;  
    }
    $sql="update `master_product_category` set
    status='".$val."'
    where cat_id='".$uid."'"; 
    mysqli_query($conn,$sql)or die(mysqli_error($conn));
    ?>
    <script type="text/javascript">
    location.href="category.php?act=addnew";
    </script>
    <?php
}
###############  Start Paging Code ##########################
require_once("inc/class.pagination.php");
$page = 1; //default page
$per_page = 20; //rows per page
$full_sql = "SELECT * FROM `master_product_category` ORDER BY cat_id DESC";
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
 <h4 class="mt-0 header-title"><?php echo $label;?> Product Category</h4>
 <form method="POST" class="form-horizontal" enctype="multipart/form-data">
 <?php if(isset($validation_errors)){echo "<div class=\"alert alert-danger bg-danger text-white mb-0\">".$validation_errors."</div>";}?>
 <?php if(isset($msg)){echo "<div class=\"alert alert-danger bg-success text-white mb-0\">".$msg."</div>";}?><br />
 <br />
 <div class="form-group row">
 <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
 <div class="col-sm-5">
  <input type="text" value="<?php echo $category;?>" name="category"  class="form-control" placeholder="Category Name" required="required"/>
 </div>
 </div>
 <div class="form-group row">
 <label for="example-text-input" class="col-sm-2 col-form-label"></label>
 <div class="col-sm-10">
    <button type="submit" name="ok" class="btn btn-primary waves-effect waves-light"><?php echo $label;?></button> 
 </div>
 </div>
 </form>
</div>
</div>
</div><!-- end col -->
</div><!-- end row -->
</div><!-- end container -->
 <div class="container-fluid">
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">
 <h4 class="mt-0 header-title">List Category</h4>
    <form method="POST" class="form-horizontal">   
    <div class="form-group row">
    <div class="col-sm-12">
        <div class="table-responsive">
    	<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
			<thead>
			<tr>
				<th style="width: 30px;">Sr.no</td>
                <th>ID</th>
                <th>Category</th>
				<th style="width: 150px;">Action</th>
			</tr>
			</thead>
			<?php 
			$i=1;
			while($rs=mysqli_fetch_array($rsd)){
			if($rs['status']==1)
            {
                $class = "btn btn-success btn-sm";
                $icon = "<i class=\"mdi mdi-account-check h5\"></i>";
                $background = "";
            } 
            else
            {
                $class = "btn btn-warning btn-sm";
                $icon = "<i class=\"mdi mdi-account-multiple-minus h5\"></i>";
                $background="color: red;";
            }  
            ?>
			<tr style="<?php echo $background;?>">
				<td ><?php echo $i;?></td>
                <td><?php echo $rs['cat_id']?></td>
				<td><?php echo $rs['category']?></td>
                <td>
                <a class="btn btn-info btn-sm" href="<?php echo $_SERVER['PHP_SELF']."?uid=".$rs['cat_id']?>&act=updt"><i class="mdi mdi-grease-pencil h5"></i></a> &nbsp;
                <button type="submit" name="delete" value="<?php echo $rs['cat_id']?>" class="<?php echo $class?>" onclick="return confirm('Are you sure you want to change status?')"><?php echo $icon?></button> &nbsp; 
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
</body>
</html>