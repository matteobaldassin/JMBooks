<?php
session_start();
include "chkSession.php";
include "stile.php";
include "connect.php";

//get i valori dell utente
$username=$_SESSION["username"];

$sql="SELECT * FROM login WHERE username='$username'";
$result=$conn->query($sql);
//echo $sql;

while($row = $result->fetch_assoc()){
	$email=$row["email"];
	$telefono=$row["telefono"];
	if(strpos($row["fotoProfilo"], 'http') !== false)
		$fotoProfilo=$row["fotoProfilo"];
	else
		$fotoProfilo='fotoProfilo/'.$row["fotoProfilo"];
	//prende la data di nascita formattata in YYYY-MM-DD e la converte nel formato italiano DD-MM-YYYY, sarebbe da modificare nel DB
	//$dataNascita=date("d-m-Y", strtotime($row["dataNascita"]));
	//SAREBBE DA IMPLEMENTARE MA DA PROBLEMA PER LA SELEZIONE NEL CALENDARIO POI
	$dataNascita=$row["dataNascita"];
	$indirizzoScuola=$row["indirizzoScuola"];
	$classeScuola=$row["classeScuola"];
	$cittaUtente=$row["cittaUtente"];


	/*echo "DATA:".$dataNascita;
	echo "indirizzo:".$indirizzoScuola;
	echo "classe:".$classeScuola;
*/

// e tutto il resto
}

?> 
<html>
<head>
	<title>ACCOUNT</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript">
		function goToPage(url)
		{
			window.location=url;
		}

	</script>

	<style>
		.nopadding {
			padding: 0 !important;
			margin: 0 !important;
		}
	</style>

	<script>
		$('#inputGroupFile01').change(function() {
			var i = $(this).prev('label').clone();
			var file = $('#inputGroupFile01')[0].files[0].name;
			$(this).prev('label').text(file);
		});
	</script>

	<script>
		function funzioneSeleziona(){
			var indirizzo = "<?php echo $indirizzoScuola ?>"; 
			var classe = "<?php echo $classeScuola ?>"; 
			 


			if(indirizzo!=null)
				document.getElementById("selectIndirizzo").value=indirizzo;
			if(classe!=null)
				document.getElementById("selectClasse").value=classe;
			

		}
	</script>



	<!-- Latest compiled and minified CSS -->

	<!-- Latest compiled and minified JavaScript -->
</head>
<!-- MODAL CAMBIA PASSWORD START-->
<form action="cambiaPassword.php" method="POST" > 
	<div class="modal fade" id="modalCambiaPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Cambia password</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<div class="md-form mb-5">
					<i class="fas fa-envelope prefix grey-text"></i>
					<input type="text" id="oldPass" class="form-control validate" name="oldPass">
					<label data-error="wrong" data-success="right" for="oldPass">Vecchia password</label>
				</div>

				<div class="md-form mb-4">
					<i class="fas fa-lock prefix grey-text"></i>
					<input type="text" id="defaultForm-pass1" class="form-control validate" name="newPass1">
					<label data-error="wrong" data-success="right" for="defaultForm-pass1">Nuova password</label>
				</div>
				<div class="md-form mb-4">
					<i class="fas fa-lock prefix grey-text"></i>
					<input type="text" id="defaultForm-pass2" class="form-control validate" name="newPass2">
					<label data-error="wrong" data-success="right" for="defaultForm-pass2">Ripeti password</label>
				</div>

			</div>
			<div class="modal-footer d-flex justify-content-center">
				<input type="submit" class="btn btn-default" value="CAMBIA">
			</div>
		</div>
	</div>
</div>
</form>
<!-- MODAL CAMBIA PASS FINISH-->

<!-- MODAL CAMBIA PROFILO START-->
<form action="cambiaFotoProfilo.php" method="POST" id="form-profilo" enctype='multipart/form-data'>
	<div class="modal fade" id="modalCambiaProfilo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Cambia foto profilo</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<div class="text-center">
								<h5> Vecchia foto profilo </h5>
								<img src=<?php echo "'".$fotoProfilo."'"?>>
							</div>
						</div>
						<div class="col-md-4">
							<h5> Nuova foto profilo </h5>
							<div class="input-group">

								<div class="custom-file">
									<input type="file" class="custom-file-input" id="inputGroupFile01"
									aria-describedby="inputGroupFileAddon01" name="fileToUpload">
									<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="modal-footer d-flex justify-content-center">
				<input type="submit" name="LOGIN" class="btn btn-default" >
			</div>
		</div>
	</div>
