	<?php 
	include "connect.php";
	include "sendGrid_setup.php";

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
			<a href='www.jmbooks.altervista.org/resetPassword.php?id=$id'>RESETTA</a>
			</body>
			</html>"
		);

		try {
			//header("location: index.php?message=Email inviata correttamente, controlla nella cartella spam se non la trovi");

			
			$response = $sendgrid->send($email);
			print $response->statusCode() . "\n";
			print_r($response->headers());
			print $response->body() . "\n";
			
		} catch (Exception $e){
			echo 'Caught exception: '. $e->getMessage() ."\n";
		}
	}
}else
	echo "email non inserita";



?>