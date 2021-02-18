<?php
session_start();
require_once("inc/dbcn.php");
require_once("inc/iFunctions.php");
require_once("inc/req_authentication.php");
require_once("inc/formvalidator.php");
date_default_timezone_set('Asia/Calcutta');  
require('../clog/inc/iArray.php');
$clubTable = 'client_account_profile';
///////////////////////////////////////////////////////
$clientIdClub = isset($_GET['uid'])?$_GET['uid']:"";

if(isset($_GET['uid']) && !empty($clientIdClub))
{
 

    $uid = iClean($conn,$_GET['uid']); 
    $uidClub=mysqli_fetch_array(mysqli_query($conn, "select * from ".$clubTable." where client_id='".$uid."'"));
    $uid = $uidClub['client_id']; 
    
  
}else{
    echo "Invalid Access";
    die;
}
$getID=mysqli_fetch_array(mysqli_query($conn, "select `id` from client_account_profile where client_id ='".$clientIdClub."'"));
if((empty($getID))|| ($getID['id'] < $acc_profile['id'])){
    echo "Invalid Access";
    die;
}
   
function downlineMembers($uid,$conn)   //Function to calculate all children count
{
    $execsql = mysqli_query($conn,"SELECT * FROM client_account_profile WHERE client_id = '".$uid."'") or die(mysqli_error($conn));
    
    $array = mysqli_fetch_array($execsql);
    //(array_count_values($array));
    //$count = 0;
    if($array['lft']!=0)
    {
        $count .= downlineMembers($array['lft'],$conn).$array['lft'].",";
    }
    if($array['rgt']!=0)
    {
        $count .= downlineMembers($array['rgt'],$conn).$array['rgt'].",";
    }

    return $count;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Binary Tree : <?php echo COMPANY?></title>
<?php include("inc/common_head.php");?>
<script src="js/jquery-1.12.4.min.js"></script>
<style type="text/css">
    .tooltip > .tooltip-inner {
    background-color: #73AD21;
    color: #FFFFFF;
    border: 1px solid green;
    padding: 2px;
    font-size: 12px;
    min-width:350px;
    text-align: left;
}
    </style>
<script>
$(document).ready(function(){
    $("#myTooltips a").tooltip({
        template : '<div class="tooltip"><div class="tooltip-inner"></div></div>'
    });
});
</script>
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
 <h4 class="mt-0 header-title">Binary Tree</h4>
    <?php

              
                    
                function popupTip($conn, $uid,$clubTable,$parent,$pos){
                    
                $clientParentDetAcc=mysqli_fetch_array(mysqli_query($conn, "select * from ".$clubTable." where client_id='".$uid."'"));
                $acc_profileTree=mysqli_fetch_array(mysqli_query($conn, "select * from client_account_profile where client_id='".$clientParentDetAcc['client_id']."'"));
                $per_profileTree=mysqli_fetch_array(mysqli_query($conn, "select * from client_personal_profile where client_id='".$clientParentDetAcc['client_id']."'"));
                
                $SponsorNameTree=mysqli_fetch_array(mysqli_query($conn, "select m_name,client_id from client_personal_profile where client_id='".$acc_profileTree['client_intro_id']."'"));
                
                $clientParentDet=mysqli_fetch_array(mysqli_query($conn, "select client_id from ".$clubTable." where client_id='".$clientParentDetAcc['parent_id']."'"));
                $ParentNameTree=mysqli_fetch_array(mysqli_query($conn, "select m_name from client_personal_profile where client_id='".$clientParentDet['client_id']."'"));
                $ParentID=mysqli_fetch_array(mysqli_query($conn, "select client_id from client_account_profile where client_id='".$clientParentDet['client_id']."'"));
                
                if($clientParentDetAcc['lft']!="0"){
                    $childIdsLeft = $clientParentDetAcc['lft'].",".downlineMembers($clientParentDetAcc['lft'],$conn);
                    $childIdsLeft = rtrim($childIdsLeft,",");
                    $lcount = count(explode(',', $childIdsLeft));
                    $pairscountLeft=mysqli_fetch_array(mysqli_query($conn, "select SUM(`total_amt`) as total_amt,SUM(`total_bv`) as total_bv from client_invoices where client_id IN ('".str_replace(",", "','", $childIdsLeft)."') AND status = 'Approved'"));

                    }else{
                    $lcount = 0;
                }
                if($clientParentDetAcc['rgt']!="0"){
                    $childIdsRight = $clientParentDetAcc['rgt'].",".downlineMembers($clientParentDetAcc['rgt'],$conn);
                    $childIdsRight = rtrim($childIdsRight,",");
                    $rcount = count(explode(',', $childIdsRight));
                    $pairscountRight = mysqli_fetch_array(mysqli_query($conn,"SELECT SUM(`activated_pin_cost`) AS TORBV FROM client_account_profile WHERE client_id IN ('".str_replace(",", "','", $childIdsRight)."') AND activation_status!=0"));
                    $pairscountRight=mysqli_fetch_array(mysqli_query($conn, "select SUM(`total_amt`) as total_amt,SUM(`total_bv`) as total_bv from client_invoices where client_id IN ('".str_replace(",", "','", $childIdsRight)."') AND status = 'Approved'"));

                }else{
                    $rcount = 0;
                }

                     $tcount = $lcount + $rcount;
                    $tbusiness = $leftBusiness  + $rgtBusiness + $myInvestment['total_amt'];
                
                    ?>
         <?php
         if($uid==''||$uid==0)
         {
            echo "<img src=\"images/tree_img/empty.png\">";
         }
         else if($acc_profileTree['activation_status']==0)
         {
            echo "<img src=\"images/tree_img/block.png\">";
         }
         else if($acc_profileTree['activation_status']==1)
         {
            echo "<img src=\"images/tree_img/avtive.png\">";
         }
         
         ?>           
         
        <br/>
        <div style="border:solid 1px #000; width:80px">
        <?php if($acc_profileTree['client_id']!=""){?>
            <a href="search_downline.php?uid=<?=$acc_profileTree['client_id'];?>" data-toggle="tooltip" data-html="true" title="
            <div class='table-responsive'>
        <table class='table'>
            <tr>
                <td  style='text-align: left;'><strong>Name</strong></td>
                <td  style='text-align: left;' width='30%'><?=$per_profileTree['m_name'];?></td>
                <td style='text-align: left;'><strong>Reg. Date</strong> </td>
                <td style='text-align: left;'><?=date('d-m-Y', strtotime($acc_profileTree['entry_time']))?></td>
            </tr>
            <tr>
                <td  style='text-align: left;'><strong>Spo.ID</strong> </td>
                <td  style='text-align: left;'><?=$acc_profileTree['client_intro_id'];?></td>
                <td style='text-align: left;'><strong>Spo.Name</strong> </td>
                <td style='text-align: left;'><?=$SponsorNameTree['m_name'];?></td>
            </tr>
            <tr>
                <td style='text-align: left;'><strong>Total Left</strong> </td>
                <td style='text-align: left;'><?php echo ($lcount+$lcount_1);?></td>
            
                <td style='text-align: left;'><strong>Total Right</strong> </td>
                <td style='text-align: left;'><?php echo $rcount;?></td>
            </tr>
            <tr>
                <td style='text-align: left;'><strong>Total Left BV</strong> </td>
                <td style='text-align: left;'><?php echo $pairscountLeft['total_bv'];?></td>
            
                <td style='text-align: left;'><strong>Total Right BV</strong></td>
                <td style='text-align: left;'><?php echo $pairscountRight['total_bv'];?></td>
            </tr>
            <tr>
                <td style='text-align: left;' ><strong>Total Team </strong>  </td>
                <td style='text-align: left;' ><?php echo $tcount;?></td>
                <td style='text-align: left;' ><strong>Total BV</strong>  </td>
                <td style='text-align: left;' ><?php echo $pairscountLeft['total_bv'] + $pairscountRight['total_bv'];?></td>
            </tr>
        </table> </div>"  data-placement="bottom">
            <?=$acc_profileTree['client_id'];?></a>
          <?php
            }
           else{echo "<a href='http://arogyambharat.com/clog/signup.php?sponsor=".$parent."&placement=".$pos."' target='_blank'>Add +</a>";}
          ?>
        </div>
        <?php
                }
  
                
?>
          <div class="box box-primary">
            <div class="box-body box-profile">
            <div class="col-md-12" style="float: left;">
            <div class="table-responsive">
            <table style="width: 100%;">
            <td>
                 <form name="frm" method="GET">
                 Member ID <input type="text" name="uid" value="<?=$clientIdClub;?>"  size="30" placeholder="Member ID."/>
                 <input type="submit" name="Search" value="Search" class="btn btn-info" />
                 </form> 
            </td>
            
            


            </table>   
            </div>          
            </div>
<br /><br />
<div class="clearfix"></div>
<div class="table-responsive">
<table width="99%">
<tbody>
<tr>
    <td width="100%" align="center">
    
             <?php
            $acc_profileTree=mysqli_fetch_array(mysqli_query($conn, "select client_id,lft,rgt from ".$clubTable." where client_id='".$uid."'"));
            $parent = $acc_profileTree['client_id'];
            echo popupTip($conn, $uid,$clubTable,$parentL1,'lft');
            ?>
    </td>

</tr>
              
<tr>
    <td width="100%" align="center">
        <img width="540" height="50" src="images/tree_img/tree_top_line.jpg" >
    </td>
</tr>
                                        
<tr>
    <td>
    <table width="100%">
    <tbody>
    <tr>
    </tr>
    <tr>
                                                                                                                                                                                                                                                      <td width="50%" align="center">
          
            <?php   
            $level1_left1 = $acc_profileTree['lft']; 
            echo popupTip($conn, $level1_left1,$clubTable,$parent,'lft');
            //echo $level1_left1;
            ?>  
                                                                </td>
                                                                                                                                                                                                                            <td width="50%" align="center">
                        
                   
            <?php  
            $level1_right1 = $acc_profileTree['rgt'];  
            echo popupTip($conn, $level1_right1,$clubTable,$parent,'rgt');
            //echo $level1_right1;
            ?>  
                                                                </td>
                                                                                                                                                                                </tr>
            </tbody>
        </table>
                                                            </td>
</tr>
                    
                                                                                
                    <tr>
    <td>
                                                                <table width="100%">
            <tbody>
                <tr>
                                                            <td width="50%" align="center">
                        <img width="280" height="50" src="images/tree_img/tree_middle_line.jpg" >
                    </td>
                    <td width="50%" align="center">
                        <img width="280" height="50" src="images/tree_img/tree_middle_line.jpg" >
                    </td>
                                                        </tr>
                <tr>
                                                                <table width="100%">
                            <tbody>
                                <tr>
                                                                                                                                                                                                                                                                                <td width="25%" align="center">
                        
            <?php
            $acc_profileTree=mysqli_fetch_array(mysqli_query($conn, "select client_id,lft,rgt from ".$clubTable."  where client_id='".$level1_left1."'"));
            $level2_left1 = $acc_profileTree['lft'];
            $parent = $acc_profileTree['client_id'];
            echo popupTip($conn, $level2_left1,$clubTable,$parent,'lft');
            ?>
                                                                </td>
                                
                                                                                                                                                                                                                            <td width="25%" align="center">
                        
                                                                      <?php
            $level2_right1 = $acc_profileTree['rgt'];
            echo popupTip($conn, $level2_right1,$clubTable,$parent,'rgt');
            ?>
                                                                </td>
                                
                                                                                                                                                                                                                            <td width="25%" align="center">
                        
             <?php
            $acc_profileTree=mysqli_fetch_array(mysqli_query($conn, "select client_id,lft,rgt from ".$clubTable."  where client_id='".$level1_right1."'"));
            $level2_left2 = $acc_profileTree['lft'];
            $parent = $acc_profileTree['client_id'];
            echo popupTip($conn, $level2_left2,$clubTable,$parent,'lft');
            ?>
                                                                </td>
                                
                                                                                                                                                                                                                            <td width="25%" align="center">
                        
            <?php
             $level2_right2 = $acc_profileTree['rgt'];
            echo popupTip($conn, $level2_right2,$clubTable,$parent,'rgt');
            ?>
                                                                </td>
                                
                                                                                                                                                                                                                                                                        </tr>
                            </tbody>
                                </table>
                                                        </tr>
            </tbody>
        </table>
                                                            </td>
</tr>
                    
                                                                                
                    <tr>
    <td>
                                                                <table width="100%">
            <tbody>
                <tr>
                                                        </tr>
                <tr>
                                                                <table width="100%">
                            <tbody>
                                <tr>
                                                                                    <td width="25%" align="center">
                                    <img width="150" height="50" src="images/tree_img/tree_bottom_line.jpg" >
                                </td>
                                <td width="25%" align="center">
                                    <img width="150" height="50" src="images/tree_img/tree_bottom_line.jpg" >
                                </td>
                                <td width="25%" align="center">
                                    <img width="150" height="50" src="images/tree_img/tree_bottom_line.jpg" >
                                </td>
                                <td width="25%" align="center">
                                    <img width="150" height="50" src="images/tree_img/tree_bottom_line.jpg" >
                                </td>
                                </tr>
                                <tr>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                                                                                                                                                                                                                        <td width="12.5%" align="center">
            <?php
            $acc_profileTree=mysqli_fetch_array(mysqli_query($conn, "select client_id,lft,rgt from ".$clubTable." where client_id='".$level2_left1."'"));
            $level3_left1 = $acc_profileTree['lft'];
            $parent = $acc_profileTree['client_id'];
            echo popupTip($conn, $level3_left1,$clubTable,$parent,'lft');
            ?>
                                                                </td>
                       
                                
                                                                                                                                                                                                                            <td width="12.5%" align="center">
            <?php
            $level3_right1 = $acc_profileTree['rgt'];
            echo popupTip($conn, $level3_right1,$clubTable,$parent,'rgt');
            ?>
                                                                </td>
                       
                                
                                                                                                                                                                                                                            <td width="12.5%" align="center">
             <?php
             $acc_profileTree=mysqli_fetch_array(mysqli_query($conn, "select client_id,lft,rgt from ".$clubTable." where client_id='".$level2_right1."'"));
            
            $level3_left2 = $acc_profileTree['lft'];
            $parent = $acc_profileTree['client_id'];
            echo popupTip($conn, $level3_left2,$clubTable,$parent,'lft');
            ?>
                 
                                                                </td>
                       
                                
                                                                                                                                                                                                                            <td width="12.5%" align="center">
            <?php
            $level3_right2 = $acc_profileTree['rgt'];
            echo popupTip($conn, $level3_right2,$clubTable,$parent,'rgt');
            ?>
                                                                </td>
                       
                                
                                                                                                                                                                                                                            <td width="12.5%" align="center">
            <?php
             $acc_profileTree=mysqli_fetch_array(mysqli_query($conn, "select client_id,lft,rgt from ".$clubTable." where client_id='".$level2_left2."'"));
            
            $level3_left3 = $acc_profileTree['lft'];
            $parent = $acc_profileTree['client_id'];
            echo popupTip($conn, $level3_left3,$clubTable,$parent,'lft');
            ?>
                                                                </td>
                       
                                
                                                                                                                                                                                                                            <td width="12.5%" align="center">
            <?php
            $level3_right3 = $acc_profileTree['rgt'];
            echo popupTip($conn, $level3_right3,$clubTable,$parent,'rgt');
            ?>
                                                                </td>
                       
                                
                                                                                                                                                                                                                            <td width="12.5%" align="center">
            <?php
             $acc_profileTree=mysqli_fetch_array(mysqli_query($conn, "select client_id,lft,rgt from ".$clubTable." where client_id='".$level2_right2."'"));
            
            $level3_left4 = $acc_profileTree['lft'];
            $parent = $acc_profileTree['client_id'];
            echo popupTip($conn, $level3_left4,$clubTable,$parent,'lft');
            ?>
                                                                </td>
                       
                                
                                                                                                                                                                                                                            <td width="12.5%" align="center">
            <?php
             $acc_profileTree=mysqli_fetch_array(mysqli_query($conn, "select client_id,lft,rgt from ".$clubTable." where client_id='".$level2_right2."'"));
            $parent = $acc_profileTree['client_id'];
            $level3_right4 = $acc_profileTree['rgt'];
            echo popupTip($conn, $level3_right4,$clubTable,$parent,'rgt');
            ?>

</td>             
</tr>
</tbody>
</table>
</tr>
</tbody>
</table>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
    
<br />    
<br />        
<br />        
<br />        
<br />        
<br />        
<br />        
    
    
    
    
    
    
    
    
    
            </div>
            <!-- /.box-body -->
          </div>
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