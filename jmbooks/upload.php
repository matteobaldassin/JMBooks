<!-- Tipo di codifica dei dati, DEVE essere specificato come segue -->
<form enctype="multipart/form-data" action="" method="POST">
    <!-- MAX_FILE_SIZE (in Byte) deve precedere campo di input del nome file-->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000000" /> 
    <!-- Il nome dell'elemento di input determina il nome nell'array $_FILES -->
    Send this file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>

 
<?php
	//Costruisco il path completo di destinazione
	$uploaddir = "C:/xampp/htdocs/BALDASSIN/MYSQL-Cinema/images/";
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
    echo $uploadfile;

 
	//$_FILES['userfile']['tmp_name']: Il nome del file temporaneo in cui il file caricato è salvato sul server.
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		echo "File caricato correttamente!\n";
	} else {
		echo "Errore upload!\n";
	}
	
?>
