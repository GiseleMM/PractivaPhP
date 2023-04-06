<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metodo post</title>
</head>
<body>
    <?php
    if($_POST)
    {
        $fecha=$_POST["nacimiento"];
        //echo $fecha;
        $cumpleanos = new DateTime($fecha);
        $hoy = new DateTime();
        
        $annos = $hoy->diff($cumpleanos);
         $s=$annos->y;// formato a string
         // no puedo poner cumpleanos y annos por q no son string
        ?>
      <p> su cumpleaños es <?=$fecha?> y su <b> edad es <?=$s?> </b>. </p>
        
    <?php } ?>  
    <form action="" method="post"> 
    <input type="date" name="nacimiento" id="" require>
    <input type="submit" value="calular edad">
    </form>
</body>
</html>