<?php

session_start();

$id=$_POST["id"];
$email=$_POST["email"];
$name=$_POST["name"];
$fotoProfilo=$_POST["foto"];
	/*
	$_SESSION["id"] = $id;
	$_SESSION["name"] = $name;
	$_SESSION["email"] = $email;
	*/


/*
	$id=$_POST["id"];
	$email=$_POST["email"];
	$name=$_POST["name"];
*/
	include "connect.php";

	$sql = "SELECT * FROM login WHERE email='$email'";
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	echo "SQL1: ".$sql;

	if(!isset($row["username"]))
		$username=str_replace("@gmail.com", "", $email);
	else
		$username=$row["username"];
	$_SESSION["username"]=$username;
	

	if(!empty($result->fetch_assoc())){
		$sql2 = "UPDATE login SET IDGoogle='$id', fotoProfilo='$fotoProfilo' WHERE email='$email'";

	}else{
		$sql2 = "INSERT INTO login (idGoogle, username, email, fotoProfilo, confermato) VALUES ('$id', '$username', '$email', '$fotoProfilo', true)";
	}


	$result2=$conn->query($sql2);

	echo "SQL2: ".$sql2.$result2;

	if($result2)
		echo "Updated Successful";

	//header("Location: cercaLibro.php");
	
	?>