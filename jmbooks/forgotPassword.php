<?php
session_start();
//include "chkSession.php";
include "stile.php";
?>
<html>
<head>

</head>
<body>

<!-- Jumbotron -->
<div id="pagina">
	<div class="jumbotron text-center">

	<?php
	$messaggio=$_GET["conferma"];
	$id=$_GET["id"];
	if($messaggio=="OK")
	{
		echo "<h2 class='card-title h2'>Reset password</h2>";
		echo "<p class='blue-text my-4 font-weight-bold'>Inserisci la nuova password (controlla che sia uguale)</p>";
		echo "<div class='row d-flex justify-content-center'>";
		echo "<div class='col-xl-5 pb-2'>";
		echo "<form action='resetPassword.php?conferma2=OK&id=$id' method='post'>";
		echo "<div class='md-form'>";
		echo "Password: <input type='password' id='inputPSW1' class='form-control' name='password1'>";
		//echo "<label for='inputPSW1' style='text-align: center'>Inserisci la nuova password</label>";
		echo "Ripeti la password: <input type='password' id='inputPSW2' class='form-control' name='password2'>";
		//echo "<label for='inputPSW2' style='text-align: center'>Ripeti la nuova password</label>";
		echo "</div>";
		echo "<button type='submit' class='btn btn-blue waves-effect btn-block'>Reset<span class='fas fa-unlock'></span></button>";
		echo "</form>";
		echo "</div>";
		echo "</div>";
	}else
	{
		echo "<h2 class='card-title h2'>Hai dimenticato la password?</h2>";
		echo "<p class='blue-text my-4 font-weight-bold'>Inserisci la mail con cui ti sei registrato per resettarla</p>";
		echo "<div class='row d-flex justify-content-center'>";
		echo "<div class='col-xl-5 pb-2'>";
		echo "<form action='resetPassword.php' method='post'>";
		echo "<div class='md-form'>";
		echo "<input type='email' id='inputMDEx' class='form-control' name='email'>";
		echo "<label for='inputMDEx' style='text-align: center'>Inserisci la tua email</label>";
		echo "</div>";
		echo "<button type='submit' class='btn btn-blue waves-effect btn-block'>Reset   <span class='fas fa-unlock'></span></button>";
		echo "</form>";
		echo "</div>";
		echo "</div>";
	}
	?>


	</div>
</div>
<!-- Jumbotron -->





</body>
</html>

