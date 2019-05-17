<?php
include "connect.php";
session_start();

$username=$_SESSION["username"];

$target_dir = "fotoProfilo/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$nomeFile=basename($_FILES["fileToUpload"]["name"]);
if($nomeFile!=""){
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$nome_fotoProfilo=$username.uniqid().".".$imageFileType;

// Check if image file is a actual image or fake image
	if(isset($_POST["submit"]) && isset($_FILES['file'])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		echo "come si dovrebbe chiamare: ".$nome_fotoProfilo;
		rename($target_file,$target_dir.$nome_fotoProfilo);
		//echo "rinominato!";
		$sql="UPDATE login SET fotoProfilo='$nome_fotoProfilo' WHERE username='$username'";
		echo $sql;
		$result=$conn->query($sql);
		if($result)
			header("Location: account.php?message=Foto profilo aggiornata correttamente!");

	} else {
		echo "Sorry, there was an error uploading your file.";
		header("Location: account.php?error=Mi spiace, si è verificato un errore durante il caricamento del file");
	}
}
}else{
	echo "Nome file non trovato";
	echo "Nome: ".$nomeFile;

}

?>