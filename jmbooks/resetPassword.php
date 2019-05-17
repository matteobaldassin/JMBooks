<?php

include "connect.php";
include "sendGrid_setup.php";


if($_GET["conferma2"]=="OK"){
	$id=$_GET["id"];
	$psw1=$_POST["password1"];
	$psw2=$_POST["password2"];

	if($psw1==$psw2){
		$psw=md5($psw1);
		$sql="UPDATE login SET password='$psw' WHERE id=$id";
		echo $sql;

		if ($conn->query($sql) === TRUE) {
			echo "Record updated successfully";
			header("Location: index.php?message=Password resettata correttamente");
		} else {
			echo "Error updating record: " . $conn->error;
		}
	}

	
}else
{
//function funzione(){
	if(isset($_POST['email'])){
		$emailUtente=$_POST["email"];
		$sql="SELECT ID FROM login WHERE email='$emailUtente'";
		echo $emailUtente;
		echo $sql;
		$result=$conn->query($sql);
		if($result->num_rows>0) { //vuol dire che c'e utente
		$row = $result -> fetch_assoc();
		$id= $row["ID"];
			//echo "EMAIL: ".$_POST["email"];
		$subject = "Reset email JMBooks.com";
		$email->setFrom("info@jmbooks.com", "JMBooks");
		$email->setSubject("Reset password - JMBOOKS");
		$email->addTo($emailUtente, "Utente");
		//$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
		$email->addContent(
			"text/html", "<html>
			<head>
				<title>HTML email</title>
			</head>
			<body>
				<p>Resetta la mail scemo</p>
				<a href='www.jmbooks.altervista.org/forgotPassword.php?conferma=OK&id=$id'>RESETTA</a>
			</body>
			</html>"
			);

		try {
			if($sendgrid->send($email))		
				header("location: index.php?message=Email inviata correttamente, controlla nella cartella spam se non la trovi");
			else
				header("location: index.php?error=Errore nell'invio della mail");


			
		} catch (Exception $e){
			echo 'Caught exception: '. $e->getMessage() ."\n";
		}
	}
}else
echo "email non inserita";
}






?>

?>