<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php


    if (isset($_GET["nombreOculto"]) && isset($_GET["apellidoOculto"]) && isset($_GET["edad"])) {
    ?>
        <p> Tus datos son NOMBRE <?= $_GET["nombreOculto"] ?> ,APELLIDO <?= $_GET["apellidoOculto"] ?> y EDAD <?= $_GET["edad"] ?></p>


    <?php
    } else if (isset($_GET["nombreOculto"]) && isset($_GET["txtApellido"])) {
    ?>


        <form action="" method="get">
            EDAD
            <br>
            <input type="Number" name="edad" id="">
            <input type="submit" value="SIGUIENTE">
            <input type="hidden" value="<?=$_GET["nombreOculto"]?>" name="nombreOculto">
            <input type="hidden" value="<?= $_GET["txtApellido"]?>" name="apellidoOculto">
        </form>

    <?php
    } else if (isset($_GET["txtNombre"])) {
    ?>
        <form action="" method="get">
            APELLIDO
            <br>
            <input type="text" name="txtApellido" id="">
            <input type="submit" value="SIGUIENTE">
            <input type="hidden" value="<?= $_GET["txtNombre"] ?>" name="nombreOculto">
        </form>
    <?php } else {
    ?>

        <form action="" method="get">
            NOMBRE
            <br>
            <input type="text" name="txtNombre" id="">
            <input type="submit" value="SIGUIENTE">
        </form>

    <?php   }
    ?>
</body>

</html>