<?php
session_start();
session_destroy();
require_once("inc/dbcn.php");
$redirectURL = FULLURL;
header("location:".$redirectURL);
exit();
?>
