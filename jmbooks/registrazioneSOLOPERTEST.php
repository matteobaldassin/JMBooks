<?php


include "connect.php";
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
        
    if($getPassword==$getPassword2 ){
        $password=md5($getPassword); //setta la password in md5
        if(isset($telefono))
		$sql = "INSERT INTO login (username,password,email,telefono,token,fotoProfilo,confermato) VALUES ('$username', '$password','$emailUtente','$telefono','UTENTE REGISTRATO SENZA MAIL CONFIRM','default-account.png',1)";
	    else
		$sql = "INSERT INTO login (username,password,email,token,fotoProfilo,confermato) VALUES ('$username', '$password','$emailUtente','UTENTE REGISTRATO SENZA MAIL CONFIRM','default-account.png',1)";

        echo $sql;
        
        if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
		$_SESSION["username"]=$username;
        $conn->close();
        header("Location: index.php?message=Benvenuto ".$username);
        }else // se query non andata a buon fine
            header("Location: index.php?error=Utente gia presente nel database, cambia username o email");

    }else
        header("location: index.php?error=Errore: password non uguale");

    

}

?>