
<?php

 include 'config.php';

if (isset($_GET["search"]))
{
    $keyWord= $_GET["search"]; 
}
else
{
    $keyWord='';
}
if (isset($_GET["page"]))
{
    $page= $_GET["page"]; 
}
else
{
   $page= '1';
}


//链接数据库
$con = mysql_connect("$servername","$username","$password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("$dbname", $con);
mysql_query("set character set 'utf8'");

//求数据数量和总页数
$rs= mysql_query("SELECT count(*) FROM `monamphi` WHERE `ecole` LIKE '%$keyWord%' OR `matirie` LIKE '%$keyWord%' OR `docname` LIKE '%$keyWord%' OR `prof` LIKE '%$keyWord%' ");
$ntotal= mysql_fetch_array($rs);
$pages= ceil($ntotal["count(*)"]/12); 
$offset=12*($page-1);

//获取结果数据
$result = mysql_query("SELECT * FROM `monamphi` WHERE `ecole` LIKE '%$keyWord%' OR `matirie` LIKE '%$keyWord%' OR `docname` LIKE '%$keyWord%' OR `prof` LIKE '%$keyWord%' ORDER BY 1 DESC LIMIT $offset ,12");
//显示数据
while($row = mysql_fetch_array($result))
  {
  echo ' <div class="col-md-4 ">
					<div class="thumbnail panel ">
						<div class="caption docs" >
							<h3 class="tips" data-content="'; echo $row['docname'].'" rel="popover" data-placement="top" data-trigger="hover">
							'; echo $row['docname'].'
							</h3>
							<p>
							';
							echo $row['ecole']."<br>".$row['matirie']."<br>".$row['prof'].'<br></p><p><a class="btn btn-primary" href="./document.php?id=';
							echo $row['id'];
	echo '">Action</a> 
							</p>
						</div>
					</div>
				</div>';
  } 




$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;

mysql_close($con);
?>
