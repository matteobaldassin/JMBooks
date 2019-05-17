<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>JMBooks - Compra e vendi libri online!</title>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="css/mdb.min.css" rel="stylesheet">
	<!-- Your custom styles (optional) -->
	<link href="css/style.css" rel="stylesheet">

	<!-- favicon -->
	<link rel="icon" href="img/favicon2.png">


</head>
<body>
<form action="controlloLogin.php" method="POST">
	<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header text-center">
					<h4 class="modal-title w-100 font-weight-bold">Sign in</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body mx-3">
					<div class="md-form mb-5">
						<i class="fas fa-envelope prefix grey-text"></i>
						<input type="text" id="defaultForm-email" class="form-control validate" name="email">
						<label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
					</div>

					<div class="md-form mb-4">
						<i class="fas fa-lock prefix grey-text"></i>
						<input type="password" id="defaultForm-pass" class="form-control validate" name="password">
						<label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
					</div>
					<div class="md-form mb-4">
						<!--<i class="fas fa-lock prefix grey-text"></i>-->
						<a href="forgotPassword.php">Hai dimenticato la password?</a>
					</div>

				</div>
				<div class="modal-footer d-flex justify-content-center">
					<input type="submit" name="LOGIN" class="btn btn-default" >
				</div>
			</div>
		</div>
	</div>
</form>

	<!-- MODAL LOGIN FINISH-->

	<?php if(isset($_SESSION["username"])){
		include "navBarLoggato.php";
	}else{
		include "navBarRegistrazione.php";
	}
	?>



<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php if(isset($_GET["error"])){
	echo "<p align='center' style='color:red;'>".$_GET["error"]."</p>";
	echo "<script type='text/javascript'>
		$('#modalError').modal('show');
		</script>";
	}

	if(isset($_GET["message"]))
		echo "<p align='center' style='color:orange;'>".$_GET["message"]."</p>";

	?>