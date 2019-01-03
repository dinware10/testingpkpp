<?php 
session_start();

include("config.php");

$id = $_SESSION["id"];

if (!isset($_SESSION['user'])) {
	header('Location: http://'.$webaddress.'/redirect.php');
}

$stmt = $dbo->prepare('SELECT * FROM staff WHERE pkstaff = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->execute();
$s = $stmt->fetch(PDO::FETCH_ASSOC);


$result = 3;
$auth = 3;
if (isset($_POST["submit"])) {
	
	$cartype = $_POST["cartype"];
	$carmodel = $_POST["carmodel"];
	$carplat = $_POST["carplat"];
	$lot = $_POST["lot"];
	$date_from = date('Y-m-d', strtotime(str_replace('-', '/', $_POST["date_from"])));

	


$calc = 0;
$stmt = $dbo->prepare('SELECT * FROM parking WHERE carplat = :carplat AND calc = :calc');
$stmt->bindParam(':carplat', $carplat, PDO::PARAM_STR);
$stmt->bindParam(':calc', $calc, PDO::PARAM_STR);
$stmt->execute();

if ($stmt->rowCount() == 0) {
	$auth = 1;
	$sql = "INSERT INTO parking (fkstaff, cartype, carmodel, carplat, lot, date_from) VALUES (:a, :aa, :b, :c, :d, :e)";
	$stmt = $dbo->prepare($sql);
	$stmt->bindParam(':a', $s["pkstaff"], PDO::PARAM_STR); 
	$stmt->bindParam(':aa', $cartype, PDO::PARAM_STR); 
	$stmt->bindParam(':b', $carmodel, PDO::PARAM_STR);
	$stmt->bindParam(':c', $carplat, PDO::PARAM_STR);
	$stmt->bindParam(':d', $lot, PDO::PARAM_STR);
	$stmt->bindParam(':e', $date_from, PDO::PARAM_STR);
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
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff Panel</title>

    
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
    <link href="../css/bootstrap-editable.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="staff.php">Staff Panel - Inventory System</a>
            </div>

            

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    	<li>
                            <a href="staff.php"><span class="glyphicon glyphicon-user"></span> My Profile</a>
                        </li>
                    	<li>
                            <a href="staffaddparking.php"><span class="glyphicon glyphicon-plus-sign"></span> Add Inventory Record</a>
                        </li>
                    	<li>
                            <a href="staffviewparking.php"><span class="glyphicon glyphicon-list-alt"></span> View Inventory Records</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> More<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="logout.php">Logout <span class="glyphicon glyphicon-log-out"></span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Staff Panel</h1>
                </div>
                
            </div>
            
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bars fa-fw"></i> Add Inventory Record
                    </div>
                    <div class="panel-body">
                        
                        <div class="row" >
                            <div class="col-lg-12" >
                            	<?php if ($auth == "0") { ?>
                                <div class="alert alert-warning">
                                  <strong>Error!</strong> Inventory record exist.
                                </div>
                                <?php } ?>
                                
                            	<?php if ($result == "1") { ?>
                                <div class="alert alert-success">
                                  <strong>Success!</strong> A Inventory record has been added.
                                </div>
                                <?php } elseif($result == "0") {?>
                                <div class="alert alert-danger">
                                  <strong>Error!</strong> Please try again.
                                </div>
                                <?php } ?>
                                <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                                    <div class="form-group">
                                        <label>Vehicle Type</label>
                                        <select name="cartype" required class="form-control">
                                        	<option value="" >Choose</option>
                                        	<option value="Motorcycle" >Motorcycle</option>
                                        	<option value="MPV" >MPV</option>
                                        	<option value="4x4" >4x4</option>
                                        	<option value="Lorry" >Lorry</option>
                                        	<option value="Trailer" >Trailer</option>
                                        	<option value="Bus" >Bus</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Vehicle Model</label>
                                        <input type="text" name="carmodel" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Vehicle Reg. Number</label>
                                        <input type="text" name="carplat" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Inventory Lot</label>
                                        <input type="text" name="lot" required class="form-control">
										<!--<select name="lot" required class="form-control">
										option value="" >Choose</option>
                                        	<option value="L-1" >L-1</option>
                                        	<option value="L-2" >L-2</option>
                                        	<option value="L-3" >L-3</option>
                                        	<option value="L-4" >L-4</option>
                                        	<option value="L-5" >L-5</option>
                                        	<option value="L-6" >L-6</option>
                                        	<option value="L-7" >L-7</option>
                                        </select>-->
                                    </div>
                                    <div class="form-group">
                                        <label>Starting Date</label>
                                        <input type='text' class="form-control" id='datetimepicker1' name="date_from" placeholder="Enter date" />
                                    </div>
                                    
                                    
                                    
                                    
                                    <br/>
                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-lg btn-primary" >Submit</button>
                                    </div>
                                    
                                </form>   
                            </div>
                        </div>
                     </div>
                     </div>
                </div>
                    
                    
                    
                  
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
           
                    
        </div>

    </div>

    
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

   
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/moment.js"></script>
	
    <script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
					format: 'MM/DD/YYYY',
				});
		
            });
    </script>

	
    <script src="../js/bootstrap-editable.js"></script>
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    

</body>

</html>
