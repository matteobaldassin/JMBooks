<?php
session_start();
include "chkSession.php";

?>

<html>
<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MAINPAGE</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script type="text/javascript">
        function goToPage(url)
      {
        window.location=url;
      }
</script>

  </head>
  <body>
  <div>
    <form action="aggiungiFilm.php" method="post" enctype="multipart/form-data">
    <p id="nomeUtente">Benvenuto: <b><?php echo $_SESSION["username"] ?></b><input type="button" onClick="goToPage('logout.php')" value="Logout"><br>
    </b><input type="button" onClick="goToPage('cercaLibro.php')" value="Cerca un libro">
    </b><input type="button" onClick="goToPage('vendiLibro.php')" value="Vendi un libro"> </p>
    </form>

    <p> Ultimi libri aggiunti al sito: </p>
    <?php
      include "connect.php";
$sql = "SELECT * FROM libro";

$result = $conn->query($sql);
echo "<div class='table-responsive-sm'>
    <table class='table'><thead>";
echo "<tr><th scope='col'>Titolo</th><th scope='col'>Prezzo</th><th scope='col'>Qualita</th></tr></thead><tbody>";
$conta=0;
while ($row = $result->fetch_assoc())
{
  
    $conta++;
    if($conta>5)//numero max su mainpage
    break;
    else
    {
      $id=$row["ID"];
    echo "<tr><td><a href='schedaLibro.php?id=$id'>".$row["titolo"]."</td><td>".$row["prezzo"]."€</td>";
  echo "<td>".$row["qualita"]."</td>";
    }
}

echo "</tr></tbody></table></div>";
$conn->close();

    ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    </body>
    </html>

