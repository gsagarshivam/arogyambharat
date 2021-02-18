<?php
function iClean($conn, $data)
{
$data = mysqli_real_escape_string($conn, $data);
return $data;
}
function hash_password($password)
{
	$options = [
		'cost' => 11,
		'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
	];
	
	$hash=password_hash($password, PASSWORD_BCRYPT, $options);
	
	return $hash;
	
}

function rteSafe($strText) { 
	   //returns safe code for preloading in the RTE 
	   $tmpString = $strText; 
	    
	   //convert all types of single quotes 
	   $tmpString = str_replace(chr(145), chr(39), $tmpString); 
	   $tmpString = str_replace(chr(146), chr(39), $tmpString); 
	   $tmpString = str_replace("'","&#39;", $tmpString);
	  
	    
	   //convert all types of double quotes 
	   $tmpString = str_replace(chr(147), chr(34), $tmpString); 
	   $tmpString = str_replace(chr(148), chr(34), $tmpString); 
	//   $tmpString = str_replace("\"", "\"", $tmpString); 
	    
	   //replace carriage returns & line feeds 
	   $tmpString = str_replace(chr(10), " ", $tmpString); 
	   $tmpString = str_replace(chr(13), " ", $tmpString); 
	    
	   return $tmpString; 
	}//function rteSafe
?>