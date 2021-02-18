<?php
define("COMPANY","ADMIN");
define("SNCOMPANY","ADMIN");
define("ONLYDOMAIN", "bkarogyamhealthcare.com/cpn");
define("FULLURL","https://".ONLYDOMAIN);
define("COPYRIGHTTEXT"," Copyright &copy; ".date('Y')." <a href=\"".FULLURL."\" style=\"color: white;\">".COMPANY.".</a> All Rights Reserved. "); 
define("DEVELOPEDBYTEXT"," ");   
if($_SERVER['SERVER_NAME']=='localhost'){$conn = mysqli_connect('localhost','root','','arogyam');}
else{$conn = mysqli_connect('localhost','arogyam_user','Z*nb_K@Ew[J7','arogyam_db');}
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error($conn));
}
$glbsettings = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `global_settings` WHERE 1"));  
define('FY', $glbsettings['invoice_fy']);
?>
