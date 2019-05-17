<?php

	if(!isset($_SESSION["username"])){
	//		
		if($_SERVER['REQUEST_URI']=="/vendiLibro.php")
			header('Location: index.php?error=Esegui il login/registrazione prima di accedere a questa pagina' );
		else
			header('Location: index.php?error=Non sei autorizzato a visualizzare questa pagina');

		die();

	}



?>