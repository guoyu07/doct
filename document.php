<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 3, from LayoutIt!</title>

    <meta name="description" content="monprof">
    <meta name="author" content="monprof">

    <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/paper/bootstrap.min.css" rel="stylesheet">

	<link href="css/style.css" rel="stylesheet">

  </head>
  <body>
		<?php 
				include 'config.php';
				if (isset($_GET["id"]))
					{
						$id= addslashes($_GET["id"]); 
					}
					else
					{
						$id=98500;
					}
				$con = mysql_connect("$servername","$username","$password");
				if (!$con)
				  {
				  die('Could not connect: ' . mysql_error());
				  }
				mysql_select_db("$dbname", $con);
				mysql_query("set character set 'utf8'");
				$doc = mysql_query("SELECT * FROM `monamphi` WHERE `id`=$id");
				
				?>
<div class="container-fluid">
	<div class="row">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="#">Brand</a>
				</div>
				
				<div class="collapse navbar-collapse" id="">
					<ul class="nav navbar-nav">
						
					</ul>
					<form class="navbar-form navbar-right"" role="search">
						<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
						<div class="form-group">
							<input type="text" class="form-control" name="search"> 
							
						</div> 
						<button type="submit" class="btn btn-default">
							Submit
						</button>
						</form>

					</form>
					
				</div>
				
		</nav>
	</div>
	
	<div id="main" class="container">
		
		<div class="col-md-9">
			
	
		
