<?php

include("config.php");

$result = 3;
$auth = 3;
if (isset($_POST["submit"])) {
	
	
	$name = $_POST["name"];
	$ic = $_POST["ic"];
	$address = $_POST["address"];
	$tel = $_POST["tel"];
	$usern = $_POST["email"];
	$passd = $_POST["pwd"];
	$fkadmin = "1";



$stmt = $dbo->prepare('SELECT * FROM staff WHERE usern = :usern');
$stmt->bindParam(':usern', $usern, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() == 0) {
	$auth = 1;
	$sql = "INSERT INTO staff (fkadmin, name, ic, address, tel, usern, passd) VALUES (:a, :b, :c, :e, :f, :h, :i)";
	$stmt = $dbo->prepare($sql);
	$stmt->bindParam(':a', $fkadmin, PDO::PARAM_STR);
	$stmt->bindParam(':b', $name, PDO::PARAM_STR);
	$stmt->bindParam(':c', $ic, PDO::PARAM_STR);
	$stmt->bindParam(':e', $address, PDO::PARAM_STR);
	$stmt->bindParam(':f', $tel, PDO::PARAM_STR);
	$stmt->bindParam(':h', $usern, PDO::PARAM_STR);
	$stmt->bindParam(':i', $passd, PDO::PARAM_STR);
	//$stmt->bindParam(':g', $place, PDO::PARAM_STR);
	if($stmt->execute()) {
		$result = 1;
	} else {
		$result = 0;
	}
	
	
} else {
	$auth = 0;
}
	
	




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

    <title>Staff Registration - Inventory System</title>

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
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li class="active"><a href="stafflogin.php"><span class="glyphicon glyphicon-list-alt"></span> Staff</a></li>
            <li><a href="adminlogin.php"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="vertical-center">
      <div class="container text-center">
	  <h1><strong class="shadow"><span class="glyphicon glyphicon-pencil"></span> Staff Registration</strong></h1>
		<?php if ($auth == "0") { ?>
        <div class="alert alert-success">
          <strong>Error!</strong> Username Exist.
        </div>
        <?php } ?>
        
        <?php if ($result == "1") { ?>
        <div class="alert alert-success">
          <strong>Success!</strong> You are registered. Please login now.
        </div>
        <a href="stafflogin.php" class="btn btn-success"> Login Now <span class="glyphicon glyphicon-log-in"></span></a><br/><br/>
        <?php } elseif($result == "0") {?>
        <div class="alert alert-danger">
          <strong>Error!</strong> Please try again.
        </div>
        <?php } ?>
        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="loginform">
            <div class="col-md-6 col-md-offset-3" >
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                </div>
                <div class="form-group">
                  <label for="ic">IC:</label>
                  <input type="text" class="form-control" id="ic" name="ic" placeholder="Enter ic" required>
                </div>
                <div class="form-group">
                  <label for="address">Address:</label>
                  <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                </div>
                <div class="form-group">
                  <label for="tel">Tel. Number:</label>
                  <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter telephone number" required>
                </div>
                <div class="form-group">
                  <label for="email">Username:</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary"> Submit <span class="glyphicon glyphicon-hdd"></span></button>
            </div>   
        </form>
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
