<?php

session_start();



include"connect.php";



$email=$_POST["email"];

$pwd=md5($_POST["password"]);


//CONTROLLO CON EMAIL
$sql="

SELECT *

FROM login

WHERE email='$email' AND password='$pwd'";



$result=$conn->query($sql);

$nrows=$result->num_rows;

echo $sql;
echo $nrows;

if($nrows>0){ 

	while ($row = $result->fetch_assoc()) {
		if($row["confermato"]==1){
			$_SESSION["id"]=$row["ID"];

			$_SESSION["username"]=$row["username"];
			$_SESSION["email"]=$row["email"];
			echo $row["username"];
			echo $row["email"];

			echo $row["password"];

		}else
			header("Location: index.php?error=Email dell'utente non ancora confermata");


	}

	header("Location: index.php"); //in qualsiasi caso ti riporta alla home, loggato o no


}
//CONTROLLO CON USERNAME
else {
	$sqlUsername="

	SELECT *

	FROM login

	WHERE username='$email' AND password='$pwd'";

	$resultUsername=$conn->query($sqlUsername);

	$nrowsUsername=$resultUsername->num_rows;

	echo $sqlUsername;
	echo $nrowsUsername;


	if($nrowsUsername>0){

		while ($row2 = $resultUsername->fetch_assoc()) {
			if($row2["confermato"]==1){

				$_SESSION["id"]=$row2["ID"];

				$_SESSION["username"]=$row2["username"];

				echo $row2["username"];
				echo $row2["email"];

				echo $row2["password"];


			}
			else
				header("Location: index.php?error=Email dell'utente non ancora confermata");

		}

		header("Location: index.php");


	}else{ //se ne mail ne username = no utente
		header("Location: index.php?error=Utente non presente nel database");

	}
	



}




?>