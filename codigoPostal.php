<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obten codigo postal</title>
</head>

<body>
    <?php
    //esto deberia estar en una base de  datos
    $provincias = array(1 => "Buenos Aires", 22 => "Cordoba", 10 => "Tierra de Fuego");
    $localidades = array(
    "1"=>array(5 => "Lomas", 17 => "Banfield", 33 => "Avellaneda"),
    "22"=>array(5000=>"laFalda",5001=>"Nueva Cordoba",5023=>"Alta Cordoba"),
    "10"=>array("Usuahia","RioGrande","Puerto ARgentino")
    );
   
    
    $cp = array(5 => 6666, 17 => 5555, 33 => 9999,0=>2000,1=>3000,2=>4000, 5000=>0001,5001=>0002,5023=>0003);
    if (isset($_GET["oculto"]) && isset($_GET["localidad"])) {  
     
       // var_dump($localidades);
            ?>

       <p>El codigo de la LOCALIDAD <?= $localidades[trim($_GET["oculto"])][$_GET["localidad"]]?> es </p>
<!-- IMPORTANTE  el parametro creaba espcio y el array no acepta por eso TRIM  por q si el me decia q la clave no  exitia  en el array asociativo-->
    

        <p> <?= $cp[$_GET["localidad"]] ?> </p>

    <?php } else if (isset($_GET["provin"])) { ?>


        <form action="" method="get">
            <select name="localidad" id="">
                <?php foreach ($localidades[$_GET["provin"]   ] as $clave => $item) { ?>
                    <option value="<?= $clave ?>"> <?= $item ?> </option>
                <?php } ?>
            </select>
            <input type="hidden" name="oculto" value="<?=$_GET["provin"]?>">
            <input type="submit" value="Buscar CP">
        </form>


    <?php } else { ?>

        <h1>Elegir provincia</h1>
        <br>
        <form action="" method="get">
            <select name="provin" id="">
                <?php foreach ($provincias as $p => $l) { ?>
                    <option value="<?= $p ?>"> <?= $l ?> </option>
                <?php } ?>
            </select>
            <input type="submit" value="Buscar Localidad">
        </form>





    <?php } ?>
</body>

</html>