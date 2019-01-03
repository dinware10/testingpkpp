<?php 
session_start();

include("config.php");

$id = $_SESSION["id"];

if (!isset($_SESSION['user'])) {
	header('Location: http://'.$webaddress.'/redirect.php');
}

$stmt = $dbo->prepare('SELECT * FROM staff');
$stmt->execute();



$cartype1 = "Motorcycle";
$stmtb = $dbo->prepare('SELECT * FROM parking WHERE cartype = :cartype1');
$stmtb->bindParam(':cartype1', $cartype1, PDO::PARAM_STR);
$stmtb->execute();
$ctype1 = $stmtb->rowCount();

$cartype2 = "Car";
$stmtc = $dbo->prepare('SELECT * FROM parking WHERE cartype = :cartype2');
$stmtc->bindParam(':cartype2', $cartype2, PDO::PARAM_STR);
$stmtc->execute();
$ctype2 = $stmtc->rowCount();

$cartype3 = "MPV";
$stmtd = $dbo->prepare('SELECT * FROM parking WHERE cartype = :cartype3');
$stmtd->bindParam(':cartype3', $cartype3, PDO::PARAM_STR);
$stmtd->execute();
$ctype3 = $stmtd->rowCount();

$cartype4 = "4x4";
$stmtd = $dbo->prepare('SELECT * FROM parking WHERE cartype = :cartype4');
$stmtd->bindParam(':cartype4', $cartype4, PDO::PARAM_STR);
$stmtd->execute();
$ctype4 = $stmtd->rowCount();

$cartype5 = "Lorry";
$stmtd = $dbo->prepare('SELECT * FROM parking WHERE cartype = :cartype5');
$stmtd->bindParam(':cartype5', $cartype5, PDO::PARAM_STR);
$stmtd->execute();
$ctype5 = $stmtd->rowCount();

$cartype6 = "Trailer";
$stmtd = $dbo->prepare('SELECT * FROM parking WHERE cartype = :cartype6');
$stmtd->bindParam(':cartype6', $cartype6, PDO::PARAM_STR);
$stmtd->execute();
$ctype6 = $stmtd->rowCount();

$cartype7 = "Bus";
$stmtd = $dbo->prepare('SELECT * FROM parking WHERE cartype = :cartype7');
$stmtd->bindParam(':cartype7', $cartype7, PDO::PARAM_STR);
$stmtd->execute();
$ctype7 = $stmtd->rowCount();



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panel</title>

    
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
    <link href="../css/bootstrap-editable.css" rel="stylesheet">
    
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">
    
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
                <a class="navbar-brand" href="admin.php">Admin Panel - Inventory System</a>
            </div>

            

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    	<li>
                            <a href="admin.php"><span class="glyphicon glyphicon-inbox"></span> Dashboard</a>
                        </li>
                    	<li>
                            <a href="adminviewstaff.php"><span class="glyphicon glyphicon-user"></span> View Staffs</a>
                        </li>
                    	<li>
                            <a href="adminviewcarlot.php"><span class="glyphicon glyphicon-list-alt"></span> View Car Lot</a>
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
                    <h1 class="page-header">Admin Panel</h1>
                </div>
                
            </div>
            
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bars fa-fw"></i> Car Type In Car Lot
                    </div>
                    <div class="panel-body">
                        
                        <div class="row" >
                            <div class="col-lg-12" >
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                     </div>
                 </div>
            </div>
			</div>
			
           
                    
        </div>

    </div>

    
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

   
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script>
	$(function() {
    Morris.Bar({
        element: 'morris-bar-chart',
        data: [
			{ y: 'Motorcycle', a: <?php echo $ctype1; ?>},
			{ y: 'Car', a: <?php echo $ctype2; ?> },
			{ y: 'MPV', a: <?php echo $ctype3; ?> },
			{ y: '4x4', a: <?php echo $ctype4; ?> },
			{ y: 'Lorry', a: <?php echo $ctype5; ?> },
			{ y: 'Trailer', a: <?php echo $ctype6; ?> },
			{ y: 'Bus', a: <?php echo $ctype7; ?> }
		  ],
		  xkey: 'y',
		  ykeys: 'a',
		  labels: 'Series A',
        hideHover: 'auto',
        resize: true
    });
	
	});
    </script>



    <script src="../dist/js/sb-admin-2.js"></script>
    
 	

</body>

</html>
