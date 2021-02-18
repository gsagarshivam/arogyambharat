<?php
session_start();
require_once("inc/dbcn.php");
require_once("inc/iFunctions.php");
require_once("inc/req_authentication.php");
require_once("inc/formvalidator.php");
ini_set('max_execution_time',30000);


if(isset($_GET['fileName'])){$fileName = "import/".$_GET['fileName']; }else{exit;}

$fileName = $fileName;


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Upload Attendence Data : <?=COMPANY;?></title>
<META name="Description" content="">
<META name="Keywords" content="">
<meta name="author" content="Omji Kesharwani">
<?php require('inc/common_head.php'); ?>

<link rel="stylesheet" href="css/bootstrap.css"  media="screen">

</head>
<body>
<div class="wrapper">

	<div class="content">
	<!-- Start Content -->
    <?php
require_once 'inc/excel_reader.php';
$data = new Spreadsheet_Excel_Reader($fileName);
echo "<h3>Total Sheets in this xls file: ".count($data->sheets)."</h3>";
$html="";
for($i=0;$i<count($data->sheets);$i++) // Loop to get all sheets in a file.
{	
	if(count($data->sheets[$i][cells])>0) // checking sheet not empty
	{
		echo "<h3> Total rows in Sheet ".($i+1).": ".count($data->sheets[$i][cells])."</h3>";
		for($j=1;$j<=count($data->sheets[$i][cells]);$j++) // loop used to get each row of the sheet
		{ 

            $html.="<tr>";
			for($k=1;$k<=9;$k++) // This loop is created to get data in a table format.
			{
				$html.="<td>";
				$html.=$data->sheets[$i][cells][$j][$k];
				$html.="</td>";
			}
            $id = iClean($conn,(trim($data->sheets[$i][cells][$j][1])));
            $name = iClean($conn,(trim($data->sheets[$i][cells][$j][2])));
            $code = iClean($conn,(trim($data->sheets[$i][cells][$j][3])));
            $price = iClean($conn,(trim($data->sheets[$i][cells][$j][4])));
            $dp = iClean($conn,(trim($data->sheets[$i][cells][$j][5])));
            $bv = iClean($conn,(trim($data->sheets[$i][cells][$j][6])));
            $gst = iClean($conn,(trim($data->sheets[$i][cells][$j][7])));
            $qty = iClean($conn,(trim($data->sheets[$i][cells][$j][8])));
            $descp = iClean($conn,(trim($data->sheets[$i][cells][$j][9])));

            if($j>1){
                
            if(($id!="") && ($id>0)){
            $numFound = mysqli_query($conn,"SELECT prod_id FROM `master_product` WHERE product_code='".$code."' ");
            if(mysqli_num_rows($numFound)==0){
			$queryStudentDetail = "insert into master_product(fk_cid,product_name,product_code,amt,qty,gst,descp,add_date,upload_by,bv,dp,shopping_status,show_status) 
            values('".$id."','".$name."','".$code."','".$price."','".$qty."','".$gst."','".$descp."','".date('Y-m-d')."','Excel','".$bv."','".$dp."',1,1)";
            }
            else
            {
                
            $numFoundSno = mysqli_fetch_array($numFound);
			$queryStudentDetail = "UPDATE master_product SET 
            fk_cid = '".$id."', 
            product_name = '".$name."', 
            product_code = '".$code."', 
            amt = '".$price."', 
            qty = '".$qty."', 
            dp = '".$dp."', 
            bv = '".$bv."', 
            gst = '".$gst."', 
            descp = '".$descp."'   
            WHERE product_code='".$code."'";
            }

            $resultqueryStudentDetail = mysqli_query($conn,$queryStudentDetail);
            if (!$resultqueryStudentDetail) {
                    echo "<div class=\"round alert alert-alert\" style=\"100%;text-align:center\">Error: Record no. ".$j."</div>";
                }
            }
                
            }

			$html.="</tr>";
		}
	}

}
echo "<div class=\"round alert alert-success\" style=\"100%;text-align:center\">Record Imported</div>";
?>
    <table id="class_list" class="header table table-bordered table-striped">  
    	<tbody>
    	<?=$html;?>
    	</tbody>
    </table>
	</div>
<!-- End Content -->
	</div>

</div>

</body>
</html>