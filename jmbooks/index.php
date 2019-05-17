<?php
session_start();
//include "chkSession.php";
include "stile.php";

?>
<html>
<head>

</head>
<body>
<!-- MODAL DONAZIONE START-->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
	<div class="modal fade" id="modalDonazione" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Effettua una donazione</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<div class="text-center">
				<div class="md-form mb-3">
					<h3> Ti piace il nostro lavoro? </h3>
					<p> Offrici un caffè, o qualcosa di più se vuoi </p>
				</div>

				<div class="md-form mb-4">
					<input type="hidden" name="cmd" value="_s-xclick" />
<input type="hidden" name="hosted_button_id" value="TMFXCWWLXSJJ8" />
<input type="image" class="img-fluid" src="http://jmbooks.altervista.org/img/donazione.png" width="400" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
<img alt="" border="0" src="https://www.paypal.com/en_IT/i/scr/pixel.gif" width="1" height="1" />
				</div>
				</div>
			</div>
		</div>
		</div>
</div>
</form>
<!-- MODAL DONAZIONE FINISH-->

<!-- MODAL ABOUTUS START-->
	<div class="modal fade" id="modalAboutUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Creatori</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<!--<div class="md-form mb-5">
					<p> Abbiamo pensato... perchè non creare una piattaforma che ti permette di vendere FACILMENTE e DA CASA i tuoi libri? </p>

				</div>
				-->
				<div class="md-form mb-5">
					<h3> Matteo Baldassin </h3>
					Sito web: <a href="www.matteobaldassin.com">www.matteobaldassin.com</a><br>
					Email: <a href="mailto:info@matteobaldassin.com">info@matteobaldassin.com</a>
				</div>
				<div class="md-form mb-5">
						<h3> Pirolo Davide </h3>
					Sito web: <a href="www.davidepirolo.com">www.davidepirolo.com</a><br>
					Email: <a href="mailto:dvdpiro@gmail.com">dvdpiro@gmail.com</a>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- MODAL ABOUTUS FINISH-->

	<!-- Jumbotron -->
	<div id="pagina">
		<div class="jumbotron text-center">

<!-- OLD VERSIOn 
			<h2 class="card-title h2">Benvenuto in JMBooks</h2>
			<p class="blue-text my-4 font-weight-bold">Un sito per lo scambio di libri per gli studenti dello Jean Monnet</p>
-->		<div class="row d-flex justify-content-center pb-4">
				<img src="img/logoHome370.png" class="img-fluid">
			</div>
			<!-- Grid row -->
			<div class="row d-flex justify-content-center ">

				<!-- Grid column -->
				<div class="col-xl-7 pb-2">

					<p class="card-text">
							Benvenuto in JMBooks, un portale creato da Matteo Baldassin, Davide Pirolo, Davide Ballabio e Andrea Leone, per permettere a 
							gli studenti dello Jean Monnet di comprare e vendere i propri libri.
					</p>

				</div>
				<!-- Grid column -->

			</div>
			<!-- Grid row -->

			<hr class="my-4">

			<div class="pt-2">
				<a href="" data-toggle="modal" data-target="#modalAboutUs"><button type="button" class="btn btn-blue waves-effect" onclick="">Chi siamo <span class="fas fa-question ml-1"></span></button></a>
				<button type="button" class="btn btn-outline-primary waves-effect" onClick="document.getElementById('carte').scrollIntoView();">Compra <i class="fas fa-shopping-cart ml-1"></i></button>	
				<a href="" data-toggle="modal" data-target="#modalDonazione"><button type="button" class="btn btn-blue waves-effect" onclick="">Donazione <span class="fas fa-hand-holding-usd ml-1"></span></button></a>
			</div>

		</div>
	</div>
	<!-- Jumbotron -->



	<!-- CARDS-->
	<div id="pagina">
		<div class="container p-3" id="carte">
			<div class="row">
				<div class="col-sm">
					<!-- Card1 -->
					<div class="card">

						<!-- Card image -->
						<div class="view overlay">
							<img class="card-img-top" src="img/cercaLibro.png" alt="Cerca un libro">
							<a href="cercaLibro.php">
								<div class="mask rgba-white-slight"></div>
							</a>
						</div>

						<!-- Card content -->
						<div class="card-body">

							<!-- Title -->
							<h4 class="card-title">Cerca un libro</h4>
							<!-- Text -->
							<p class="card-text">Cerca un libro in vendita sul sito, tramite ISBN, titolo o autore. <br> Prova subito!</p>
							<!-- Button -->
							<a href="cercaLibro.php" class="btn btn-primary">CERCA</a>

						</div>

					</div>
				</div>
				<!-- Card -->
				<div class="col-sm">
					<!-- Card1 -->
					<div class="card">

						<!-- Card image -->
						<div class="view overlay">
							<img class="card-img-top" src="img/vendiLibro.png" alt="Card image cap">
							<a href="vendiLibro.php">
								<div class="mask rgba-white-slight"></div>
							</a>
						</div>

						<!-- Card content -->
						<div class="card-body">

							<!-- Title -->
							<h4 class="card-title">Vendi un libro</h4>
							<!-- Text -->
							<p class="card-text">Vuoi vendere un libro ma non sai come fare? Inseriscilo nel nostro database e aspetta che qualcuno ti contatti!</p>
							<!-- Button -->
							<a href="vendiLibro.php" class="btn btn-primary">Vendi</a>

						</div>

					</div>
					<!-- Card -->
				</div>


			</div>
		</div>
		<!-- TABELLA ULIMI LIBRI -->
		<h2 align="center" class="pt-5"> Ultimi libri in vendita </h2>
		<div class="container-fluid">
			<div class="row col-md-15 col-md-offset-2 custyle mx-auto pl-5 pr-5 pt-3 ml-2 mr-5 " >
				<div class="table-responsive text-nowrap">

				<table class="table table-striped custab ">
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

					include "connect.php";
					//ROUND(prezzo,2) --> arrotonda a 2 cifre decimali, visto che il float se è .10/.20 lo taglia a .1/.2
					$sql="SELECT *,ROUND(prezzo,2) FROM libro ORDER BY dataPubblicazione DESC";
					$result=$conn->query($sql);
					$nrows=$result->num_rows;
					if($nrows>0){
						while ($row = $result->fetch_assoc()) {
							if(!$row["venduto"] && !$row["eliminato"]){ // senno non lo mostro

								echo "<tr>";
								echo "<td><b>".$row["titolo"]."</b></td>";
								echo "<td>".$row["autore"]."</td>";
								echo "<td>".$row["anno"]."</td>";
								echo "<td>".$row["qualita"]."</td>";
								//ROUND(prezzo,2) --> arrotonda a 2 cifre decimali, visto che il float se è .10/.20 lo taglia a .1/.2
								echo "<td class='text-center'><a class='btn btn-info  m-0' href='schedaLibro.php?id=".$row["ID"]."'><span class='glyphicon glyphicon-edit'></span> Compralo a <b>".$row["ROUND(prezzo,2)"]."€</b></a>";
								echo "</tr>";
							}
						}
					}


					?>

				</table>
				</div>
			</div>
		</div>



		<script>
			$(document).ready(function(){
  // Add smooth scrolling to all links
  $("button").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
      	scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
    });
    } // End if
});
});
</script>

<?php include "footer.php" ?>
</body>
</html>

