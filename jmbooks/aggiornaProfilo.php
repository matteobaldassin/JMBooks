<?php
session_start();
include "connect.php";
$username=$_SESSION["username"];

$dataNascita=$_POST["date"];
$indirizzo=$_POST["selectIndirizzoName"];
$classe=$_POST["selectClasse"];
$citta=$_POST["selectCitta"];

if($_POST["telefono"]!="")
	$telefono=$_POST["telefono"];
else
	$telefono=NULL;

$sql="SELECT * FROM login WHERE username='$username'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
if(isset($row["dataUltimoAggiornamento"])){

	//data di oggi
	$date = new DateTime();
	$date=$date->format('Y-m-d H:i:s');  
	//data dell'ultimo aggiornamento
	$dataLetta=new DateTime($row["dataUltimoAggiornamento"]);
	$dataLetta=$dataLetta->format('Y-m-d H:i:s');
	//data creazione dell'account
	$dataCreazione=new DateTime($row["data_creazione"]);
	$dataCreazione=$dataCreazione->format('Y-m-d H:i:s');
	//parsing delle date
	$data1=new DateTime($date);
	$data2=new DateTime($dataLetta);
	$dataCreazione= new DateTime($dataCreazione);
	if($dataCreazione==$data2){
		echo "modifica eseguibile perche date uguali!";

		echo $dataNascita;
		echo $indirizzo;
		echo $classe;
		echo $citta;
		$dataAdesso = new DateTime(); $dataAdesso=$dataAdesso->format('Y-m-d H:i:s'); 
		$sql="UPDATE login SET telefono='$telefono',dataNascita='$dataNascita', indirizzoScuola='$indirizzo', classeScuola='$classe', cittaUtente='$citta', dataUltimoAggiornamento='$dataAdesso' WHERE username='$username'";
		echo $sql;
		$result=$conn->query($sql);
		if($result)
			header("Location: account.php?message=Modifiche effettuate correttamente! Attendi 60 minuti prima di effettuare di nuove");
			
	}else
	{
	//calcolo intervallo
		$interval = $data1->diff($data2);
	//scrivo per debug
	/*$test=$interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
		echo "INTERVALLO: ".$test;
*/

	//calcola i minuti distanza
		$minutes = $interval->days * 24 * 60;
		$minutes += $interval->h * 60; 
		$minutes += $interval->i;
	//scrivo per debug i minuti
	//echo $minutes.' minutes';
	// se i minuti di differenza tra la data ultima modifica e adesso sono <60, error message: attendi
		if($minutes<60){
			$rimangono=60-$minutes;
			echo "Rimangono ".$rimangono."minuti prima di poter effettuare una nuova modifica";
			header("Location: account.php?error=Rimangono ".$rimangono." minuti prima di poter effettuare una nuova modifica");
		}
	else {//eseguo query
		echo "modifica eseguibile!";

		echo $dataNascita;
		echo $indirizzo;
		echo $classe;
		echo $citta;
		$dataAdesso = new DateTime(); $dataAdesso=$dataAdesso->format('Y-m-d H:i:s');  
		$sql="UPDATE login SET telefono='$telefono',dataNascita='$dataNascita', indirizzoScuola='$indirizzo', classeScuola='$classe', cittaUtente='$citta', dataUltimoAggiornamento='$dataAdesso' WHERE username='$username'";

		$result=$conn->query($sql);
		if($result)
			header("Location: account.php?message=Modifiche effettuate correttamente! Attendi 60 minuti prima di effettuare di nuove");
			
	}
			echo "TELEFONO: ".$telefono;

}

}else
echo "non settata";

?>