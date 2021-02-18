<?php
session_start();
require('inc/dbcn.php');
require('inc/iFunctions.php');
require('inc/req_authentication.php');
require_once("inc/formvalidator.php"); 
date_default_timezone_set('Asia/Calcutta');
function gen_ctrn($conn)
{
	$shu_ctrn=str_shuffle("01234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789012345678901234567890123456789");
	$shu_ctrn=substr($shu_ctrn,1,6);
	return $shu_ctrn; 
}

$subject=isset($_POST['subject'])?iClean($conn,$_POST['subject']):'';
$msg=isset($_POST['msg'])?iClean($conn,$_POST['msg']):'';
$lRecord = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `mail_communication`  WHERE stu_id = '".$acc_profile['id']."' ORDER BY add_date DESC LIMIT 1"));
$next_date = strtotime(date("Y-m-d", strtotime($lRecord['add_date'])) . " +3 day");
$next_date=date('Y-m-d',$next_date);
$msg = str_replace(["\r\n", "\r", "\n"], "<br/>", $msg);
if((isset($_POST['submit'])))
{
 	$validator = new FormValidator();
    $validator->addValidation("subject","req","Please Provide Subject ");
    $validator->addValidation("msg","req","Please Provide Message");
      if($validator->ValidateForm())
    	{
  	     $Qno=gen_ctrn($conn);
     	 $sql_up="insert into mail_communication(query_no,stu_id,admin_id,head_title,comm_msg,image,add_date,status) 
          values
          ('".$Qno."','".$acc_profile['id']."','0','".iClean($conn,$subject)."','".nl2br($msg)."','','".date('Y-m-d H:i:s')."','0')";
    	   mysqli_query($conn,$sql_up) or die(mysqli_error($conn));    
    	  $msg1="Query Send Successfully";
            
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
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Generate Ticket: <?php echo COMPANY;?></title>
    <?php include("inc/common_head.php");?>
    <script language=JavaScript>
    <!--
    function check_length(my_form)
    {
    maxLen = 100;
    if (my_form.msg.value.length >= maxLen) {
    var msg = "You have reached your maximum limit of characters allowed";
    alert(msg);
    my_form.msg.value = my_form.msg.value.substring(0, maxLen);
    }
    else{
    my_form.text_num.value = maxLen - my_form.msg.value.length;
    }
    }
    </script>
    <script>
    function maxLengthCheck(object)
    {
    if (object.value.length > object.maxLength)
    object.value = object.value.slice(0, object.maxLength)
    }
    </script>
</head>
<body class="theme-red">
    <?php include("inc/header.php");?>
    <section>
    <?php include("inc/left.php");?>
    <?php include("inc/right.php");?>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Generate Ticket</h2>
            </div>
            <div class="row clearfix">
               <div class="col-xs-12 col-sm-3">
                <div class="card card-about-me">
                <div class="header">
                    <a href="gen_ticket.php" class="btn btn-primary btn-block margin-bottom">Compose Mail</a>
                </div>
                <div >
                   <div class="box-body no-padding">
                      <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="ticket_dashboard.php"><i class="fa fa-inbox"></i> Mailbox </a></li>
                      </ul>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card card-about-me">
                <div class="header">
                    <h2>Compose New Message</h2>
                </div>
                <div class="body">
                  <form name="frm1" method="POST" >
                      <?php if(isset($validation_errors)){echo "<div class=\"alert alert-danger\">".$validation_errors."</div>";}?>
                        <?php if(isset($msg1)){echo "<div class=\"alert alert-success\">".$msg1."</div>";}?>                                   
                    <label for="email_address">Subject</label>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="subject" id="subject" class="form-control" required=""/>
                        </div>
                    </div>
                    <label for="password">Message</label>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea name="msg" id="compose-textarea" onKeyPress="check_length(this.form); onKeyDown=check_length(this.form)"; class="form-control" style="width: 98%;height: 100px;"></textarea>
                            <input size=1 value=100 name=text_num style="width: 30px;" readonly="readonly"/> Characters Left

                        </div>
                    </div>

                    <br>
                    <button type="submit" name="submit" value="Send" class="btn btn-primary m-t-15 waves-effect">Submit</button>                                
                </form>
            </div>
            </div>
        </div>
    </section>
    <?php include("inc/footerjs.php");?>
</body>
</html>
