<?php
session_start();
require('inc/dbcn.php');
require('inc/iFunctions.php');
require('inc/req_authentication.php');
$mailIds = iClean($conn,$_GET['query']);
$query = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `mail_communication` WHERE query_no='".$mailIds."'"));  
$mailId = $query['mail_id'];
    
$subject=isset($_POST['subject'])?iClean($conn,$_POST['subject']):'';
$msg=isset($_POST['msg'])?iClean($conn,$_POST['msg']):'';
$lRecord = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `mail_communication`  WHERE  stu_id = '".$acc_profile['id']."' ORDER BY add_date DESC LIMIT 1"));
$next_date = strtotime(date("Y-m-d", strtotime($lRecord['add_date'])) . " +3 day");
$next_date=date('Y-m-d',$next_date);

$lRecord2 = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `mail_conversation`  WHERE  stu_id = '".$acc_profile['id']."' ORDER BY date DESC LIMIT 1"));
$next_date2 = strtotime(date("Y-m-d", strtotime($lRecord2['date'])) . " +3 day");
$next_date2=date('Y-m-d',$next_date2);
$msg = str_replace(["\r\n", "\r", "\n"], "<br/>", $msg);
if((isset($_POST['submit'])))
{
 	$validator = new FormValidator();
    $validator->addValidation("subject","dontselect=0","Please Select Subject ");
    $validator->addValidation("msg","req","Please Provide Message");
      if($validator->ValidateForm())
    	{
        	 if(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `mail_conversation` WHERE stu_id = '".$acc_profile['id']."'"))=='0')
             {
                    $sql_up="insert into mail_conversation(mail_id,stu_id,reply_by,msg,date) 
                    values
                    ('".$mailId."','".$acc_profile['id']."','".$formID."','".nl2br($msg)."','".date('Y-m-d H:i:s')."')";
                    mysql_query($sql_up) or die(mysqli_error($conn));    
                    $msg1="Reply Send Successfully";
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
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Read Mail: <?php echo COMPANY;?></title>
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
            <div class="block-header">
                <h2>Read Mail</h2>
            </div>
            <div class="row clearfix">

            <div class="col-xs-12 col-sm-12">
                   <?php if(isset($validation_errors)){echo "<div class=\"alert alert-danger\">".$validation_errors."</div>";}?>
                <?php if(isset($msg1)){echo "<div class=\"alert alert-success\">".$msg1."</div>";}?>
 
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Subject: <?php echo $query['head_title'];?></h3>
                  <div class="box-tools pull-right">
                    <?php echo date('d-m-Y H:i:s A',strtotime($query['entry_time']))?>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <div class="mailbox-read-info">
                  <?php echo nl2br($query['comm_msg']);?>
                    
                  </div>
                  
                <div class="box-body">
                <div class="direct-chat-messages">
                    <?php 
                    $conv =mysqli_query($conn,"SELECT * FROM `mail_conversation` WHERE query_no = '".$query['query_no']."' AND final_status!='0' ORDER BY con_id ASC");
                    if(mysqli_num_rows($conv)!='0')
                    {
                    while($rsCon = mysqli_fetch_array($conv))
                    {
                    if($rsCon['reply_by']!='0')
                    {    
                    ?>
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-right"><?php echo date('d-m-Y H:i:s A',strtotime($rsCon['entry_time']))?></span>
                      </div>
                      <img class="direct-chat-img" src="img/admin.png" alt="message admin image"/>
                      <div class="direct-chat-text">
                        <?php echo nl2br($rsCon['msg']);?>
                        
                      </div>
                    </div>
                    <?php
                    }
                    else 
                    {
                    ?> 
                    <div class="direct-chat-msg right" >
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-timestamp pull-left"><?php echo date('d-m-Y H:i:s A',strtotime($rsCon['entry_time']))?></span>
                      </div>
                      <img class="direct-chat-img" src="img/admin.png" alt="message user image"/>
                      <div class="direct-chat-text" style="background: #87F7B4;">
                        <?php echo nl2br($rsCon['msg']);?>
                      </div>
                    </div>
                    <?php
                    }
                    }
                    }
                    ?>  
                  </div>
                </div>
                  </div>
                </div>
        </div>
    </section>
    <?php include("inc/footerjs.php");?>
</body>
</html>
