<?php
session_start();

/* DATABASE CONNECTION */
if($_SERVER['SERVER_NAME']=='localhost'){$conn = mysqli_connect('localhost','root','','arogyam');}
else{$conn = mysqli_connect('localhost','arogyam_user','Z*nb_K@Ew[J7','arogyam_db');}
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error($conn));
}
/* DEFINE GLOBAL VARIABLES*/

$con = $conn;
$glbsettings = mysqli_query($conn,"SELECT * FROM `global_settings` WHERE 1");   
 
if (mysqli_num_rows($glbsettings)>0)
{
  	$rs_glb = mysqli_fetch_array($glbsettings);

  	define("COMPANYTEXT", $rs_glb['name']);
  	define("COMPANY", $rs_glb['name']);
  	define("PROTOCOL", $rs_glb['protocol']);
  	define("ONLYDOMAIN", $rs_glb['domain']);
  	define("FULLURL", PROTOCOL.ONLYDOMAIN);
  	define("ADDRESS", htmlspecialchars_decode($rs_glb['address']));
  	define("CONTACT", $rs_glb['contact']);
  	define("EMAIL", $rs_glb['email']);
    define("COMPANYLOGO", FULLURL."/upload/logo/logo.png");
  	define("INVPrefix", $rs_glb['invoice_prefix']);
  	define("FY", $rs_glb['invoice_fy']);
  	define("DIRINCOME", $rs_glb['direct_income']);
  	define("ROIINCOME", $rs_glb['roi_income']);
  	define("BININCOME", $rs_glb['binary_income']);
  	define("ADMIN", $rs_glb['admin_charge']);
  	define("TDS", $rs_glb['tds_charge']);
  	define("CURRENCY", $rs_glb['currency']);
 	define("COMPANYFAVICON", FULLURL."/upload/logo/favicon.png");
    define("PAN", "");
    define("CIN", "");
    define("GSTN", "");
    define("JURISDICTION", "Allahabad");
    define("PRODFULLURL", FULLURL."/upload/products/");

  	/*Development Environment (DEV:PROD)*/
	define("ENV", "PROD");
	define("FORMEMAIL", $rs_glb['formemail']);
	define("GOOGLEMAP",$rs_glb['googlemap']);
}  
else
{

    define("COMPANYTEXT", "Digiature Technology Pvt");
    define("COMPANY","Digiature Technology Pvt");
    define("PROTOCOL", "https://");
    define("ONLYDOMAIN", "digiature.com");
    define("FULLURL", PROTOCOL.ONLYDOMAIN);
    define("ADDRESS", htmlspecialchars_decode("68A/2 Chak Mundera Allahabad - 211011
Uttar Pradesh, India"));
    define("CONTACT", " +(91) 811 425 0000");
    define("EMAIL", "digisales@digiature.com");
    define("COMPANYLOGO", "https://digiature.com/images/logo-wide.png");
    define("INVPrefix", "DG");
    define("FY", "FY");
    define("DIRINCOME", "0");
    define("ROIINCOME","0");
    define("BININCOME","0");
    define("ADMIN", "5");
    define("TDS", "5");
    define("CURRENCY", "INR");
    define("COMPANYFAVICON", FULLURL."/images/favicon-16x16.png");
    define("PAN", "");
    define("CIN", "");
    define("GSTN", "");
    define("JURISDICTION", "Allahabad");
    /*Development Environment (DEV:PROD)*/
    define("ENV", "PROD");
 	define("FORMEMAIL", "digisales@digiature.com");
	define("GOOGLEMAP", "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14410.79849322004!2d81.7554511!3d25.448304!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbb9c15fb978f8120!2sDigiature+Technology+Pvt.+Ltd.!5e0!3m2!1sen!2sin!4v1557922531711!5m2!1sen!2sin");
}
 

define("COPYRIGHTTEXT"," Copyright &copy; ".date('Y')." <a href=\"".FULLURL."\" class=\"text-black\">".COMPANY.".</a> All Rights Reserved. "); 
define("DEVELOPEDBYTEXT"," ");


$basePath = ""; 
$basePath = $_SERVER['REQUEST_URI']; 
$basePath = explode("/",$basePath);
array_pop($basePath);
$basePath = implode("/",$basePath);
$basePath = PROTOCOL.$_SERVER['HTTP_HOST'].$basePath;

?> 
