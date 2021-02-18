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
  $client_id = isset($_REQUEST['client_id'])? iClean($conn,$_REQUEST['client_id']):'';
  $packages = isset($_POST['name'])? iClean($conn,$_POST['name']):'';
  $client_intro_id = isset($_POST['fr_code'])? iClean($conn,$_POST['fr_code']):'';
  //print_r($_POST);

  //$franchise = (!empty($_POST))?$_POST:array();
  
  $m_name=isset($_POST['m_name'])?$_POST['m_name']:'';
  $m_email=isset($_POST['m_email'])?$_POST['m_email']:'';
  $m_mobile=isset($_POST['m_mobile'])?$_POST['m_mobile']:'';
  $m_smobile=isset($_POST['m_smobile'])?$_POST['m_smobile']:'';
  $m_address=isset($_POST['m_address'])?$_POST['m_address']:'';
  $m_city=isset($_POST['m_city'])?$_POST['m_city']:'';
  $m_state=isset($_POST['m_state'])?$_POST['m_state']:'';
  $m_country=isset($_POST['m_country'])?$_POST['m_country']:'';
  $m_landmark=isset($_POST['m_landmark'])?$_POST['m_landmark']:'';
  $m_pin=isset($_POST['m_pin'])?$_POST['m_pin']:'';
  $m_bank=isset($_POST['m_bank'])?$_POST['m_bank']:'';
  $Acc_Holder=isset($_POST['Acc_Holder'])?$_POST['Acc_Holder']:'';
  $m_bank_branch=isset($_POST['m_bank_branch'])?$_POST['m_bank_branch']:'';
  $m_ac_no=isset($_POST['m_ac_no'])?$_POST['m_ac_no']:'';
  $ifsc_code=isset($_POST['ifsc_code'])?$_POST['ifsc_code']:'';
  $m_pan=isset($_POST['m_pan'])?$_POST['m_pan']:'';
  $dob=isset($_POST['dob'])?$_POST['dob']:'';
  $adhar_no=isset($_POST['adhar_no'])?$_POST['adhar_no']:'';
  $m_username=isset($_POST['m_username'])? iClean($conn,$_POST['m_username']):''; 
  $m_password=isset($_POST['m_password'])? iClean($conn,$_POST['m_password']):''; 
  $m_gstin=isset($_POST['m_gstin'])? iClean($conn,$_POST['m_gstin']):''; 
  //$newpass2=isset($_POST['newpass2'])? iClean($conn,$_POST['newpass2']):''; 

  //$mid = $this->db->query("SELECT max(fr_code) AS client_max_id FROM master_franchise ORDER BY id DESC LIMIT 1")->row_array();
  
 $q = mysqli_query($conn,"SELECT client_id FROM `master_franchise`  ORDER BY id DESC LIMIT 1");    
 $rs_ids = mysqli_fetch_array($q) ;  
 $srno = substr($rs_ids['client_id'],-6);
 $srno = $srno + 1;
 $srno = sprintf("%06d", $srno);
 $fr_code = "FR".$srno;
  
 

  if(isset($_POST['ok']))
  {
   	$validator = new FormValidator(); 
    //$validator->addValidation("client_intro_id","req","Please Provide Sponsor Franchise");

    $validator->addValidation("m_name","req","Please provide Full Name ");
    $validator->addValidation("m_mobile","req","Please provide contact number");
    $validator->addValidation("m_mobile","minlen=10","Mobile Minimum 10 Nos. required.");
    $validator->addValidation("m_mobile","maxlen=10","Mobile Maximum 10 Nos. allowed.");
    $validator->addValidation("m_address","req","Please provide Address");
    $validator->addValidation("m_city","req","Please provide City");
    $validator->addValidation("m_pin","req","Please provide Pin");
    $validator->addValidation("m_address","req","Please provide Address");
    $validator->addValidation("m_bank","req","Please provide Bank Name");
    $validator->addValidation("Acc_Holder","req","Please provide Account Holder Name");
    $validator->addValidation("m_bank_branch","req","Please provide Branch Name");
    $validator->addValidation("m_ac_no","req","Please provide Bank Account No");
    $validator->addValidation("ifsc_code","req","Please provide IFSC Code");
    //$validator->addValidation("adhar_no","req","Please provide Adhar No.");
    $validator->addValidation("m_pan","req","Please provide Pan No.");
    $validator->addValidation("m_username","req","Please provide username");
    $validator->addValidation("m_username","alnum_s","Invalid username Name");
    $validator->addValidation("m_username","minlen=6","Username Minimum 6 Characters required.");
    $validator->addValidation("m_username","maxlen=10","Username Maximum 10 Characters allowed.");
    $validator->addValidation("m_password","req","Please provide New Password");
    $validator->addValidation("m_password","minlen=6","Minimum 6 characters required in password.");
    $validator->addValidation("m_password","maxlen=20","Maximum 20 characters allowed in password.");
    //$validator->addValidation("bv","req","Please provide Product BV");
    if($validator->ValidateForm())
  	{
  	  if(mysqli_num_rows(mysqli_query($conn,"SELECT client_id FROM master_franchise WHERE m_username='".$m_username."'"))!=0){
        $validation_errors="Username already exists!";
      }
      else if (!preg_match('/^[a-z0-9]{5,19}$/',$m_username))
      {
          $validation_errors="Invalid username!";
      }
      /*elseif($client_intro_id==$client_id)
      {
          $validation_errors="Member and Sponsor ID should not be same!";
      }*/
      else
      {   
        
        if(empty($validation_errors))
        {
            if(($_FILES["file"]["type"]=="image/jpeg")||($_FILES["file"]["type"]=="image/jpeg")||($_FILES["file"]["type"]=="image/png"))
            {
                $target="../upload/franchise/";
                $tm=time();
                $filename=basename($_FILES["file"]["name"]);
                $target.=$filename;
                $tmp_file=$_FILES["file"]["tmp_name"];
                // move_uploaded_file($tmp_file,$target);
                $image = new SimpleImage();
                $image->load($tmp_file);
                $image->resizeToWidth(500);
                $filname=$tm.$filename;
                $image->save($filname,'../upload/franchise/');
            }  
            else
            {
                $filname='';
            }
            if(($_FILES["file1"]["type"]=="image/jpeg")||($_FILES["file1"]["type"]=="image/jpeg")||($_FILES["file1"]["type"]=="image/png"))
            {
                $target="../upload/franchise/";
                $tm=time();
                $filename1=basename($_FILES["file1"]["name"]);
                $target.=$filename1;
                $tmp_file=$_FILES["file1"]["tmp_name"];
                // move_uploaded_file($tmp_file,$target);
                $image = new SimpleImage();
                $image->load($tmp_file);
                $image->resizeToWidth(500);
                $filname1=$tm.$filename1;
                $image->save($filname1,'../upload/franchise/');
            }
            else
            {
                $filname1='';
            }  
            if(($_FILES["file2"]["type"]=="image/jpeg")||($_FILES["file2"]["type"]=="image/jpeg")||($_FILES["file2"]["type"]=="image/png"))
            {
                $target="../upload/franchise/";
                $tm=time();
                $filename2=basename($_FILES["file2"]["name"]);
                $target.=$filename2;
                $tmp_file=$_FILES["file2"]["tmp_name"];
                // move_uploaded_file($tmp_file,$target);
                $image = new SimpleImage();
                $image->load($tmp_file);
                $image->resizeToWidth(500);
                $filname2=$tm.$filename2;
                $image->save($filname2,'../upload/franchise/');
            }
            else
            {
                $filname2='';
            }
        }  

        if($dob==""){
          $dob = "";
        }else{
          $dob = iClean($conn,date('Y-m-d',strtotime($dob))); 
        }
          
        $client_name = $m_name;

        $per_sql="INSERT INTO master_franchise(type,fr_code, client_intro_id,client_id,client_name,m_username,m_password,m_name,m_mobile,m_email,m_address,m_city,m_state,m_pin,m_country,m_dob,m_bank,Acc_Holder, m_bank_branch,m_ac_no,ifsc_code,m_pan,adhar_no,m_gstin,photo,pan_img,gstn_img,join_date,m_smobile,m_landmark) VALUES 
        ('".$packages."','".$fr_code."', '".$client_intro_id."','".$fr_code."','".$client_name."','".$m_username."','".$m_password."','".$m_name."','".$m_mobile."','".$m_email."','".ucwords($m_address)."','".ucwords($m_city)."', '".$m_state."','".$m_pin."','".strtoupper($m_country)."','".$dob."','".iClean($conn,strtoupper($m_bank))."','".iClean($conn,strtoupper($Acc_Holder))."','".iClean($conn,strtoupper($m_bank_branch))."', '".iClean($conn,$m_ac_no)."','".iClean($conn,strtoupper($ifsc_code))."','".iClean($conn,strtoupper($m_pan))."','".iClean($conn,strtoupper($adhar_no))."', '".iClean($conn,strtoupper($m_gstin))."','".$filname."','".$filname1."','".$filname2."','".date('Y-m-d')."','".$m_smobile."','".$m_landmark."')";
        mysqli_query($conn,$per_sql) or die(mysqli_error($conn)); 

       
        $msg="Franchise form submit successfully";
        ?>
          <script type="text/javascript">
          location.href="list_franchise.php?act=addnew";
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
$result_con=mysqli_query($conn,"SELECT *  FROM `franchise_type`  ORDER BY tid ASC");
$package="<select name=\"name\" id=\"name\" class=\"form-control\"  required=\"\" >";
$package.="<option value=\"\">Franchise Type</option>\n";
while($row_con=mysqli_fetch_array($result_con))
{
if($packages==$row_con['name']){$selected='selected';}else{$selected="";}
$package.="\t<option value='".$row_con['name']."' ".$selected." >".$row_con['name']."-".$row_con['commission']."</option>\n";	
$selected="";
}

$package.="</select>\n";  

$result_con2=mysqli_query($conn,"SELECT *  FROM `master_franchise` WHERE status=1  ORDER BY id ASC");
$fr_name="<select name=\"fr_code\" id=\"fr_code\" class=\"form-control\"  required=\"\" >";
$fr_name.="<option value=\"\">Franchise Name</option>\n";
while($row_con=mysqli_fetch_array($result_con2))
{
if($client_intro_id==$row_con['fr_code']){$selected='selected';}else{$selected="";}
$fr_name.="\t<option value='".$row_con['fr_code']."' ".$selected." >".$row_con['fr_code']."-".$row_con['type']."%</option>\n";	
$selected="";
}

$fr_name.="</select>\n";
}
###############################
if($act=="updt")
{
  $label="Update";
  $uid=iClean($conn,$_GET['uid']);
  $franchise=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `master_franchise` WHERE id='".$uid."'"));

  $client_id = isset($_REQUEST['client_id'])? iClean($conn,$_REQUEST['client_id']):$franchise['client_id'];
  $client_intro_id = isset($_REQUEST['fr_code'])? iClean($conn,$_REQUEST['fr_code']):$franchise['client_intro_id'];
  $packages = isset($_POST['name'])? iClean($conn,$_POST['name']):$franchise['type'];
  
  
  $m_name=isset($_POST['m_name'])?$_POST['m_name']:$franchise['m_name'];
  $m_email=isset($_POST['m_email'])?$_POST['m_email']:$franchise['m_email'];
  $m_mobile=isset($_POST['m_mobile'])?$_POST['m_mobile']:$franchise['m_mobile'];
  $m_smobile=isset($_POST['m_smobile'])?$_POST['m_smobile']:$franchise['m_smobile'];
  $m_address=isset($_POST['m_address'])?$_POST['m_address']:$franchise['m_address'];
  $m_city=isset($_POST['m_city'])?$_POST['m_city']:$franchise['m_city'];
  $m_state=isset($_POST['m_state'])?$_POST['m_state']:$franchise['m_state'];
  $m_country=isset($_POST['m_country'])?$_POST['m_country']:$franchise['m_country'];
  $m_landmark=isset($_POST['m_landmark'])?$_POST['m_landmark']:$franchise['m_landmark'];
  $m_pin=isset($_POST['m_pin'])?$_POST['m_pin']:$franchise['m_pin'];
  $m_bank=isset($_POST['m_bank'])?$_POST['m_bank']:$franchise['m_bank'];
  $Acc_Holder=isset($_POST['Acc_Holder'])?$_POST['Acc_Holder']:$franchise['Acc_Holder'];
  $m_bank_branch=isset($_POST['m_bank_branch'])?$_POST['m_bank_branch']:$franchise['m_bank_branch'];
  $m_ac_no=isset($_POST['m_ac_no'])?$_POST['m_ac_no']:$franchise['m_ac_no'];
  $ifsc_code=isset($_POST['ifsc_code'])?$_POST['ifsc_code']:$franchise['ifsc_code'];
  $m_pan=isset($_POST['m_pan'])?$_POST['m_pan']:$franchise['m_pan'];
  $dob=isset($_POST['dob'])?$_POST['dob']:$franchise['m_dob'];
  $adhar_no=isset($_POST['adhar_no'])?$_POST['adhar_no']:$franchise['adhar_no'];
  $m_username=isset($_POST['m_username'])? iClean($conn,$_POST['m_username']):$franchise['m_username']; 
  $m_password=isset($_POST['m_password'])? iClean($conn,$_POST['m_password']):$franchise['m_password']; 
  $m_gstin=isset($_POST['m_gstin'])? iClean($conn,$_POST['m_gstin']):$franchise['m_gstin']; 
  //$newpass2=isset($_POST['newpass2'])? iClean($conn,$_POST['newpass2']):''; 

  if(isset($_POST['ok']))
  {
    $validator = new FormValidator(); 
    //$validator->addValidation("client_intro_id","req","Please Provide Sponsor Franchise");

    $validator->addValidation("m_name","req","Please provide Full Name ");
    $validator->addValidation("m_mobile","req","Please provide contact number");
    $validator->addValidation("m_mobile","minlen=10","Mobile Minimum 10 Nos. required.");
    $validator->addValidation("m_mobile","maxlen=10","Mobile Maximum 10 Nos. allowed.");
    $validator->addValidation("m_address","req","Please provide Address");
    $validator->addValidation("m_city","req","Please provide City");
    $validator->addValidation("m_pin","req","Please provide Pin");
    $validator->addValidation("m_address","req","Please provide Address");
    $validator->addValidation("m_bank","req","Please provide Bank Name");
    $validator->addValidation("Acc_Holder","req","Please provide Account Holder Name");
    $validator->addValidation("m_bank_branch","req","Please provide Branch Name");
    $validator->addValidation("m_ac_no","req","Please provide Bank Account No");
    $validator->addValidation("ifsc_code","req","Please provide IFSC Code");
    //$validator->addValidation("adhar_no","req","Please provide Adhar No.");
    $validator->addValidation("m_pan","req","Please provide Pan No.");
    /*$validator->addValidation("username","req","Please provide username");
    $validator->addValidation("username","alnum_s","Invalid username Name");
    $validator->addValidation("username","minlen=6","Username Minimum 6 Characters required.");
    $validator->addValidation("username","maxlen=10","Username Maximum 10 Characters allowed.");
    $validator->addValidation("newpass","req","Please provide New Password");
    $validator->addValidation("newpass","minlen=6","Minimum 6 characters required in password.");
    $validator->addValidation("newpass","maxlen=20","Maximum 20 characters allowed in password.");*/
    if($validator->ValidateForm())
    {
      /*if(mysqli_num_rows(mysqli_query($conn,"SELECT client_id FROM master_franchise WHERE m_username='".$username."'"))!=0){
        $validation_errors="Username already exists!";
      }
      else if (!preg_match('/^[a-z0-9]{5,19}$/',$username))
      {
        $validation_errors="Invalid username!";
      }
      elseif($client_intro_id==$client_id)
      {
          $validation_errors="Member and Sponsor ID should not be same!";
      }
      else
      {*/   
        
        if(empty($validation_errors))
        {  

          if($_FILES["file"]["type"]!="")
          {
            if(($_FILES["file"]["type"]=="image/jpeg")||($_FILES["file"]["type"]=="image/jpeg")||($_FILES["file"]["type"]=="image/png"))
            {
                $target="../upload/franchise/";
                $tm=time();
                $filename=basename($_FILES["file"]["name"]);
                $target.=$filename;
                $tmp_file=$_FILES["file"]["tmp_name"];
                // move_uploaded_file($tmp_file,$target);
                $image = new SimpleImage();
                $image->load($tmp_file);
                $image->resizeToWidth(500);
                $filname=$tm.$filename;
                $image->save($filname,'../upload/franchise/');
            }  
          }
          else
          {
            $filname=$franchise['photo'];
          }

          if($_FILES["file1"]["type"]!="")
          {
            if(($_FILES["file1"]["type"]=="image/jpeg")||($_FILES["file1"]["type"]=="image/jpeg")||($_FILES["file1"]["type"]=="image/png"))
            {
                $target="../upload/franchise/";
                $tm=time();
                $filename1=basename($_FILES["file1"]["name"]);
                $target.=$filename1;
                $tmp_file=$_FILES["file1"]["tmp_name"];
                // move_uploaded_file($tmp_file,$target);
                $image = new SimpleImage();
                $image->load($tmp_file);
                $image->resizeToWidth(500);
                $filname1=$tm.$filename1;
                $image->save($filname1,'../upload/franchise/');
            }
          }
          else
          {
            $filname1=$franchise['pan_img'];
          }  

          if($_FILES["file2"]["type"]!="")
          {
            if(($_FILES["file2"]["type"]=="image/jpeg")||($_FILES["file2"]["type"]=="image/jpeg")||($_FILES["file2"]["type"]=="image/png"))
            {
                $target="../upload/franchise/";
                $tm=time();
                $filename2=basename($_FILES["file2"]["name"]);
                $target.=$filename2;
                $tmp_file=$_FILES["file2"]["tmp_name"];
                // move_uploaded_file($tmp_file,$target);
                $image = new SimpleImage();
                $image->load($tmp_file);
                $image->resizeToWidth(500);
                $filname2=$tm.$filename2;
                $image->save($filname2,'../upload/franchise/');
            }
          }
          else
          {
            $filname2=$franchise['gstn_img'];
          }
           
          $sql="UPDATE `master_franchise` SET
          type='".iClean($conn,$packages)."',
          client_intro_id='".iClean($conn,$client_intro_id)."',
          m_name='".iClean($conn,$m_name)."',
          m_mobile='".iClean($conn,$m_mobile)."',
          m_email='".iClean($conn,$m_email)."',
          m_address='".iClean($conn,$m_address)."',
          m_city='".iClean($conn,$m_city)."',
          m_state='".iClean($conn,$m_state)."',
          m_pin='".iClean($conn,$m_pin)."',
          m_country='".iClean($conn,$m_country)."',
          m_bank='".iClean($conn,$m_bank)."',
          Acc_Holder='".iClean($conn,$Acc_Holder)."',
          m_bank_branch='".iClean($conn,$m_bank_branch)."',
          m_ac_no='".iClean($conn,$m_ac_no)."',
          ifsc_code='".iClean($conn,$ifsc_code)."',
          m_pan='".iClean($conn,$m_pan)."',
          adhar_no='".iClean($conn,$adhar_no)."',
          m_gstin='".iClean($conn,$m_gstin)."',
          m_smobile='".iClean($conn,$m_smobile)."',
          m_landmark='".iClean($conn,$m_landmark)."',
          photo='".$filname."',
          pan_img='".$filname1."',
          gstn_img='".$filname2."'
          WHERE id='".$uid."'"; 
          mysqli_query($conn,$sql)or die(mysqli_error($conn));

          $msg="Franchise Updated Successfully";

          ?>
          <script type="text/javascript">
          location.href="list_franchise.php?act=addnew";
          </script>
          <?php
        }
      /*}*/
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
$result_con=mysqli_query($conn,"SELECT *  FROM `franchise_type`  ORDER BY tid ASC");
$package="<select name=\"name\" id=\"name\" class=\"form-control\"  required=\"\" >";

while($row_con=mysqli_fetch_array($result_con))
{
if($packages==$row_con['name']){$selected='selected';}else{$selected="";}
$package.="\t<option value='".$row_con['name']."' ".$selected." >".$row_con['name']."-".$row_con['commission']."</option>\n";	
$selected="";
}

$package.="</select>\n";  

$result_con2=mysqli_query($conn,"SELECT *  FROM `master_franchise` WHERE status=1  ORDER BY id ASC");
$fr_name="<select name=\"fr_code\" id=\"fr_code\" class=\"form-control\"  required=\"\" >";

while($row_con=mysqli_fetch_array($result_con2))
{
if($client_intro_id==$row_con['fr_code']){$selected='selected';}else{$selected="";}
$fr_name.="\t<option value='".$row_con['fr_code']."' ".$selected." >".$row_con['fr_code']."-".$row_con['type']."%</option>\n";	
$selected="";
}

$fr_name.="</select>\n";
}

$v_con=mysqli_query($conn,"SELECT * FROM `states` WHERE 1");
$states="<select name=\"m_state\" class=\"form-control\" required=\"required\">";
$states.='<option value="">Select States</option>';
while($vrow_con=mysqli_fetch_array($v_con))
{
  if(!empty($franchise['m_state'])&&strtolower($franchise['m_state'])==strtolower($vrow_con['state'])){$selected='selected';}else{$selected="";}
  $states.='<option value="'.$vrow_con['state'].'" '.$selected.'>'.$vrow_con['state'].'</option>';
}
$states.="</select>\n";

if(isset($_POST['delete']))
{
    $uid=iClean($conn,$_POST['delete']);
    $rs=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `master_franchise` WHERE `id` = '".$uid."'"));
    $photo="../upload/franchise/".$rs['photo'];
    $pan_img="../upload/franchise/".$rs['pan_img'];
    $gstn_img="../upload/franchise/".$rs['gstn_img'];
    @unlink($photo);
    @unlink($pan_img);
    @unlink($gstn_img);
    mysqli_query($conn,"DELETE FROM `master_franchise` WHERE `id`='".$uid."'") or die(mysqli_error($conn));
    ?>
    <script type="text/javascript">
    location.href="list_franchise.php?act=addnew";
    </script>
    <?php
}
if((isset($_POST['set_status'])))
{
    $id=iClean($conn,$_POST['set_status']);
    $rs_del2=mysqli_fetch_array(mysqli_query($conn,"SELECT status FROM `master_franchise` WHERE id='".$id."'"))or die(mysqli_error($conn));
    if($rs_del2['status']==0)
    {
    $val=1; 
    }
    if($rs_del2['status']==1)
    {
    $val=0;  
    }    
    $sql2="update `master_franchise` set
    status='".$val."'
    where id='".$id."'"; 
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
    $wheres[]="fr_code LIKE '{$serachText}%' OR client_name LIKE '{$serachText}%'";
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
$full_sql = "SELECT * FROM `master_franchise` $q ORDER BY id DESC";
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
<title><?php echo $label;?> Franchise: <?php echo COMPANY?></title>
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
 <h4 class="mt-0 header-title"><?php echo $label;?> Franchise</h4>
  <form method="POST" class="form-horizontal" enctype="multipart/form-data">
 <?php if(isset($validation_errors)){echo "<div class=\"alert alert-danger bg-danger text-white mb-0\">".$validation_errors."</div>";}?>
 <?php if(isset($msg)){echo "<div class=\"alert alert-danger bg-success text-white mb-0\">".$msg."</div>";}?><br />
  <br />
  <div class="form-body" style="padding: 0 15px;">
    <div class="row">
    <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Franchise Type</label>
          <div class="col-md-9">

            <?php echo $package ?>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Select Franchise</label>
          <div class="col-md-9">
            <?php echo $fr_name?>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Franchise Code</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($franchise['fr_code']))?$franchise['fr_code']:''); ?>" class="form-control" readonly/>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Date of Request</label>
          <div class="col-md-9">
            <input type="date" value="<?php if(!empty($franchise['created_at'])){ echo date('Y-m-d',strtotime($franchise['created_at']));}?>" class="form-control" readonly maxlength = "10" min = "1" />
          </div>
        </div>
      </div>
      <div class="col-md-6" style="display: none;">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Sponsor Franchise Code</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($franchise['client_intro_id']))?$franchise['client_intro_id']:''); ?>" class="form-control" readonly/>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">User Name</label>
          <div class="col-md-9">
            <?php
            if($act=="addnew")
            {
            ?>
            <input type="text" value="<?php echo ((!empty($m_username))?$m_username:''); ?>" name="m_username" class="form-control" required="required"/>
            <?php
            }
            else
            {
            ?>
            <input type="text" value="<?php echo ((!empty($m_username))?$m_username:''); ?>" name="m_username" class="form-control" required="required" readonly/>
            <?php
            }
            ?>
            
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Password</label>
          <div class="col-md-9">
            <input type="text" value="" name="m_password" class="form-control"/>
          </div>
        </div>
      </div>
      <div class="col-md-6" style="display: none;">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4"></label>
          <div class="col-md-9">
            <input type="file" name="photo" onchange="preview_image(event)"/> 
            <img id="output_image" src="<?php echo '../upload/franchise/'.((!empty($franchise['photo']))?$franchise['photo']:'');?>" style="width: 60px;"/>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Full Name</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_name))?$m_name:''); ?>" name="m_name"  class="form-control"/>
            <input type="hidden" name="m_father_name" value="<?php echo ((!empty($franchise['m_father_name']))?$franchise['m_father_name']:''); ?>">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Email</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_email))?$m_email:'');?>" name="m_email"  class="form-control" />
          </div>
        </div>
      </div> 
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Mobile</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_mobile))?$m_mobile:'');?>" name="m_mobile"  class="form-control" />
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Secondary Mobile</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_smobile))?$m_smobile:'');?>" name="m_smobile"  class="form-control" />
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row" style="display: none;">
          <label class="col-md-3 label-control" for="userinput4">DOB</label>
          <div class="col-md-9">
            <input type="date" value="<?php if(!empty($franchise['m_dob'])){ echo date('Y-m-d',strtotime($franchise['m_dob']));}?>" name="m_dob"  class="form-control" maxlength = "10" min = "1" />
          </div>
        </div>
        
      </div>
      
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Address</label>
          <div class="col-md-9">
            <textarea name="m_address" class="form-control"><?php echo ((!empty($m_address))?$m_address:''); ?></textarea>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Landmark</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_landmark))?$m_landmark:''); ?>" name="m_landmark"  class="form-control"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row" style="display: none;">
          <label class="col-md-3 label-control" for="userinput4">District</label>
          <div class="col-md-9">
            <input type="text" value="" name="district"  class="form-control"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">City</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_city))?$m_city:''); ?>" name="m_city"  class="form-control" required="required"/>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">State</label>
          <div class="col-md-9">
            <?php echo $states;?>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Country</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_country))?$m_country:'INDIA'); ?>" name="m_country"  class="form-control"/>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Pin</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_pin))?$m_pin:''); ?>" name="m_pin"  class="form-control"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
      </div>
    </div>


    <!-- <h2>Nominee Detail </h2>
    <hr> -->
    
    <div class="row" style="display: none;">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Nominee Name</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($franchise['nominee']))?$franchise['nominee']:''); ?>" name="nominee"  class="form-control" />
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Nominee Age</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($franchise['nominee_age']))?$franchise['nominee_age']:''); ?>" name="nominee_age"  class="form-control" />
          </div>
        </div>
      </div>
    </div>

    <div class="row" style="display: none;">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Relation</label>
          <div class="col-md-9">
            <?php $nominee_relation = $franchise['nominee_relation']; ?>
            <select name="nominee_relation" class="form-control">
              <option selected="0">Select Relation</option>  
              <option value="Father"  <?php if($nominee_relation=='Father')echo "selected";?>>Father</option>
              <option value="Mother" <?php if($nominee_relation=='Mother')echo "selected";?>>Mother</option>
              <option value="Husband" <?php if($nominee_relation=='Husband')echo "selected";?>>Husband</option>
              <option value="Wife" <?php if($nominee_relation=='Wife')echo "selected";?>>Wife</option>
              <option value="Son" <?php if($nominee_relation=='Son')echo "selected";?>>Son</option>
              <option value="Daughter" <?php if($nominee_relation=='Daughter')echo "selected";?>>Daughter</option>
              <option value="Brother" <?php if($nominee_relation=='Brother')echo "selected";?>>Brother</option>
              <option value="Sister" <?php if($nominee_relation=='Sister')echo "selected";?>>Sister</option>
              <option value="Nephew" <?php if($nominee_relation=='Nephew')echo "selected";?>>Nephew</option>
              <option value="Cousin" <?php if($nominee_relation=='Cousin')echo "selected";?>>Cousin</option>
            </select>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Mobile</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($franchise['nominee_number']))?$franchise['nominee_number']:''); ?>" name="nominee_number"  class="form-control" />
          </div>
        </div>
      </div>
    </div>

    <br>
    <h5>Bank Detail </h5>
    <hr>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Bank Details<span class="note">*</span></label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_bank))?$m_bank:''); ?>" name="m_bank"  class="form-control" required="required"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Account Holder Name<span class="note">*</span></label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($Acc_Holder))?$Acc_Holder:''); ?>" name="Acc_Holder"  class="form-control" required="required"/>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Branch Name<span class="note">*</span></label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_bank_branch))?$m_bank_branch:''); ?>" name="m_bank_branch"  class="form-control" required="required"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Bank Account No<span class="note">*</span></label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_ac_no))?$m_ac_no:''); ?>" name="m_ac_no"  class="form-control" required="required"/>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">IFSC Code<span class="note">*</span></label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($ifsc_code))?$ifsc_code:''); ?>" name="ifsc_code"  class="form-control" required="required"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Pan No</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_pan))?$m_pan:''); ?>" name="m_pan"  class="form-control" required="required"/>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6" style="display: none;">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput4">Adhar No</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($adhar_no))?$adhar_no:''); ?>" name="adhar_no"  class="form-control"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">GSTIN Number</label>
          <div class="col-md-9">
            <input type="text" value="<?php echo ((!empty($m_gstin))?$m_gstin:''); ?>" name="m_gstin" class="form-control" required="required"/>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control" for="userinput3">Remark</label>
          <div class="col-md-9">
            <textarea name="remark" class="form-control"><?php echo ((!empty($franchise['remark']))?$franchise['remark']:''); ?></textarea>
          </div>
        </div>
      </div>


      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control">Franchise Logo/Image</label>
          <div class="col-md-9">
            <input type="file" name="file" onchange="preview_image1(event);" /> 
            <img id="output_image1" src="<?php echo '../upload/franchise/'.((!empty($franchise['photo']))?$franchise['photo']:'');?>" style="width: 60px;"/>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control">Pan Scan Copy</label>
          <div class="col-md-9">
            <input type="file" name="file1" onchange="preview_image2(event);" /> 
            <img id="output_image2" src="<?php echo '../upload/franchise/'.((!empty($franchise['pan_img']))?$franchise['pan_img']:'');?>" style="width: 60px;"/>
          </div>
        </div>
      </div>

     <div class="col-md-6">
        <div class="form-group row">
          <label class="col-md-3 label-control">Upload GST Scan Copy</label>
          <div class="col-md-9">
            <input type="file" name="file2" onchange="preview_image3(event);" />  
            <img id="output_image3" src="<?php echo '../upload/franchise/'.((!empty($franchise['gstn_img']))?$franchise['gstn_img']:'');?>" style="width: 60px;"/>
          </div>
        </div>
      </div>

    </div>






    <!-- </div> -->

    <div style="display: none;">
      <br>
      <h5>PAYTM Details</h5>
      <hr>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput4">PAYTM Name</label>
            <div class="col-md-9">
              <input type="text" value="<?php echo ((!empty($franchise['paytm_name']))?$franchise['paytm_name']:''); ?>" name="paytm_name"  class="form-control"/>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput3">PAYTM Mobile No</label>
            <div class="col-md-9">
              <input type="text" value="<?php echo ((!empty($franchise['paytm_mobile']))?$franchise['paytm_mobile']:''); ?>" name="paytm_mobile"  class="form-control" />
            </div>
          </div>
        </div>
      </div>

      <br>
      <h5>Google Pay Details</h5>
      <hr>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput4">Google Pay Name</label>
            <div class="col-md-9">
              <input type="text" value="<?php echo ((!empty($franchise['gpay_name']))?$franchise['gpay_name']:''); ?>" name="gpay_name"  class="form-control"/>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-md-3 label-control" for="userinput3">Google Pay Mobile No</label>
            <div class="col-md-9">
              <input type="text" value="<?php echo ((!empty($franchise['gpay_mobile']))?$franchise['gpay_mobile']:''); ?>" name="gpay_mobile"  class="form-control" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- gdsfgds gdfgdfsgdgd -->
  

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
 <h4 class="mt-0 header-title">List Franchise </h4>
 <form class="form form-horizontal" name="frm" method="GET">