</div>
</form>
<!-- MODAL PROFILO FINISH-->
<body align="center" onload="funzioneSeleziona()">

	<div class="fluid-container pt-5">
		<form action="aggiornaProfilo.php" method="POST">

			<div class="row nopadding">
				<div class="col-md-2" >
					<div class="text-center">
						<?php echo "<h2>".$username."</h2>" ?>
						<img src=<?php echo "'".$fotoProfilo."'" ?> class="img-fluid rounded" ><br>
						<a href="" data-toggle="modal" data-target="#modalCambiaPassword"><button type="button" class="btn btn-primary">Cambia password</button></a>
						<br>
						<a href="" data-toggle="modal" data-target="#modalCambiaProfilo"><button type="button" class="btn btn-primary">Cambia foto profilo</button></a>

					</div>

				</div>

				<div class="col-md-5" >
					<h3>Informazioni di contatto</h3>

					<div class="md-form input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text md-addon" id="username">Username</span>
						</div>
						<input type="text" class="form-control" placeholder=<?php echo "'$username'" ?> aria-label="Username" aria-describedby="username" readonly>
					</div>
					<div class="md-form input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text md-addon" id="email">Email</span>
						</div>
						<input type="text" class="form-control" placeholder=<?php echo "'$email'" ?> aria-label="Password" aria-describedby="email" disabled>
					</div>
					<div class="md-form input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text md-addon" id="telefono">Telefono</span>
						</div>
						<?php
						if($telefono!="")
							echo "<input type='text' class='form-control' value='$telefono' id = 'telInserito' aria-label='Telefono' aria-describedby='telefono' name='telefono' >";
						else
							echo "<input type='text' class='form-control' aria-label='Telefono' id='telVuoto' aria-describedby='telefono' name='telefono' >";
						?> 
					</div>

					<div class="md-form input-group mb-3">
						<!--https://formden.com/blog/date-picker-->

						<div class="input-group-prepend">
							<span class="input-group-text md-addon" id="dateLabel">Data di nascita</span>
						</div>
						<input class="form-control" id="date" name="date" placeholder="DD-MM-YYYY" type="text" <?php if($dataNascita!="00-00-0000") echo "value='".$dataNascita."'" ?> required/>

					</div>
				</div>

				<div class="col-md-5">
					<br><br>
					<div class="md-form input-group mb-3 ">
						<div class="input-group-prepend">
							<span class="input-group-text md-addon" id="email">Indirizzo</span>
						</div>
						<select class="browser-default custom-select" name="selectIndirizzoName" id="selectIndirizzo" required>
							<option selected disabled hidden>Seleziona l'indirizzo che frequenti</option>
							<option value="Informatico">Informatico</option>
							<option value="AFM">AFM</option>
							<option value="RIM">RIM</option>
							<option value="Scientifico">Scientifico</option>
							<option value="Meccanico">Meccanico</option>
							<option value="Turistico">Turistico</option>
							<option value="Linguistico">Linguistico</option>
							<option value="Meccatronica ed Energia">Meccatronica ed Energia</option>

							<option value="Chimico">Chimico</option>
						</select>
					</div>

					<div class="md-form input-group mb-3 ">
						<div class="input-group-prepend">
							<span class="input-group-text md-addon" name="selectClasseLabel" id="email">Classe</span>
						</div>
						<select class="browser-default custom-select" name ="selectClasse" id="selectClasse" required>
							<option selected disabled hidden>Seleziona la classe</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>

						</select>
					</div>
					<div class="md-form input-group mb-3 ">
						<div class="input-group-prepend">
							<span class="input-group-text md-addon" id="email">Città</span>
						</div>
						<input type="text" class="form-control" name="selectCitta" placeholder=<?php echo "'$cittaUtente'" ?> aria-label="Città" aria-describedby="citta">
					</div>

					<button type="submit" class="btn btn-success btn-block">Aggiorna</button>
				</div>

			</form>

		</div>
		<div class="row nopadding">
			<div class="col-md-12 p-5">
			<?php
			//query per vedere il totale dei libri non venduti
				$sql="SELECT * FROM libro WHERE username='$username' AND venduto=0 AND eliminato=0";
				$result=$conn->query($sql);
				$nrows1=$result->num_rows; //nrows1 --> totale dei libri non venduti e non eliminati

				$sql="SELECT *,ROUND(prezzo,2) FROM libro WHERE username='$username' AND eliminato=0";
				$result=$conn->query($sql);

				$nrows2=$result->num_rows; //nrows2 --> totale dei libri non eliminati

				echo "<h2> I tuoi libri ancora in vendita: ".$nrows1."   <br>Libri già venduti: ".($nrows2-$nrows1)."</h2>";

			?>
				<div class="table-responsive text-nowrap">

					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Titolo</th>
								<th scope="col">Prezzo</th>
								<th scope="col">Visite</th>
								<th scope="col">Azione</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							//contatore per righe tabella
							$conta=1;

							
							if($result)
							{
								//libri presenti
								while($row=$result->fetch_assoc()){
										echo "<tr><td>".$conta++."</td>";
										echo "<td><a href=schedaLibro.php?id=".$row["ID"].">".$row["titolo"]."</a><br><a href='cancella.php?id=".$row["ID"]."' style='color:red'>Elimina definitivamente</a></td>";
										echo "<td>".$row["ROUND(prezzo,2)"]."€</td>";
										echo "<td>".$row["visite"]."</td>";
									if($row["venduto"]) // se è true
									echo "<td><a href='cambiaStatoLibro.php?id=".$row["ID"]."&azione=rimettivendita'><button type='button' class='btn btn-success '>Rimetti in vendita</button></a></td></tr>";
									else
										echo "<td><a href='cambiaStatoLibro.php?id=".$row["ID"]."&azione=venduto'><button type='button' class='btn btn-danger '>Segna come venduto</button></a></td></tr>";
								
							}
						}

						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
	$(document).ready(function(){
		var date_input=$('input[name="date"]'); //our date input has the name "date"
		var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: true,
		})
	})
</script>

<?php include "footer.php" ?>

</body>

</html>