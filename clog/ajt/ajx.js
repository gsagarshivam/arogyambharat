function package_type()
{
 var t1=document.getElementById('activationProduct').value;
 if(t1=="")
 {
	document.getElementById('myspan').innerHTML="";
	return;
	}
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myspan").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","ajt/package_detail.php?val1="+t1,true);
xmlhttp.send();
}
