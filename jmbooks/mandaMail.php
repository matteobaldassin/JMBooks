

<?php


include "connect.php";
include "sendGrid_setup.php";
session_start();

//funzione per verificare captcha
function post_captcha($user_response) {
	$fields_string = '';
	$fields = array(
		'secret' => '6LejWpwUAAAAANg5Vq50eWhFibqVARpcbVj0R6na',
		'response' => $user_response
	);
	foreach($fields as $key=>$value)
		$fields_string .= $key . '=' . $value . '&';
	$fields_string = rtrim($fields_string, '&');

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
	curl_setopt($ch, CURLOPT_POST, count($fields));
	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

	$result = curl_exec($ch);
	curl_close($ch);

	return json_decode($result, true);
}

// Call the function post_captcha
$res = post_captcha($_POST['g-recaptcha-response']);

if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
	header("Location: index.php?error=Captcha non verificato correttamente, riprova");
} else { //se captcha verificato fai-->

	$getPassword = $_POST["user-pass"];
	$getPassword2 = $_POST["user-repeatpass"];

	$username = $_POST["user-name"];
	$emailUtente=$_POST["user-email"];
	$username=$_POST["user-name"];
	if($_POST["user-telefono"]!=null)
		$telefono=$_POST["user-telefono"];




	$token=md5(uniqid());
	$random=rand(1000,1000000);
$_SESSION["random"] = $random; // da verificare, DA PROBLEMI!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($getPassword==$getPassword2 ){
	$password=md5($getPassword); //setta la password in md5

	if(isset($telefono))
		$sql = "INSERT INTO login (username,password,email,telefono,token,fotoProfilo) VALUES ('$username', '$password','$emailUtente','$telefono','$token','default-account.png')";
	else
		$sql = "INSERT INTO login (username,password,email,token,fotoProfilo) VALUES ('$username', '$password','$emailUtente','$token','default-account.png')";

	echo $sql;

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		//$_SESSION["username"]=$username;
		$conn->close();
		
		$email->setFrom("info@jmbooks.com", "JMBooks");
		$email->setSubject("Conferma account - JMBOOKS");
		$email->addTo($emailUtente, $username);
		//$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
		$email->addContent(
			"text/html", "<b>Ciao ".$username."</b><br> Conferma il tuo account per continuare <br>  <a href='www.jmbooks.altervista.org/checkRegistrazione.php?token=$token'>CLICCA QUI PER COMPLETARE LA REGISTRAZIONE</a>"
		);

		try {
			$sendgrid->send($email);
			//header("location: index.php?message=Email inviata correttamente, controlla nella cartella spam se non la trovi");

			 //stampa risposta all'invio mail
			$response = $sendgrid->send($email);
			print $response->statusCode() . "\n";
			print_r($response->headers());
			print $response->body() . "\n";
			
		} catch (Exception $e) {
			echo 'Caught exception: '. $e->getMessage() ."\n";

		}

	} else { //se query non andata a buon fine (es username o email uguale)
		header("Location: index.php?error=Utente gia presente nel database, cambia username o email");
		//echo $sql;
	}

	
}else
header("location: index.php?error=Errore password non uguale");


}









?>
