<?php 
session_start();

include("config.php");

$id = $_SESSION["id"];

if (!isset($_SESSION['user'])) {
	header('Location: http://'.$webaddress.'/redirect.php');
}

$stmt = $dbo->prepare('SELECT * FROM staff ');
$stmt->execute();
$s = $stmt->fetch(PDO::FETCH_ASSOC);


$calc0 = 0;
$stmta = $dbo->prepare('SELECT * FROM parking WHERE calc = :calc ORDER BY pkparking DESC');
$stmta->bindParam(':calc', $calc0, PDO::PARAM_STR);
$stmta->execute();


$calc1 = 1;
$stmtb = $dbo->prepare('SELECT * FROM parking WHERE calc = :calc ORDER BY pkparking DESC');
$stmtb->bindParam(':calc', $calc1, PDO::PARAM_STR);
$stmtb->execute();


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

    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.dataTables.css">
	
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
                        <i class="fa fa-bars fa-fw"></i> Checked In Vehicle
                    </div>
                    <div class="panel-body">
                        
                        <div class="row" >
                            <div class="col-lg-12" >
                            	<table class="table table-bordered table-hover table-striped" id="viewvehicle">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Model</th>
                                                <th>Reg. Num.</th>
                                                <th>Lot Num.</th>
                                                <th>Starting Date</th>
                                                <th>Checkout</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($sa = $stmta->fetch(PDO::FETCH_ASSOC)) {  ?>
                                            <tr>
                                                <td><?php echo $sa["cartype"]; ?></td>
                                                <td><?php echo $sa["carmodel"]; ?></td>
                                                <td><?php echo $sa["carplat"]; ?></td>
                                                <td><?php echo $sa["lot"]; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($sa["date_from"])); ?></td>
												<td><a id="<?php echo $sa["pkparking"]; ?>" class="btn btn-sm btn-info checkout" style="padding:2px;" href="#">Check-Out</a></td>
                                            </tr>
											
                                        <?php } ?>    
                                        </tbody>
                               </table>
                            </div>
                        </div>
						
                     </div>
                     </div>
                </div> 
                    
        </div>
		
		
		
		
		<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bars fa-fw"></i> Checked Out Vehicle
                    </div>
                    <div class="panel-body">
                        
                        <div class="row" >
                            <div class="col-lg-12" >
                            	<table class="table table-bordered table-hover table-striped" id="viewvehicleout">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Model</th>
                                                <th>Reg. Num.</th>
                                                <th>Lot Num.</th>
                                                <th>Starting Date</th>
                                                <th>Ending Date</th>
                                                <th>Days</th>
                                                <th>Total (RM)</th>
                                                <th>Checkout</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($sb = $stmtb->fetch(PDO::FETCH_ASSOC)) {  ?>
                                            <tr>
                                                <td><?php echo $sb["cartype"]; ?></td>
                                                <td><?php echo $sb["carmodel"]; ?></td>
                                                <td><?php echo $sb["carplat"]; ?></td>
                                                <td><?php echo $sb["lot"]; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($sb["date_from"])); ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($sb["date_to"])); ?></td>
                                                <td><?php echo $sb["days"]; ?></td>
                                                <td>RM <?php echo $sb["total"]; ?>.00</td>
												<td><btn class="btn btn-sm btn-success" style="padding:2px;" >Checked-Out</btn></td>
											</tr>
                                        <?php } ?>    
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
    <script type="text/javascript" charset="utf8" src="../js/jquery.dataTables.js"></script>
    <script type="text/javascript">
	$(document).ready( function () {
		$('#viewvehicle').DataTable({
		searching: true,
		paging: false,
		ordering:  true,
		});
		$('#viewvehicleout').DataTable({
		searching: true,
		paging: false,
		ordering:  true,
		});
	} );
	</script>

    
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>



    <script src="../dist/js/sb-admin-2.js"></script>
	<script type="text/javascript" >
		$(document).ready(function()
		{
			$('table#viewvehicle td a.checkout').click(function()
			{
				if (confirm("Are you sure you want to check-out your vehicle?"))
				{
					var id = $(this).attr('id');
					var data = 'id=' + id ;
					var parent = $(this).parent().parent();
					$.ajax(
					{
						   type: "POST",
						   url: "http://<?php echo $webaddress; ?>/checkoutvehicle.php",
						   dataType: "json",
						   data: data,
						   cache: false,
						   success: function()
						   {
							setTimeout(function(){location.reload(true);},50)
						   }
					 });
				}
			});
		});
		</script>
    
 	
    

</body>

</html>
