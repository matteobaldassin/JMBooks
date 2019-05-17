<?php 
include "connect.php";
include "cancellaNonConfermati.php";

session_start();

$token=$_GET["token"];
/*
echo $valore."\r\n";
echo $_SESSION["random"];
*/
$sql = "SELECT * FROM login";
$result=$conn->query($sql);
echo $token;
echo $sql;
while($row = $result->fetch_assoc()){
	echo "user: ".$row["username"]." token: ".$row["token"]."\n\r";
	if($row["token"]==$token){
		//trovato e aggiorna a TRUE il "confermato"
		$sql="UPDATE login SET confermato=true WHERE token='$token'";
		if($conn->query($sql)===TRUE){
			//pulisce il token
			$sql="UPDATE login SET token='' WHERE token='$token'";
			echo $sql;
			$conn->query($sql);
			$username=$row["username"];
			header("location: index.php?message=Account creato correttamente, benvenuto $username");
			$_SESSION["username"]=$username;
			$conn->close();

		}else echo "errore nella query ".$sql;
	}else
		echo "non entrato";

}
/*
//if($valore==$_SESSION["random"]){
echo "entrato 2";
				//da fare dopo controllo
$telefono=$_SESSION["telefono"];
$email=$_SESSION["email"];
$username=$_SESSION["usernameRegister"];
$password=$_SESSION["password"];
echo "USER: ".$username;

if(isset($telefono))
	$sql = "INSERT INTO login (username,password,email,telefono) VALUES ('$username', '$password','$email','$telefono')";
else
	$sql = "INSERT INTO login (username,password,email) VALUES ('$username', '$password','$email')";


echo $sql;

if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	header("location: index.php?message=Account creato correttamente, benvenuto $username");
	$_SESSION["username"]=$username;


} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

//}

*/

?>