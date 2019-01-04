<?php 
session_start();
include("config.php");

if (isset($_SESSION['user'])) {
	header('Location: admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png" />
    <link rel="shortcut icon" href="favicon.png" />

    <title>Inventory Systemsss</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/vegas.css">
    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  
  	 <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-send"></span> Inventory System</a>
        </div>
        <div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="stafflogin.php"><span class="glyphicon glyphicon-list-alt"></span> Staff</a></li>
            <li><a href="adminlogin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
          </ul>
        </div>
      </div>
    </nav>
	
    <div class="vertical-center">
      <div class="container text-center">
        <h1><strong class="shadow"><span class="glyphicon glyphicon-send"></span> Vehicle Inventory Management System</strong></h1>
        <h4 class="mb24"><strong class="shadow">Login To Continue</strong></h4>
        <a href="stafflogin.php" class="btn btn-lg btn-primary" role="button"><span class="glyphicon glyphicon-list-alt"></span> Staff</a>
        <a href="adminlogin.php" class="btn btn-lg btn-info" role="button"><span class="glyphicon glyphicon-user"></span> Admin</a>
      </div>
    </div>
    
    
    <footer class="footer">
      <div class="container text-center" >
        <div class="col-sm-12" style="text-shadow: 2px 2px 4px #000000; color:#FFFFFF">
          <p>&copy; Copyright 2015 <a href="">Inventory System</a>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/vegas.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script>
    $('body').vegas({
		slides: [
			{ src: 'img/bg/1.jpg' }
		],
		overlay: "img/bg/overlay/01.png"
	});
	</script>
  </body>
</html>
