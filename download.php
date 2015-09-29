<?php

include 'config.php';

if (isset($_GET["id"]))
{
    $id= addslashes($_GET["id"]); 
}
else
{
    $id=98501;
}

$con = mysql_connect("$servername","$username","$password");
if (!$con)
 {
die('Could not connect: ' . mysql_error());
}
mysql_select_db("$dbname", $con);
mysql_query("set character set 'utf8'");
 $doc = mysql_query("SELECT docname, type FROM `monamphi` WHERE `id`=$id"); 
$docinfo = mysql_fetch_array($doc);
$nname=$docinfo['docname'];
$dtype=$docinfo['type']; 



 switch ($dtype)
{
	case 'Opendocument':
  $type='.odt';
  break;
  case 'Word':
  $type='.docx';
  break;
  case "Pdf":
  $type='.pdf';
  break;
  case "Excel":
  $type='.xlsx';
  break;
  case "Jpg":
  $type='.jpeg';
  break;
  case "Powerpoint":
  $type='.ppt';
  break;
}


 $file_name = $id.$type; 
 $file_dir = "./doc/"; 
     
 

	 
 //检查文件是否存在 
 if(!file_exists($file_dir . $file_name)) exit('cant find files'); 
 else  
 { 
     $file = fopen($file_dir . $file_name,"r"); // 打开文件 
     
     // 输入文件标签 
     Header("Content-type: application/octet-stream"); 
     Header("Accept-Ranges: bytes"); 
     Header("Accept-Length: ".filesize($file_dir . $file_name)); 
     Header("Content-Disposition: attachment; filename=".$nname.$type); 
     
     // 输出文件内容 
     echo fread($file,filesize($file_dir . $file_name)); 
     fclose($file); 
     exit; 
 }     
 

?> 









