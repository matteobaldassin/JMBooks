<!-- MODAL LOGIN -->
<head>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<meta name="google-signin-client_id" content="805000051495-oa0e20l3sr339t8fkk8dsv2r7o0eeveo.apps.googleusercontent.com">
	<style>
		.text-center{
			text-align: center;
		}
		.g-recaptcha{
			display: inline-block;
		}
		.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
	</style>
	<!-- script login con google -->
	<script> 
		function signOut() {
			var auth2 = gapi.auth2.getAuthInstance();
			auth2.signOut().then(function () {
				console.log('User signed out.');
			});
		}

		function toggleResetPswd(e){
			e.preventDefault();
    $('#logreg-forms .form-signin').toggle() // display:block or none
    $('#logreg-forms .form-reset').toggle() // display:block or none
}

function toggleSignUp(e){
	e.preventDefault();
    $('#logreg-forms .form-signin').toggle(); // display:block or none
    $('#logreg-forms .form-signup').toggle(); // display:block or none
}

$(()=>{
    // Login Register Form
    $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
    $('#logreg-forms #cancel_reset').click(toggleResetPswd);
    $('#logreg-forms #btn-signup').click(toggleSignUp);
    $('#logreg-forms #cancel_signup').click(toggleSignUp);
})
</script>

<script>
	function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

       // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);


        var id=profile.getId();
        var email=profile.getEmail();
        var name=profile.getName();
        var fotoProfilo=profile.getImageUrl();
        $.ajax({
            type: 'POST',
            url: 'loginGoogle.php',
            data: "id="+ id +"&name=" + name+ "&email=" + email + "&foto="+fotoProfilo+"",
            success: function (data) {
               //alert(data);
               
                window.location.href = 'index.php?message=Benvenuto '+name;
           },
           error: function(xhr, status, error) {
              alert("Error: " + xhr.responseText);
          }
      });

        //disconnetto dopo il login, perche ho gia il token
       // var auth2 = gapi.auth2.getAuthInstance();
        //auth2.disconnect();

        var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
    }
</script>
</head>
<form action="controlloLogin.php" method="POST">
	<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Login al portale</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body mx-3">
				<p> Effettua il login con Google </p>
				<div class="md-form mb-4">
					  	<i class="fab fa-google prefix grey-text"></i>
						<!--<label for="g-signin2">Login con google</label>-->
						<div class="g-signin2" data-onsuccess="onSignIn" id="g-signin2" style="padding-left: 10%"></div> 					
				</div>
				<p> Oppure utilizza l'account JMBooks </p>

				<div class="md-form mb-4">
					<i class="fas fa-envelope prefix grey-text"></i>
					<input type="text" id="defaultForm-email" class="form-control validate" name="email">
					<label data-error="wrong" data-success="right" for="defaultForm-email">Email/Username</label>
				</div>

				<div class="md-form mb-4">
					<i class="fas fa-lock prefix grey-text"></i>
					<input type="password" id="defaultForm-pass" class="form-control validate" name="password">
					<label data-error="wrong" data-success="right" for="defaultForm-pass">Password</label>
				</div>
				<div class="md-form mb-4">
					<div class="text-center">
					<!--<i class="fas fa-lock prefix grey-text"></i>-->
					<a href="forgotPassword.php">Hai dimenticato la password?</a>
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
<!-- MODAL LOGIN FINISH-->


<!-- MODAL REGISTER -->
<!-- DA MODIFICARE CON QUANDO TORNERANNO A FUNZIONARE MAIL
<form action="mandaMail.php" method="post"> -->
<form action="registrazioneSOLOPERTEST.php" method="post"> 
	<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">Registrazione</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<div class="md-form mb-5">
					<i class="fas fa-user prefix grey-text"></i>
					<input type="text" id="orangeForm-name" class="form-control validate" name="user-name" required>
					<label data-error="wrong" data-success="right" for="orangeForm-name">Username</label>
				</div>
				<div class="md-form mb-5">
					<i class="fas fa-envelope prefix grey-text"></i>
					<input type="email" id="orangeForm-email" class="form-control validate" name="user-email" required>
					<label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
				</div>

				<div class="md-form mb-4">
					<i class="fas fa-lock prefix grey-text"></i>
					<input type="password" id="orangeForm-pass" class="form-control validate" name="user-pass" required>
					<label data-error="wrong" data-success="right" for="orangeForm-pass">Password</label>
				</div>

				<div class="md-form mb-4">
					<i class="fas fa-lock prefix grey-text"></i>
					<input type="password" id="orangeForm-pass" class="form-control validate" name="user-repeatpass" required>
					<label data-error="wrong" data-success="right" for="orangeForm-pass">Ripeti password</label>
				</div>

				<div class="md-form mb-4">
					<i class="fas fa-phone prefix grey-text"></i>
					<input type="text" id="orangeForm-pass" class="form-control validate" name="user-telefono">
					<label data-error="wrong" data-success="right" for="orangeForm-pass">Telefono (opzionale, per essere contattato)</label>
				</div>
				<div class="md-form mb-4">
					<div class="text-center">
						<div class="g-recaptcha" data-sitekey="6LejWpwUAAAAAPRjg0n45TLmRPr73RwXXT-tSarU"></div></div>
					</div>

				</div>
				<div class="modal-footer d-flex justify-content-center">
					<input class="btn btn-deep-orange" type="submit" name="REGISTRATI"/>
				</div>
			</div>
		</div>
	</div>
</form>
<!--MODAL REGISTER FINISH-->
<!-- MODAL ADVISE -->
<form action="checkRegistrazione.php" method="post">
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


<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color lighten-1 sticky-top">
	<a class="navbar-brand" href="/">JMBooks</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
	aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent-555">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item active">
			<a class="nav-link" href="/">Home
				<span class="sr-only">(current)</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="cercaLibro.php">Libri in vendita</a>
		</li>
		<li class="nav-item">
			<?php if(!isset($_SESSION["username"]))
			echo "<a class='nav-link href='' data-toggle='modal' data-target='#modalAdviseForm'>Vendi un libro</a>";
			else
				echo "<a class='nav-link' href='vendiLibro.php'>Vendi un libro</a>";

			?>
		</li>
	</ul>
	<ul class="navbar-nav ml-auto nav-flex-icons">
		<li class="nav-item avatar dropdown">
			
			<li class="nav-item">
				<a class="nav-link" href="" data-toggle="modal" data-target="#modalLoginForm">Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="" data-toggle="modal" data-target="#modalRegisterForm">Registrazione</a>
			</li>
		</li>
	</ul>
</div>
</nav>
<!--/.Navbar -->