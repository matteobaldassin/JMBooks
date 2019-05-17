<html>

<head>
    <script>

        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        if (isMobile) {
            document.write("RILEVATO DISPOSITIVO MOBILE");
        }
        else {
            document.write("RILEVATO DISPOSITIVO WEB");

        }
    </script>
    <style>
        .body {
            max-width: 500px;
            margin: auto;
        }
    </style>

    <script>

       /* if (isMobile)
            //document.write("<input type='file' accept='image/*' capture='camera' name='fileToUpload' id='fileToUpload'>");
            document.write("<input type='file' name='fileToUpload' id='fileToUpload'>");
            */
    </script>
</head>
<body id="body">
    <h2> Carica una foto </h2>
    <form action="caricaBarcode.php" method="POST" enctype="multipart/form-data">
        <input type='file' name='fileToUpload' id='fileToUpload'>
        <button type="submit" nome="submit" value="INVIO">CARICA</button>
    </form>
</body>

</html>