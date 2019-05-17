<meta name="google-signin-client_id" content="805000051495-oa0e20l3sr339t8fkk8dsv2r7o0eeveo.apps.googleusercontent.com">
<script>
	var auth2 = gapi.auth2.getAuthInstance();
     auth2.disconnect();
     alert("Logged out");
</script>

<?php

session_start();
session_unset();
session_destroy();
header("location: index.php");

?>