<div class="row">
  <div class="col-md-6">
    <div class="form-group row">
      <div class="col-md-12">
        <input type="text" id="userinput1" class="form-control border-primary" placeholder="Fr. Name or Code"
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
        <th>S.no</th>
        <th>Image</th>
        
        <th>Franchise Name</th>
        <th>Type</th>
        <th>Sponsor</th>
        <th>Username</th>
        <th>Password</th>
        <th>Address</th>
        <!-- <th>City</th>
        <th>State</th>
        <th>Pin</th> -->
        <th>Mobile</th>
        <th>Email</th>
        <th>Pan</th>
        <th>GST No.</th>
        <th>Status</th>

			</tr>
			</thead>
			<?php 
			$i=1;
			while($rs=mysqli_fetch_array($rsd)){
        if($rs['status']==1){
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
				<td><?php echo $i;?>
                <a class="btn btn-info btn-sm" href="<?php echo $_SERVER['PHP_SELF']."?uid=".$rs['id']?>&act=updt"><i class="mdi mdi-grease-pencil h5"></i></a> &nbsp;
                <button type="submit" name="delete" value="<?php echo $rs['id']?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')"><i class="mdi mdi-delete-forever h5"></i></button>&nbsp; 
                <button type="submit" name="set_status" value="<?php echo $rs['id']?>" class="<?php echo $class?>" onclick="return confirm('Are you sure you want to change status?')"><?php echo $icon?></button>  

                </td>
        <th><img width="60px" src="<?php echo ((!empty($rs['photo']))?'../upload/franchise/'.$rs['photo']:'Not available');?>"></th>
        <td><?php echo $rs['m_name'].'('.$rs['fr_code'].')'?></td>
        <td><?php echo $rs['type']?></td>
        <td><?php echo $rs['client_intro_id']?></td>
        <td><?php echo $rs['m_username']?></td>
        <td><?php echo $rs['m_password']?></td>
        <td><?php echo $rs['m_address']?>, <?php echo $rs['m_city']?>, <?php echo $rs['m_state']?>, <?php echo $rs['m_pin']?></td>
        <td><?php echo $rs['m_mobile']?></td>
        <td><?php echo $rs['m_email']?> </td>
        <td><?php echo $rs['m_pan']?> <a href="<?php echo '../upload/franchise/'.((!empty($rs['pan_img']))?$rs['pan_img']:'');?>" target="_blank">View Pan</a></td> 
        <td><?php echo $rs['m_gstin']?> <a href="<?php echo '../upload/franchise/'.((!empty($rs['gstn_img']))?$rs['gstn_img']:'');?>" target="_blank">View Pan</a></td> 
        <td><?php if($rs['status']==1){ echo "Yes";}else{ echo "No";}?></td>
        
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


<script type='text/javascript'>
function preview_image1(event) 
{
  var reader = new FileReader();
  reader.onload = function()
  {
    var output = document.getElementById('output_image1');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}

function preview_image2(event) 
{
  var reader = new FileReader();
  reader.onload = function()
  {
    var output = document.getElementById('output_image2');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}

function preview_image3(event) 
{
  var reader = new FileReader();
  reader.onload = function()
  {
    var output = document.getElementById('output_image3');
    output.src = reader.result;
  }
  reader.readAsDataURL(event.target.files[0]);
}
</script>

</body>
</html>

