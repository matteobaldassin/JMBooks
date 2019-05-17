<?php
session_start();
//include "chkSession.php";
include "stile.php";
?>


<head>
</head>
<body>
	<div class="container">
	<?php
	$val = $_POST['daCercare'];
	header("Location: index.php?cerca=$val")

	$conn->close();
	?>
	</div>
<body>
