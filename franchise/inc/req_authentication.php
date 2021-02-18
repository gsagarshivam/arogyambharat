<?php
//$user_name=$_SESSION['username'];
if(((isset($_SESSION['username']))||(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `master_franchise` WHERE m_username='".$_SESSION['username']."'"))!=0)))
{
	$user_name = $_SESSION['username'];
	$admin_det=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `master_franchise` WHERE m_username='$user_name'"));
	$admin_name=$admin_det['m_name'];
	$admin_user_name=$admin_det['m_username'];
    $admin_client_id=$admin_det['client_id'];
    //echo $user_name;
}

else
{
	header("location: index.php");
    exit;
    
}
?>