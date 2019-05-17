<?php
session_start();
include "stile.php";
$username=$_SESSION["username"];

?>

<html>

<!-- MODAL ADVISE -->
<form action="" method="post">
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
</form>
<!--MODAL REGISTER FINISH-->
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<title>Scheda Libro</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript">
		/*var username='<?php echo $username;?>';
		//if(username=="")
			$(window).on('load',function(){
				window.alert("USER: "+username);
$('#modalAdviseForm').modal('toggle');
			});
			*/
		function goToPage(url)
		{
			window.location=url;
		}
	</script>
	

</head>


<body align="center">
	<?php 
	include "connect.php";

	$id=$_GET["id"];
	$_SESSION["idLibro"]=$id;
	$sql="SELECT * FROM libro WHERE ID=$id";

	$result=$conn->query($sql);
			//echo "<table border='1'>";
			//echo "<tr><td>Immagine</td><td>Titolo</td><td>ISBN</td><td>Autore</td><td>Anno</td><td>Prezzo</td><td>Qualita</td><td>Incontro</td><td>Note</td></tr>";
	while ($row = $result->fetch_assoc()) {
		$titolo=$row["titolo"];
		$id=$row["ID"];
		$dataPubblicazione=$row["dataPubblicazione"];
		$dataPubblicazione=date("d-m-Y", strtotime($dataPubblicazione));
		$username=$row["username"];
		$autore=$row["autore"];
		$anno=$row["anno"];
		$isbn=$row["isbn"];
		$qualita=$row["qualita"];
		$note=$row["note"];
		$prezzo=$row["prezzo"];
		$incontro=$row["incontro"];
		$visite=$row["visite"]+1;

		if($row["immagine"]=="" || $row["immagine"]==NULL) //se non caricata, imposta quella di default
			$immagine="img/default-book.png";
		elseif(strpos($row["immagine"], 'http') !== false)
   			$immagine=$row["immagine"];
		else
			$immagine="fotoLibri/".$row["immagine"];

		$sqlUtente="SELECT * FROM login WHERE username='$username'";
		$result=$conn->query($sqlUtente);
		while ($row = $result->fetch_assoc()) {
			$email = $row["email"];
			if(isset($row["telefono"]))
				$telefono = $row["telefono"];
		}


	}
//nuovo
	$sql="UPDATE libro SET visite=$visite WHERE ID=$id";
	$result=$conn->query($sql);

//updated
	?>

	<div>
		<!-- MODAL LOGIN -->
		<form action="controlloLogin.php" method="POST">
			<div class="modal fade" id="modalContattaForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Contatta</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body mx-3">
						<div class="md-form mb-5">
							<h3 align="center">Contatta il venditore  </h3><br>
							<h5><b>Username: </b><?php echo $username  ?> </h5>
						</div>

						<?php if(isset($telefono)){
							echo "<div class='md-form mb-5'>";
							$stringaTel="tel:+39".$telefono;
							echo "<h5> <b> Telefono: </b>";
							echo "<a class='btn btn-primary' href='".$stringaTel."'>"."<i class='fas fa-phone mr-1'></i>".$telefono."</a>";
							echo "</div>";

						} ?> 
						<div class="md-form mb-5 center">
							<h5><b>Email: </b><?php 
							$stringaMail="mailto:".$email."?subject=Richiesta per libro ".$titolo." - JMBOOKS&body=Ciao, sono interessato al tuo libro: ".$titolo."\r\n";
							echo "<a class='btn btn-primary' href='".$stringaMail."'>"."<i class='fas fa-envelope mr-1'></i>".$email."</a>";
							?> </h5>
						</div>


					</div>

				</div>
			</div>
		</div>
	</form>
	<h1 class="pl-5 pt-5"><?php echo $titolo; ?></h1>
	<div class="container pl-5 pr-5 pt-5">
		<div class="row">
			<div class="col-md-2 mr-5">
				<img src=<?php echo "'".$immagine."'"; ?> class="img-thumbnail"
				style="width: 200px"><br><p>
					Pubblicato da <?php echo $username ?><br> il <?php echo $dataPubblicazione ?></p>
					<p> Visualizzazioni totali: <?php echo $visite?></p>
					<button  name="CONTATTA" class="btn btn-deep-orange btn-block" id="CONTATTA" value="CONTATTA" data-toggle='modal' data-target='#modalContattaForm' data-dismiss="modal" >CONTATTA </button>

				</div>
				<div class="col-md-8">
					<!--<h3>Info libro</h3>-->
					<table class="table table-striped table-bordered">
						<tbody>
							<tr>
								<th scope="row">Titolo</th>
								<td><?php echo $titolo ?></td>
							</tr>
							<tr>
								<th scope="row">Autore</th>
								<td><?php echo $autore ?></td>
							</tr>
							<tr>
								<th scope="row">Anno</th>
								<td><?php echo $anno ?></td>
							</tr>
							<tr>
								<th scope="row">ISBN</th>
								<td><?php echo $isbn ?></td>
							</tr>
							<tr>
								<th scope="row">Prezzo</th>
								<td><?php echo $prezzo."€" ?></td>
							</tr>
							<tr>
								<th scope="row">Qualità</th>
								<td><?php echo $qualita ?></td>
							</tr>
							<tr>
								<th scope="row">Incontro</th>
								<td><?php echo $incontro ?></td>
							</tr>
							<tr>
								<th scope="row">Note</th>
								<td><?php echo $note ?></td>
							</tr>
						</tbody>
					</table>



				</div>
			</div>
		</div>

	</div>
</body>
</html>

