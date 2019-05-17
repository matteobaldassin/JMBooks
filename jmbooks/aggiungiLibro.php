<?php
session_start();
include "connect.php";

//include "chkSession.php";
//culo
$titolo=mysql_real_escape_string($_POST["titolo"]); //mysql_real_escape serve per togliere aggiugngere l'apostrofo nel database e praticamente scrive \ prima di esso
$isbn=$_POST["isbn"];
$autore=mysql_real_escape_string($_POST["autore"]);
$anno=$_POST["anno"];
$prezzo=$_POST["prezzo"];
if(strpos($prezzo, ',') !== false){
	$prezzo=str_replace(",",".",$prezzo);
}
$qualita=$_POST["qualita"];
$incontro=$_POST["incontro"];
$note=$_POST["note"];
$utente=$_SESSION["username"];
//per upload file

$target_dir = "fotoLibri/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$target_file = $target_dir . uniqid().".jpg";
$uploadOk = 1;
$nomeFile=basename($_FILES["fileToUpload"]["name"]);
echo $target_dir;
echo $target_file;
if($nomeFile!=""){
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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
	if ($_FILES["fileToUpload"]["size"] > 5000000) {
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
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}
}else{
	echo "Nome file non trovato";
	echo "Nome: ".$nomeFile;

}

if(strlen($isbn)>13)
	header("Location: vendiLibro.php?error=ISBN inserito troppo lungo");
else
{




    //----------SCRIPT PER CANCELLARE------------------

    //data di oggi
	$date = new DateTime();
	$date=$date->format('Y-m-d');    

	$sql= "SELECT * FROM login";
	$result=$conn->query($sql);

	while($row = $result->fetch_assoc())
	{
		$dataLetta=new DateTime($row["data_creazione"]);
		$dataLetta=$dataLetta->format('Y-m-d');

    	//echo "OGGI:".$date;
    	//echo "PUBB:".$dataLetta."<br>";
    	// va fatto perche una delle 2 stringhe viene inserita come string, non so perche, ma cosi funziona
		$data1=new DateTime($date);
		$data2=new DateTime($dataLetta);
		$interval = $data2->diff($data1);
    	//prende i giorni
		$interval=$interval->format('%a');
		echo "RESULT:".$interval." days";
    	//se l'utente è stato creato da + di 30 gg e non è stto ancora confermato
		if($interval>30 && $row["confermato"]==0){
			echo "MAGGIORE, DA ELIMINARE";
			$id=$row["ID"];
			$sqlDelete="DELETE FROM login WHERE ID=$id";
			$resultDelete=$conn->query($sqlDelete);
			if($resultDelete===TRUE)
				echo "cancellazione eseguita";
		}

	}


	$sql = "INSERT INTO libro (username,titolo,isbn,autore,anno,immagine,prezzo,qualita,incontro,note) VALUES ('$utente', '$titolo','$isbn','$autore','$anno','$nomeFile','$prezzo','$qualita','$incontro','$note')";
    //$result = $conn->query($sql);
	if($conn->query($sql) === TRUE){
		$conn->close();
		header("Location: cercaLibro.php?message=Libro inserito correttamente");
	}else{
		$conn->close();
		header("Location: vendiLibro.php?error=Errore aggiunta libro");
	}

    /*echo $sql; //for debug
	echo $result;
	*/


}




?>
