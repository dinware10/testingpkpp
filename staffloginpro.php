<?php
session_start(); 
include("config.php");

$email = $_POST["email"];
$pwd = $_POST["pwd"];


$stmt = $dbo->prepare("SELECT * FROM staff WHERE usern = :usern AND passd = :passd");
$stmt->bindParam(':usern', $email); 
$stmt->bindParam(':passd', $pwd);
$stmt->execute();

if ($stmt->rowCount() > 0) {
	
		$s = $stmt->fetch(PDO::FETCH_ASSOC);
		$_SESSION["user"] = 0;
		$_SESSION["id"] = $s["pkstaff"];
		
		header('Location: datab/pages/staff.php');

		}

		else

		{

		header("Location: stafflogin.php?error=1");

		}

?>