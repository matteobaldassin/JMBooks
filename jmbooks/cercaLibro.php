<?php
session_start();
//include "chkSession.php";
include "stile.php";

header('Content-Type: text/html; charset=utf-8');

?>
<html>
<head>
	<title>CERCA</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript">
		function goToPage(url)
		{
			window.location=url;
		}
		function caso(){
			//devi scrivere nome dell'id della barra di navigazione mettere active true o false
		}

		function vaiACercaLibro()
		{
			window.location='cercaLibro.php';
		}

	</script>
	
	<style>
	.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
	</style>
</head>
<!-- MODAL ADVISE -->
	<div class="modal fade" id="modalAdviseForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Devi prima registrarti/loggare</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<div class="md-form mb-5">
					<h3 align="center">Non sei ancora registrato?</h3>
					<button  name="REGISTER" class="btn btn-primary btn-block" id="register" value="REGISTER" data-toggle='modal' data-target='#modalRegisterForm' data-dismiss="modal" >REGISTRATI </button>
				</div>

				<div class="md-form mb-5">
					<h3 align="center">Effettua il login!</h3>
					<button  name="LOGIN" class="btn btn-deep-orange btn-block" id="login" value="LOGIN" data-toggle='modal' data-target='#modalLoginForm' data-dismiss="modal" >LOGIN </button>
				</div>

			</div>

		</div>
	</div>
</div>
<!--MODAL REGISTER FINISH-->
<body align="center">
	<?php 
	include "connect.php";

	//function funzione(){
	if(isset($_POST['cerca'])){
/*echo '<script type="text/javascript">'.
     'var e = document.getElementById("buttonReset");
     e.removeAttribute("disabled");'.'</script>'  ;*/
     $cerca=$_POST["cerca"];
		//echo "CERCA: ".$_POST["cerca"];

     $sql1="SELECT *,ROUND(prezzo,2) FROM libro WHERE titolo LIKE '%$cerca%' AND venduto=false AND eliminato=false ";
     $sql2="SELECT *,ROUND(prezzo,2)	FROM libro 	WHERE isbn=$cerca AND venduto=false AND eliminato=false";
     $sql3="SELECT *,ROUND(prezzo,2)	FROM libro 	WHERE autore LIKE '%$cerca%' AND venduto=false AND eliminato=false ";
     $result=$conn->query($sql1);
     if($result->num_rows==0){
     	$result=$conn->query($sql2);
			//echo "entrato in titolo";
     	if($result->num_rows==0){
				//echo "entrato in isbn";
     		$result=$conn->query($sql3);
				//echo "entrato in autore";
     		if($result->num_rows==0){
						//$result="Nessun libro trovato con il parametro inserito";

     		}

     	}
     }


 }else{
 	$sql="SELECT *,ROUND(prezzo,2) FROM libro WHERE venduto=false AND eliminato=false ORDER BY dataPubblicazione DESC ";
 	$result=$conn->query($sql);
 }


	//}


 ?>
 <h2 style="padding-left:5%;padding-top: 3%"> Libri in vendita </h2>
 <div class="fluid-container">
 	<div class="row nopadding">
 		<div class="col-md-3">
 			<form action="" method="post">
 				<div class="card text-white bg-primary mb-3">
 					<div class="card-body">
 						<h5 class="card-title text-white ">Cerca libro</h5>
 						<h6 class="card-subtitle mb-2 text-white ">Inserisci il parametro di ricerca o il codice del libro</h6>
 						<div class="md-form">
 							<input type="text" id="inputMDEx" class="form-control text-white" name="cerca">
 							<label for="inputMDEx" class="text-white">Titolo, ISBN, Autore</label>
 						</div>
 						<button type="submit" class="btn btn-success ">Cerca</button>
 							<input type="button" class="btn btn-danger" id="buttonReset" value="Reset" onClick="goToPage('cercaLibro.php')">
 			

 					</div>
 				</div>
 			</form>
 		</div>
 		<div class="col-md-9">
 			<?php 		
				//per fare numero libri

			$nrowsN=$result->num_rows; //cioe il numero di libri presenti nel db
			if(isset($cerca))
				echo "<h2><b>".$nrowsN."</b> libri in vendita sul sito con parametro: ".$cerca."</h2>"; 
			else
				echo "<h2><b>".$nrowsN."</b> libri in vendita sul sito </h2>"; 


			?>
			<div class="table-responsive text-nowrap">

				<table class="table table-striped custab " id="dtBasicExample">
					<thead>
						<tr>
							<th>Titolo</th>
							<th>Autore</th>
							<th>Anno</th>
							<th>Qualità</th>
							<th class="text-center">Azione</th>
						</tr>
					</thead>
					<?php 
					if($result->num_rows>0){
						while ($row = $result->fetch_assoc()) {

							if(!$row["venduto"] && !$row["eliminato"]){ // senno non lo mostro
								echo "<tr>";
							echo "<td><b>".$row["titolo"]."</b></td>";

							echo "<td>".$row["autore"]."</td>";
							echo "<td>".$row["anno"]."</td>";
							echo "<td>".$row["qualita"]."</td>";
							echo "<td class='text-center'>";
							if(!isset($_SESSION["username"]))
								echo "<button class='btn btn-info' data-toggle='modal' data-target='#modalAdviseForm' data-dismiss='modal' value='compraloB'>Compralo a <b> ".$row["ROUND(prezzo,2)"]."€ </b></button><br>";
							else
								echo "<a class='btn btn-info  m-0' href='schedaLibro.php?id=".$row["ID"]."'><span class='glyphicon glyphicon-edit'></span> Compralo a <b>".$row["ROUND(prezzo,2)"]."€</b></a>";
 						
							echo "</tr>";
						}
							}
							
					}else
					echo "nessun risultato trovato";

					?>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php" ?>

	</body>
	</html>