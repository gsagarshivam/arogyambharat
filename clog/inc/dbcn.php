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

$glbsettings = mysqli_query($conn,"SELECT * FROM `global_settings` WHERE 1");   

if (mysqli_num_rows($glbsettings)>0)
{
  	$rs_glb = mysqli_fetch_array($glbsettings);
  	//print_r($rs_glb);
  	define('COMPANYLOGO', $rs_glb['logo']);
  	define('COMPANYTEXT', $rs_glb['name']);
  	define("COMPANY", $rs_glb['name']);
  	define("PROTOCOL", $rs_glb['protocol']);
  	define("ONLYDOMAIN", $rs_glb['domain']);
  	define("FULLURL", PROTOCOL.ONLYDOMAIN);
  	define("ADDRESS", htmlspecialchars_decode($rs_glb['address']));
  	define("CONTACT", $rs_glb['contact']);
  	define("EMAIL", $rs_glb['email']);

  	define('INVPrefix', $rs_glb['invoice_prefix']);
  	define('FY', $rs_glb['invoice_fy']);
  	define('DIRINCOME', $rs_glb['direct_income']);
  	define('ROIINCOME', $rs_glb['roi_income']);
  	define('BININCOME', $rs_glb['binary_income']);
  	define('ADMINCHG', $rs_glb['admin_charge']);
  	define('TDSCHG', $rs_glb['tds_charge']);
  	define('CURRENCY', $rs_glb['currency']);

 	define('COMPANYFAVICON', $rs_glb['favicon']);
  	/*Development Environment (DEV:PROD)*/
	define("ENV", "DEV");
}  
else
{

    define('COMPANYLOGO',"images/logo.png");
    define('COMPANYTEXT',"MLM DEMO");
    define("COMPANY","MLM DEMO");
    define("SNCOMPANY","MLM DEMO");
    define("ONLYDOMAIN", "localhost/clog");
    define("PROTOCOL","http://");
    define("FULLURL",PROTOCOL.ONLYDOMAIN);
    define("ADDRESS", "BALAJI APARTMENT, PLOT No. 94/95, FLAT NO.1,
STREET NO. 13, 55 FOOTA ROAD, VIPIN GARDEN EXT.
UTTAM NAGAR, NEW DELHI 110059");
    define("CONTACT", "+91-9905911294");
    define("EMAIL", "info@future.in"); 
    define("GSTN", "");
    
    define('INVPrefix',"STX");
    define('FY', '');
    define('DIRINCOME', 0);
    define('ROIINCOME', 0);
    define('BININCOME', 0);
    define('ADMINCHG', 5);
    define('TDSCHG', 5);
    define('CURRENCY', '');
    
    define('COMPANYFAVICON', 'ico/favicon-16x16.png');
    
    /*Development Environment (DEV:PROD)*/
    define("ENV", "DEV");

}


define("PAN", "");
define("CIN", "");
define("GSTN", "");
define("JURISDICTION", "NEW DELHI");

define("PRODTHUMBURL", '../upload/products/thumb/');
define("PRODFULLURL", '../upload/products/');
define("PRODCATFULLURL", '../upload/products_category/');
define("PRODTYPEFULLURL", '../upload/products_type/');
define("OFFERBANURL", '../upload/offerbanner/');
define("PRODBRANDURL", '../upload/products_brand/');
define('GLBSETTATTHPATH', '../upload/globalsettings/');

define("COPYRIGHTTEXT"," Copyright &copy; ".date('Y')." <a href=\"".FULLURL."\" class=\"text-white\">".COMPANY.".</a> All Rights Reserved. "); 
define("DEVELOPEDBYTEXT"," Website Designed & Developed By : <a href=\"http://digiature.com\" class=\"text-white\">Digiature Technology Pvt. Ltd.</a>");

?>
