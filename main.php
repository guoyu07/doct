
<?php
 	include ( 'config.php' );

	$servername = "localhost";
$username = "doc";
$password = "";
$dbname = "doc";
	
$keyWord= $_GET["search"]= 'Paris'; 
$page=  $_GET["page"]= '1';
  $con = mysql_connect("$servername","$username","$password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("$dbname", $con);


$result = mysql_query("SELECT * FROM `monamphi` WHERE `ecole` LIKE '%$keyWord%' OR `matirie` LIKE '%$keyWord%' OR `docname` LIKE '%$keyWord%' OR `prof` LIKE '%$keyWord%' ORDER BY 1 DESC LIMIT 10");



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

mysql_close($con);
?>
//搜索结果 ，返回json,在首页ajax获取信息