<!-- Start: Viral Lock Script to hide premium content -->



				<?php	
				
				$info = mysql_fetch_array($doc);
				
					//todo 替换掉读取数据中的空格
					
					
					
					echo "<div class='page-header'><h1>".$info['docname']."<h1></div>
			<div >
				<!--<ul class='breadcrumb'>
					<li>
						<a href='#'>Home</a> <span class='divider'></span>
					</li>
					<li>
						<a href='#'>".$info['ecole']."</a> <span class='divider'></span>
					</li>
					<li>
						<a href='#'>".$info['matirie']."</a> <span class='divider'></span>
					</li>
					<li class='active'>
						".$info['docname']."
					</li>
				</ul>
				-->
			</div>
	
			<div class='col-md-12'><div class='row'>
			<div class='well col-md-3' id='infos'>
				
				<div class='info'>Universite <br><a href='index.php?search=".$info['ecole']." '><span>".$info['ecole']."</span></a></div>
				<div class='info'>Matière <br><a href='index.php?search=".$info['ecole']." '><span>".$info['matirie']."</span></a></div>
				<div class='info'>Professeur <br><span>".$info['prof']."</span></div>
				<div class='info'>Niveau  <br><span>".$info['niveau']."</span></div>
				<div class='info'>Upload by <br><span>".$info['uploader']."</span></div>
				<div class='info'>Année scolaire<br><span>".$info['annee']."</span></div>
				<div class='info'>Type de Doc <br><span>".$info['type']."</span></div>
				
			</div>
			
			";
			

				//显示笔记信息 ，并隐藏下载按钮
					/** Incude the Viral Locker Class **/
					require_once( 'lock.class.php' );
					/** New Viral Object **/
					$virallocker = new virallocker_class();
					/** Get the default array **/ 
					$defArr = $virallocker->default_vl_array();
					/** Define the specific page VL fields if you want to **/
					$pageVLArr = array( 
										'URL' => 'http://localhost/',
										// 'TURL' => 'http://www.twitter.com',
										// 'GURL' => 'http://www.google.com',
										// 'FURL' => 'http://www.facebook.com',
										'MESSAGE' => 'Partage pour telecharge document.',
										'MY_ID' => $info['id'],
										'TWEET' => '成功下载!'
									);

					/** Set the VL fields **/
					if (isset($pageVLArr["MY_ID"]) && !empty($pageVLArr["MY_ID"])) $my_id = $pageVLArr["MY_ID"];
					if (isset($pageVLArr["TWEET"]) && !empty($pageVLArr["TWEET"])) $tweet = $pageVLArr["TWEET"];
					else $tweet = $defArr["TWEET"];
					if (isset($pageVLArr["URL"]) && !empty($pageVLArr["URL"])) $my_url = $pageVLArr["URL"];
					else $my_url = $defArr["URL"];
					
					if ( isset( $pageVLArr["TURL"] ) && !empty( $pageVLArr["TURL"] ) ) {
						$turl = $pageVLArr["TURL"];
					} elseif( empty( $pageVLArr["TURL"] ) && isset( $pageVLArr["URL"] ) && !empty( $pageVLArr["URL"] )) {
						$turl = $pageVLArr["URL"];
					} else {
						$turl = $defArr["URL"];
					}
					
					if ( isset( $pageVLArr["GURL"] ) && !empty( $pageVLArr["GURL"] ) ) {
						$gurl = $pageVLArr["GURL"];
					} elseif( empty( $pageVLArr["GURL"] ) && isset( $pageVLArr["URL"] ) && !empty( $pageVLArr["URL"] )) {
						$gurl = $pageVLArr["URL"];
					} else {
						$gurl = $defArr["URL"];
					}
					
					if ( isset( $pageVLArr["FURL"] ) && !empty( $pageVLArr["FURL"] ) ) {
						$furl = $pageVLArr["FURL"];
					} elseif( empty( $pageVLArr["FURL"] ) && isset( $pageVLArr["URL"] ) && !empty( $pageVLArr["URL"] )) {
						$furl = $pageVLArr["URL"];
					} else {
						$furl = $defArr["URL"];
					}
					
					if (isset($pageVLArr["MESSAGE"]) && !empty($pageVLArr["MESSAGE"])) $message = $pageVLArr["MESSAGE"];
					else $message = $defArr["VIRALLOCKER_DEFAULTMESSAGE"];

					/** Check if viral lock is active or not to show/hide the content accordingly **/
					if( isset( $_COOKIE["virallock_".$my_id] ) )
					$cookie_value = $_COOKIE["virallock_".$my_id];
					if( !empty( $cookie_value ) && $cookie_value == $defArr['VIRALLOCKER_COOKIEVALUE'] )
					{
					?>
						<!-- Content that needs to be hidden -->
						<div class='col-md-9' >		

						<h2>le document que vous demande est prêt, vous pouvez commencer télécharger</h2>
						<a type="button" class="btn btn-primary btn-lg" href="./download.php?id=<?php echo $info['id'];?>">Télécharger Gratuitement</a>
						
				
						
			
						<!-- End of hidden content -->
						
					<?php
					}
					else 
					{
						echo '
							<script type="text/javascript">
								virallocker_use = true;
							</script>
							<div class="virallocker-box col-md-9">
								<div class="panel  panel-primary">
									<div class="panel-heading">
										<h3 class="panel-title">'.$message.'</h3>
									</div>
									<div  class="panel-body">
										<div  id="share" class="center-block">
											<div><a data-related="@monprofestfou" data-via="monprofestfou" data-hashtags="@monprofestfou" href="http://twitter.com/share" class="twitter-share-button" data-text="'.$tweet.'" data-url="'.$turl.'" data-count="vertical" data-size="default" >Tweet</a></div>
											<div><g:plusone size="tall" annotation="bubble" callback="virallocker_plusone" href="'.$gurl.'"></g:plusone></div>
											<div><fb:like id="fbLikeButton" href="'.$furl.'"  data-layout="box_count" show_faces="false" width="450"></fb:like></div>
										</div>
									</div>
								</div>
							</div>';
					}
				/** Include the required fb div and short code handler **/
				$virallocker->virallocker_handler( $my_id, $pageVLArr );
				mysql_close($con);
				?>
<!-- End: Viral Lock Script to hide premium content -->
</div>
						</div>
						</div>
		</div>
	</div>
</div>
</body>
</html>