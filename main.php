
<?php
$servername = "localhost";
$username = "doc";
$password = "";
$dbname = "doc";


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
$pages= ceil($ntotal["count(*)"]/9);
//获取结果数据
$result = mysql_query("SELECT * FROM `monamphi` WHERE `ecole` LIKE '%$keyWord%' OR `matirie` LIKE '%$keyWord%' OR `docname` LIKE '%$keyWord%' OR `prof` LIKE '%$keyWord%' ORDER BY 1 DESC LIMIT 9");
//显示数据
while($row = mysql_fetch_array($result))
  {
  
  echo ' <div class="col-md-4">
					<div class="thumbnail">
						<div class="caption">
							<h3>
							'; echo $row['docname'] . '
							</h3>
							<p>
							';
							echo $row['ecole'] .$row['matirie'].$row['prof']."<br>".$row['niveau'].$row['annee'].$row['type'].'</p><p><a class="btn btn-primary" href="';
							echo $row['id'];
	echo '">Action</a> <a class="btn" href="#">Action</a>
							</p>
						</div>
					</div>
				</div>';
  } 




$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if ($page > 1)
{
	echo  $pages;
	echo "<a href='index.php?page=".$prev."'>上一页</a> ";
}

if ($page < $pages)
{
echo "<a href='index.php?page=".$next."'>下一页</a> ";
echo "<a href='index.php?page=".$last."'>尾页</a> ";
} 
mysql_close($con);
?>
