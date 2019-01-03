<?php


header('Content-type: application/json');
include("config.php");

if ($_POST["id"]) {	$id = $_POST["id"];
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
		} */
		$stmt = $dbo->prepare('SELECT * FROM parking WHERE pkparking = :id');		$stmt->bindParam(':id', $id, PDO::PARAM_STR);		$stmt->execute();		$s = $stmt->fetch(PDO::FETCH_ASSOC);				$cartype = $s["cartype"];
		date_default_timezone_set('Asia/Kuala_Lumpur');		$datea = date('Y-m-d');						$date_toc = strtotime(date('Y-m-d'));		$date_fromc = strtotime($s["date_from"]);				$days = $date_toc - $date_fromc;		$days = floor($days / (60*60*24) );						if ($cartype == "Motorcycle") {			if ($days <= "5") {				$total = "50";			} elseif (($days <= "15") && ($days > "5")) {				$total = "130";			} elseif (($days <= "35") && ($days > "15")) {				$total = "370";			} elseif ($days >= "45") {				$total = "910";			}				} elseif ($cartype == "Car") {			if ($days <= "5") {				$total = "100";			} elseif (($days <= "15") && ($days > "5")) {				$total = "280";			} elseif (($days <= "35") && ($days > "15")) {				$total = "820";			} elseif ($days >= "45") {				$total = "2260";			}					} elseif ($cartype == "MPV") {			if ($days <= "5") {				$total = "125";			} elseif (($days <= "15") && ($days > "5")) {				$total = "355";			} elseif (($days <= "35") && ($days > "15")) {				$total = "1045";			} elseif ($days >= "45") {				$total = "2935";			}					} elseif ($cartype == "4x4") {			if ($days <= "5") {				$total = "140";			} elseif (($days <= "15") && ($days > "5")) {				$total = "400";			} elseif (($days <= "35") && ($days > "15")) {				$total = "1000";			} elseif ($days >= "45") {				$total = "2800";			}					} elseif ($cartype == "Lorry") {			if ($days <= "5") {				$total = "200";			} elseif (($days <= "15") && ($days > "5")) {				$total = "580";			} elseif (($days <= "35") && ($days > "15")) {				$total = "1720";			} elseif ($days >= "45") {				$total = "4960";			}					} elseif ($cartype == "Trailer") {			if ($days <= "5") {				$total = "300";			} elseif (($days <= "15") && ($days > "5")) {				$total = "880";			} elseif (($days <= "35") && ($days > "15")) {				$total = "2640";			} elseif ($days >= "45") {				$total = "7720";			}					} elseif ($cartype == "Bus") {			if ($days <= "5") {				$total = "250";			} elseif (($days <= "15") && ($days > "5")) {				$total = "730";			} elseif (($days <= "35") && ($days > "15")) {				$total = "2170";			} elseif ($days >= "45") {				$total = "6310";			}					}								$calc = 1;				$sqlu = "UPDATE parking SET days = :days, total = :total, date_to = :date_to, calc = :calc WHERE pkparking = :pk LIMIT 1";		$se = $dbo->prepare($sqlu);		$se->bindParam(':days', $days, PDO::PARAM_STR);		$se->bindParam(':total', $total, PDO::PARAM_STR);		$se->bindParam(':date_to', $datea, PDO::PARAM_STR);		$se->bindParam(':calc', $calc, PDO::PARAM_STR);		$se->bindParam(':pk', $id, PDO::PARAM_STR);		$se->execute();
		echo json_encode("Delete Successful"); 


}


?>