<?php

session_start();
include "connect.php";

$username=$_SESSION["username"];

$idLibro=$_GET["id"];
$azione=$_GET["azione"];


$sql="SELECT * FROM libro WHERE ID=$idLibro AND username='$username'";
$result=$conn->query($sql);

if($result){
	if($azione=="venduto")
		$sqlUpdate="UPDATE libro SET venduto=true WHERE ID=$idLibro";
	else if($azione=="rimettivendita")
		$sqlUpdate="UPDATE libro SET venduto=false WHERE ID=$idLibro";

	$resultUpdate=$conn->query($sqlUpdate);

	header("Location: account.php");

}else
	header("Location: index.php?error=Non sei autorizzato a farlo!");
?>