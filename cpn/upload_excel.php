<?php
session_start();
require_once("inc/dbcn.php");
require_once("inc/iFunctions.php");
require_once("inc/req_authentication.php");
require_once("inc/formvalidator.php");


if(isset($_POST['ok']))
{
    //echo $_FILES['file']['type'];
 	$validator = new FormValidator();
   
    
    if($validator->ValidateForm())
 	 {
        $type = array('application/vnd.ms-excel','application/vnd.msexcel','application/vnd.xls','application/vnd.xlt','application/force-download');
        if(in_array($_FILES['file']['type'],$type)){
        #####################################
        $target_path = "import/"; 
        $filename = basename( $_FILES['file']['name']);
        $tm=time();
        $target_path=$target_path.date('d-m-Y',$tm)."-".$tm."-".$filename;
        
        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) 
        {
            $msg = "The file has been uploaded";
        } 
        else
        {
            $validation_errors = "There was an error uploading the file, please try again!";
        }
        } 
        else 
        {
          $validation_errors = "Invalid file type.";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Upload Product Excel: <?php echo COMPANY?></title>
<?php include("inc/common_head.php");?>
</head>
<body>
<div class="header-bg">
<?php include("inc/header.php");?>
</div>
 <div class="wrapper">
    <div class="container-fluid">
      					<div class="row ">
							<div class="col">
							<section class="card">
							<header class="card-header">
								<h2 class="card-title">Upload Data</h2>
							</header>
      	                     <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                            <?php if(isset($validation_errors)){echo "<div class=\"alert alert-danger\">".$validation_errors."</div>";}?>
                            <?php if(isset($msg)){echo "<div class=\"alert alert-success\">".$msg."</div>";}?><br />

							<div class="card-body">
                            <h3>Note: For best result import only 1000 records in a single batch. </h3>
                                        
                                        <div class="form-group row">
											<label class="col-sm-3 control-label text-sm-right pt-2">Upload File(.xls) <span class="required">*</span></label>
											<div class="col-sm-9">
												<input type="file" value="" name="file" size="30" class="input_text"  required=""/>
											</div>
										</div>
                                        
                                        <div class="form-group row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-4">
                                        <button type="submit" name="ok" class="btn btn-info">Upload</button> 
                                        
                                        </div>
                                        </div>
									</div>
                                    </form>
								</section>
							</div>
						</div>
 					<div class="row ">
							<div class="col">
							<section class="card">
							<header class="card-header">
								<h2 class="card-title">List File</h2>
							</header>
							<div class="card-body" style="min-height: 500px;">
                            
                            
                            
                            <div class="table-responsive">
        							<table class="table table-bordered table-striped mb-0" id="class_list">
        							    <thead>
		<tr>
            <th>Sr.No</th>
			<th>File Name</th>
            <th>Size</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
        <?php
        $i=1;
            $dir = "import/";
            $dh  = opendir($dir);
                        
            function readable_filesize($bytes, $decimals = 1) {
              $sz = 'BKMGTP';
              $factor = floor((strlen($bytes) - 1) / 3);
              return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
            }	
            while (false !== ($filename = readdir($dh))) {
            if($filename=="." || $filename==".."){
                continue;
            }

            $filePath  = $dir.$filename;
            if(file_exists($filePath)) {
              $fileSize = filesize($filePath);
              $fileSize = readable_filesize($fileSize);
            }  
            $ExplodeFilename = explode("-", $filename);

            ?>
		<tr tr_id="<?php echo $filename; ?>" id="row<?php echo $i; ?>">
            <td><?=$i;?></td>
            <td><?=$filename;?> </td>
            <td><?=$fileSize;?> </td>
            <td>
            &nbsp;&nbsp;
            <a href="import_excel.php?fileName=<?=$filename;?>&category=<?=$ExplodeFilename['0'];?>" target="_blank">
            <img src="images/b_import.png" title="Import File"/>
            </a>
            &nbsp;&nbsp;
            <a href="javascript:void(0);" onClick="deleteClass(this);">
            <img src="images/cross.png">
            </a>
            </td>
            
		</tr>
        <?php $i++;} ?>
	</tbody>
</table>
                                    </div>
                                    
                                   
									</div>
                                    
								</section>
							</div>
						</div>
    </div>
</div>        
<script>
function deleteClass(obj)
 {
	var v_id = $(obj).closest('tr').attr('tr_id');
	var confirmation = confirm("Do you want to delete");
	if(confirmation==true)
	{
		$.getJSON("set_ajax_functions.php?func=import_excel&action=delete&file_id="+v_id, function(data){
			if(data != '')
			{
				//alert(data);
                 $(obj).closest('tr').remove();
				
			}
		});
	}
 }

</script>           
<?php include("inc/footer.php");?>
<?php include("inc/footerjs.php");?>
</body>
</html>