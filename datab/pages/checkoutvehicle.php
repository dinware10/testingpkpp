<?php


header('Content-type: application/json');
include("config.php");

if ($_POST["id"]) {
/* 	function recursiveRemoveDirectory($directory)
		{
			foreach(glob("{$directory}/*") as $file)
			{
				if(is_dir($file)) { 
					recursiveRemoveDirectory($file);
				} else {
					unlink($file);
				}
			}
			rmdir($directory);
		}
		$stmt = $dbo->prepare('SELECT * FROM parking WHERE pkparking = :id');
		date_default_timezone_set('Asia/Kuala_Lumpur');
		echo json_encode("Delete Successful"); 


}


?>