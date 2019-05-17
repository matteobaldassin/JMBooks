<?php
session_start();
include "chkSession.php";
include "stile.php";
//check if user logged correctly

?>

<html>
<head>
	<title>VENDI</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript">
		function goToPage(url)
		{
			window.location=url;
		}

	</script>
	

</head>

<body align="center">

	<h2 style="padding-left: 5%; padding-top: 3%;"> Vendi un libro </h2>
	<form action="aggiungiLibro.php" method="post" enctype="multipart/form-data">

	<div class="container pl-5 pr-5 pt-3 ">

		<!-- Jumbotron -->
		<div id="pagina">
			<div class="jumbotron text-center">
				<!-- Title -->
				<h2 class="card-title h2 pb-4">Inserisci il libro da vendere</h2>
				<!-- Subtitle -->
				<!--<p class="blue-text my-4 font-weight-bold">Inserisci la mail con cui ti sei registrato per resettarla</p>-->

				<!-- Grid row -->
				<div class="row d-flex justify-content-center">
					<div class="col-xl-5 pb-2">
						<div class="form-group row">
							<div class="col-sm-10">
								<div class="md-form mt-0">
									<input type="text" class="form-control" id="titolo" placeholder="Titolo" name="titolo" required>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-10">
								<div class="md-form mt-0">
									<input type="text" class="form-control" id="isbn" placeholder="ISBN" name="isbn" required>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-10">
								<div class="md-form mt-0">
									<input type="text" class="form-control" id="autore" placeholder="Autore" name="autore" required>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<!--<label for="anno" class="col-sm-2 col-form-label">Anno</label>-->
							<div class="col-sm-10">
								<div class="md-form mt-0">
									<input type="text" class="form-control" id="anno" placeholder="Anno" name="anno" required>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-10">
								<div class="md-form mt-0">
									<input type="text" class="form-control" id="prezzo" placeholder="Prezzo" name="prezzo" required>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-10">
								<div class="md-form mt-0">
									<input type="file" name="fileToUpload" id="fileToUpload">
								</div>

							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-10">
								<div class="md-form mt-0">
									<select class="browser-default custom-select" name="qualita" required>
										<option disabled selected value> -- Seleziona lo stato del libro -- </option>
										<option value="Mai aperto">Mai Aperto</option>
										<option value="Usato senza sottolineature">Usato ma senza sottolineature</option>
										<option value="Sottolineato a matita">Sottolineato a matita</option>
										<option value="Sottolineato in penna">Sottolineato in penna</option>
										<option value="Molto usurato">Molto usurato</option>
										<option value="Fotocopiato">Fotocopiato</option>
									</select>
								</div>

							</div>
						</div>
						<div class="form-group row">
							<span class="pl-4"><label>Luogo d'incontro </label></span>
							<div class="col-sm-10">

								<div class="md-form mt-0 pl-4" id="radioButtonDiv">
									<!-- Default unchecked -->
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="defaultUnchecked" name="incontro" value="Incontro a scuola" required>
										<label class="custom-control-label" for="defaultUnchecked">Scuola</label>
									</div>

									<!-- Default checked -->
									<div class="custom-control custom-radio">
										<input type="radio" class="custom-control-input" id="defaultChecked" name="incontro" value="Da definirsi" required>
										<label class="custom-control-label" for="defaultChecked">Altro</label>
									</div>

								</div>


							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-10">
								<!--Material textarea-->
								<div class="md-form">
									<textarea id="form7" class="md-textarea form-control" rows="3" id="note" name="note"></textarea>
									<label for="form7">Ulteriori note</label>
								</div>

							</div>
						</div>

							<!-- Grid row -->
							<div class="form-group row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-primary ">Vendi il mio libro!</button>
								</div>
							</div>
							<!-- Grid row -->
					</div>

					<!-- Horizontal material form -->
					<!-- Grid column -->

				</div>
			</div>
			<!-- Grid row -->

		</div>
		<!-- Jumbotron -->
	</div>
	</form>

<?php include "footer.php" ?>

</body>
</html>