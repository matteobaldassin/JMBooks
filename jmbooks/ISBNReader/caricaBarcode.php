<?php
$target_dir = "barcodes/";
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
		echo "The file ". $nomeFile. " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}
}else{
	echo "Nome file non trovato";
	echo "Nome: ".$nomeFile;

}

if($uploadOk==1){
    echo "possibile redirect";
	$url = "http://zteobalda.pythonanywhere.com/getbarcode/".$nomeFile; 
	//echo "URL: ".$url; //per debug
  	$ch = curl_init(); // start CURL
	curl_setopt($ch, CURLOPT_URL, $url); // set your URL
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // get the response as a variable
	$json = curl_exec($ch); // connect and get your JSON response 
	curl_close($ch);
	//echo "<pre>$json</pre>";
/* output
hello world!
*/
	if(isset($json))
		$risposta = json_decode($json);
		echo "<h1>ISBN LETTO: <b>".$risposta->return."</h1>";
}


?>