<?php


header('Content-type: application/json');


include("config.php");



if ($_POST["id"]) {
	
	

		 $sql = "DELETE FROM staff WHERE pkstaff = :pk";
		 $stmt = $dbo->prepare($sql);
		 $stmt->bindParam(':pk', $_POST["id"], PDO::PARAM_STR);
		 $stmt->execute();
		 
		 
		 echo json_encode("Delete Successful"); 


}


?>