<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<meta name="google-signin-client_id" content="805000051495-oa0e20l3sr339t8fkk8dsv2r7o0eeveo.apps.googleusercontent.com">
<!--
<script>
  $(document).ready(function() {
    $(document).on('click', '.nav-item a', function (e) {
      $(this).parent().addClass('active').siblings().removeClass('active');
    });
  });
</script>-->
<script>

  function logout(){
    //alert("Sto sloggando...");
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.disconnect();
    //alert("Logged out"+auth2);
  }
</script>
<script>
  function onLoad() {
   // alert("loaded");
    gapi.load('auth2', function() {
      gapi.auth2.init();
      //alert(gapi.auth2);
    }); 
  }
</script>
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
      <a class="nav-link" href="index.php">Home
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="cercaLibro.php">Libri in vendita</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="vendiLibro.php">Vendi un libro</a>
    </li>
      <!-- dropdown menu 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-555" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">Dropdown
        </a>
        <div class="dropdown-menu dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-555">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    -->
  </ul>

      <!-- BUSTA NOTIFICHE<li class="nav-item">
        <a class="nav-link waves-effect waves-light">1
          <i class="fas fa-envelope"></i>
        </a><
      </li>
    -->
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar dropdown">

        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        <i class="fas fa-user"></i> <?php echo $_SESSION["username"]?></a>
        <div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-55">
         <a class="dropdown-item" href="account.php">Visualizza profilo</a>
         <a href="logout.php" onClick="logout()" class="dropdown-item">Esci</a>
       </div>
     </li>
   </ul>
 </div>
</nav>

<!--/.Navbar -->

<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>

