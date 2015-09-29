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
		
		<div class="col-md-10">
			
	
		
<!-- Start: Viral Lock Script to hide premium content -->



				<?php	
				
				while($info = mysql_fetch_array($doc))
				{
					//todo 替换掉读取数据中的空格
					
					
					
					echo "<div class='page-header'><h1>".$info['docname']."<h1></div>
			<div class='row'>
				<ul class='breadcrumb'>
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
			</div>
			<div class='form-group'>
				<ul>
				<li><span><input class='form-control' readonly placeholder=".$info['ecole']."></span></li>
				<li><span><input class='form-control' readonly placeholder=".$info['matirie']."></span></li>
				<li><span><input class='form-control' readonly placeholder=".$info['prof']."></span></li>
				<li><span><input class='form-control' readonly placeholder=".$info['niveau']."></span></li>
			
				<li><span><input class='form-control' readonly  placeholder=".$info['uploader']."></span></li>
				<li><span><input class='form-control' readonly placeholder=".$info['annee']."></span></li>
				<li><span><input class='form-control' readonly placeholder=".$info['type']."></span></li>
				</ul>
			</div>
			";} 
			

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
										'MY_ID' => 'doct',
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
						<div >		

隐藏部分
						
						<?php
				
			
			
						?>
				
						</div>
						<!-- End of hidden content -->
						
					<?php
					}
					else 
					{
						echo '
							<script type="text/javascript">
								virallocker_use = true;
							</script>
							<div class="virallocker-box">
								'.$message.'
								
								<div><a data-related="@monprofestfou" data-via="monprofestfou" data-hashtags="@monprofestfou" href="http://twitter.com/share" class="twitter-share-button" data-text="'.$tweet.'" data-url="'.$turl.'" data-count="vertical" data-size="large" >Tweet</a></div>
								<div><g:plusone size="tall" annotation="bubble" callback="virallocker_plusone" href="'.$gurl.'"></g:plusone></div>
								<div><fb:like id="fbLikeButton" href="'.$furl.'"  data-layout="box_count" show_faces="false" width="450"></fb:like></div>
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
</body>
</html>