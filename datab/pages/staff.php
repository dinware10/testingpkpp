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
                        <i class="fa fa-bars fa-fw"></i> Staff Profile
                    </div>
                    <div class="panel-body">
                        
                        <div class="row" >
                            <div class="col-lg-12" >
                                <table class="table table-bordered table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Fields</th>
                                                        <th style="font-weight:100">Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Name</strong></td>
                                                        <td><a href="#" class="name" data-type="text" data-pk="<?php echo $s["pkstaff"]; ?>" data-original-title="Enter name" data-name="name" ><?php echo $s["name"]; ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>IC</strong></td>
                                                        <td><a href="#" class="ic" data-type="text" data-pk="<?php echo $s["pkstaff"]; ?>" data-original-title="Enter IC" data-name="ic" ><?php echo $s["ic"]; ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Address</strong></td>
                                                        <td><a href="#" class="address" data-type="text" data-pk="<?php echo $s["pkstaff"]; ?>" data-original-title="Enter address" data-name="address" ><?php echo $s["address"]; ?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Tel. Num.</strong></td>
                                                        <td><a href="#" class="tel" data-type="text" data-pk="<?php echo $s["pkstaff"]; ?>" data-original-title="Enter telephone" data-name="tel" ><?php echo $s["tel"]; ?></a></td>
                                                    </tr>
                                                </tbody>
                                       </table>
                                    </div>
                                </div>
                            </div>
                     </div>
                </div>
                    
                    
                    
                  
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
           
                    
        </div>

    </div>

    
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

   
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-editable.js"></script>

    
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>



    <script src="../dist/js/sb-admin-2.js"></script>
    
 	<script type="text/javascript" >

    $(document).ready(function() {
        $('.name').editable({
                        url: 'http://<?php echo $webaddress; ?>/modstaff.php',
                        display: function(value) {
                            $(this).html(value)
                        },
        });
		$('.ic').editable({
                        url: 'http://<?php echo $webaddress; ?>/modstaff.php',
                        display: function(value) {
                            $(this).html(value)
                        },
        });     
		$('.address').editable({
                        url: 'http://<?php echo $webaddress; ?>/modstaff.php',
                        display: function(value) {
                            $(this).html(value)
                        },
        });
		$('.tel').editable({
                        url: 'http://<?php echo $webaddress; ?>/modstaff.php',
                        display: function(value) {
                            $(this).html(value)
                        },
        });
    });
	

    </script>

</body>

</html>
