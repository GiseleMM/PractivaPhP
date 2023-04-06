<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodo GET</title>
</head>

<?php
if ($_GET) {
    $nombre = $_GET["txtNombre"];
?>
    <p>Nombre enviado = <?= $nombre ?> </p>


<?php } ?>

<body>
    <form action="" method="get">
        Nombre:
        <input type="text" name="txtNombre" id="">
        <br />
        <input type="submit" value="Enviar Nombre">

    </form>

</body>

</html>