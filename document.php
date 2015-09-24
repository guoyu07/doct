<!DOCTYPE html>
<html lang="en"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>笔记页</title>
</head>
<body>
<div style="width:45.9%;margin: 0 auto;text-align: justify;">

<!-- Start: Viral Lock Script to hide premium content -->
<?php	

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
		<p>
		下载内容</p>
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
?>
<!-- End: Viral Lock Script to hide premium content -->

</div>
</body>
</html>