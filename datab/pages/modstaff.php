<?php

header('Content-type: application/json');
include "config.php";

if ($_POST["name"] == "name") {

    
$sqlu = "UPDATE staff SET name = :value WHERE pkstaff = :pk LIMIT 1";
		
$se = $dbo->prepare($sqlu);
$se->bindParam(':value', $_POST["value"], PDO::PARAM_STR);
$se->bindParam(':pk', $_POST["pk"], PDO::PARAM_STR);
$se->execute();

echo json_encode($_POST["value"]);

}
elseif ($_POST["name"] == "ic") {

    
$sqlu = "UPDATE staff SET ic = :value WHERE pkstaff = :pk LIMIT 1";
		
$se = $dbo->prepare($sqlu);
$se->bindParam(':value', $_POST["value"], PDO::PARAM_STR);
$se->bindParam(':pk', $_POST["pk"], PDO::PARAM_STR);
$se->execute();

echo json_encode($_POST["value"]);

}
elseif ($_POST["name"] == "address") {

    
$sqlu = "UPDATE staff SET address = :value WHERE pkstaff = :pk LIMIT 1";
		
$se = $dbo->prepare($sqlu);
$se->bindParam(':value', $_POST["value"], PDO::PARAM_STR);
$se->bindParam(':pk', $_POST["pk"], PDO::PARAM_STR);
$se->execute();

echo json_encode($_POST["value"]);

}
elseif ($_POST["name"] == "tel") {

    
$sqlu = "UPDATE staff SET tel = :value WHERE pkstaff = :pk LIMIT 1";
		
$se = $dbo->prepare($sqlu);
$se->bindParam(':value', $_POST["value"], PDO::PARAM_STR);
$se->bindParam(':pk', $_POST["pk"], PDO::PARAM_STR);
$se->execute();

echo json_encode($_POST["value"]);

}

?>