<?php
session_start(); 
include("config.php");

$email = $_POST["email"];
$pwd = $_POST["pwd"];


$stmt = $dbo->prepare("SELECT * FROM admin WHERE usern = :usern AND passd = :passd");
$stmt->bindParam(':usern', $email); 
$stmt->bindParam(':passd', $pwd);
$stmt->execute();

if ($stmt->rowCount() > 0) {
	
		$s = $stmt->fetch(PDO::FETCH_ASSOC);
		$_SESSION["user"] = 3;
		$_SESSION["id"] = $s["pkadmin"];
		
		header('Location: datab/pages/admin.php');

		}

		else

		{

		header("Location: adminlogin.php?error=1");

		}

?>