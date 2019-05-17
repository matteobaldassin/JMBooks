<?php
include "connect.php";
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

	?>