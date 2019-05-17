<?php
include "connect.php";

$oldPass=md5($_POST["oldPass"]);
$newPass1=$_POST["newPass1"];
$newPass2=$_POST["newPass2"];

$sql="SELECT * FROM login WHERE password='$oldPass'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$lastID=$row["ID"];
echo "1:".$newPass1;
echo "2:".$newPass2;

if($result){
	if($newPass2==$newPass1){
		$crypt=md5($newPass1);
		$sql="UPDATE login SET password='$crypt' WHERE id=$lastID";
		$result=$conn->query($sql);
		echo $sql;
		echo $result;
		header("Location: account.php?message=Password aggiornata!");
	}else
		header("Location: account.php?error=Password non uguali");
}else
	header("Location: account.php?error=Vecchia password errata");
?>