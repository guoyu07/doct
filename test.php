
<?php
$servername = "localhost";
				$username = "doc";
				$password = "";
				$dbname = "doc";
				if (isset($_GET["id"]))
					{
						$id= $_GET["id"]; 
					}
					else
					{
						$id=99;
					}
				$con = mysql_connect("$servername","$username","$password");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }


				
				mysql_select_db("$dbname", $con);
				mysql_query("set character set 'utf8'");
				
				
				$doc = mysql_query("SELECT * FROM `monamphi` WHERE `id`=55");
				while($info = mysql_fetch_array($doc))
				{echo $info['id'];
			
			
			}
			
			$result = mysql_query("SELECT * FROM `monamphi` WHERE `ecole` LIKE 'paris'");
//显示数据
while($row = mysql_fetch_array($result))
  {
  echo ' <div class="col-md-4">
					<div class="thumbnail">
						<div class="caption docs" >
							<h3 class="tips" data-content="'; echo $row['docname'].'" rel="popover" data-placement="top" data-trigger="hover">
							'; echo $row['docname'].'
							</h3>
							<p>
							';
							echo $row['ecole']."<br>".$row['matirie']."<br>".$row['prof'].'<br></p><p><a class="btn btn-primary" href="';
							echo $row['id'];
	echo '">Action</a> <a class="btn" href="#">Action</a>
							</p>
						</div>
					</div>
				</div>';
  } 
			