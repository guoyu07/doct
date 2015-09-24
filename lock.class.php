<?php 

ob_start();
class virallocker_class {
	
	function __construct() 
	{
		$this->add_header();
	}

	/** Function to Get the Current URL **/
	function curPageURL() 
	{
		$pageURL = 'http';
		if (isset($_SERVER["HTTPS"]) && ( $_SERVER["HTTPS"] == "on" ) ) {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}

	function virallocker_handler( $my_id, $pageVLArr ) 
	{
		echo '
		<script type="text/javascript">
			var virallocker_use = true;
			function virallocker_plusone(plusone) {
				if (plusone.state == "on") {
					var data = { action: "virallocker", myID: "'.$my_id.'"};
					jQuery.post("viral-lock.class.php", data, function(response) {
						if (virallocker_use) location.reload();					
					});
				}
			}
			FB.init();
			jQuery(document).ready(function() {
				FB.Event.subscribe("edge.create", function(href) { 
					var data = { action: "virallocker", myID: "'.$my_id.'"};
					jQuery.post("viral-lock.class.php", data, function(response) {
						if (virallocker_use) location.reload();					
					});
					
				});
				twttr.ready(function (twttr) {
					twttr.events.bind("tweet", function(event) {
						var data = { action: "virallocker", myID: "'.$my_id.'"};
						jQuery.post("viral-lock.class.php", data, function(response) {
						if (virallocker_use) location.reload();					
					});
					});
				});
			});
		</script>';
	}
	
	/** Function to add the required styles and scripts **/
	function add_header() 
	{
	    /** Include the required styles and scripts for the VL script **/
		echo '<style type="text/css">
		.virallocker-box {background-color: #E0ECEF;border: 1px dashed #3B5998;padding: 10px 20px;	color: #000;text-align: left; margin-top: 5px; margin-bottom: 5px;border-radius: 5px;-moz-border-radius: 5px; font-weight: bold; font-family: Helvetica, Verdana, Arial, sans-serif;}
		.virallocker-box  div {margin-top: 5px;}
		.fb_edge_widget_with_comment span.fb_edge_comment_widget iframe.fb_ltr {display: none !important;}
		.virallocker-box iframe {max-width: 600px !important;}
		</style>';
		echo '<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>';
		echo '<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>';
		echo '<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>';
		echo '<script type="text/javascript" src="https://platform.twitter.com/widgets.js"></script>';
		echo '<div id="fb-root"></div><script type="text/javascript">FB.XFBML.parse();</script>';
	}

	/** Function to define the defaut Viral Lock fields **/
	function default_vl_array()
	{
		/** Get the current URL **/
		$currentUrl = $this->curPageURL();
		/** Define the default VL fields **/
		$defaultVLArr = array( 
								'VIRALLOCKER_DEFAULTMESSAGE' => 'Like or Tweet about this page to reveal the content.',
								'VIRALLOCKER_COOKIEVALUE' => '0001',
								'URL' => $currentUrl,
								'TWEET' => 'Check out this link'
							);	
		return $defaultVLArr;
	}
}

/** Intiate object **/
$virallocker = new virallocker_class();
/** set cookie on ajax call and return true to show the locked content **/
if( isset( $_POST['action'] ) && ( $_POST['action'] == 'virallocker' ) )
{
	$my_id = $_POST['myID'];
	$myArr = $virallocker->default_vl_array();
	setcookie("virallock_".$my_id, $myArr['VIRALLOCKER_COOKIEVALUE'], time()+60*60*24*365*10);
	echo true;
	exit;
}
?>
