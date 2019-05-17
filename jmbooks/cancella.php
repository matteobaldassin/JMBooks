<?php 
session_start();
include "connect.php";

$utenteSessione=$_SESSION["username"];
$idLibro=$_GET["id"];
$sql="UPDATE libro SET eliminato=true WHERE ID=$idLibro AND username='$utenteSessione'";

$result=$conn->query($sql);
if($result===TRUE)
	header("Location: account.php?message=Libro eliminato definitivamente");
else
	header("Location: account.php?error=Errore nell'eliminazione dal DB");





?>