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
	<div id="main" class="row">
		<div class="col-md-3"> 
			<ul class="nav nav-pills nav-stacked">
  <li role="presentation" class="active"><a href="#">Home</a></li>
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li> 
</ul>

<button type="button" class="btn btn-success btn-lg btn-block">（成功）Success</button>

		</div>
		<div class="col-md-9">
			<div class="row">
			
			<?php include 'main.php' ?>
			
			</div>
			<?php 
			echo "<ul class='pagination'>" ;

if ($page > 1)
{
	echo "<li><a href='index.php?page=".$prev."'>Prev</a></li>  ";
}

if ($page < $pages)
{
echo "<li> <a href='index.php?page=".$next."'>Next</a></li> ";
echo "<li><a href='index.php?page=".$last."'>Last</a> </li>";
} 

echo "</ul>";?>
		</div>
	</div>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
	<script>
	$('.tips').popover();
	</script>
  </body>
</html>