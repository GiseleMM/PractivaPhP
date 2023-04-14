<?php

#ABRIR ARCHIVO
if(!$stream=fopen("data.csv","r")){
    echo "erro en apertura de archivo";
}else{

#LECTURA 
$content=fread($stream,filesize("data.csv"));
echo $content;

#CERRAR
if(fclose($stream)){echo "archivo cerrado";}
}

#LECTURA FGETS
$miArchivo="data.csv";
$stream2=fopen($miArchivo,"r");
#FEOF final por archivo
while(!feof($stream2)){
    if(($imp=fgets($stream2))>0){ //OJO por q con los parentesis 
        echo $imp."<br/>"."\n";
    }
    
}
fclose($stream2);

#LEER ARCHIVO CSV
if(!$pfile=fopen("./data.csv","r")){
    echo "no se pudo  abrir archivo";
}
do{
$linea=fgetcsv($pfile,1000,",");
if(is_array($linea)){
    $largo=count($linea);
    for($i=0;$i<$largo;$i++){
        echo $linea[$i]."<br>"."\n";

    }
}
}while($linea!=false);
fclose($pfile);


#OBTENER INFO DE ARCHIVO
var_dump(stat($miArchivo));

#FUNCIONES DE DIRECTORIO
echo getcwd();//obtinee el directorio actual
print_r(pathinfo($miArchivo));//info del la direccion en array nombre extencion 
echo realpath($miArchivo);// ruta completa a un archivo
//mkdir("Carpeta/otra/otra2",0777,true);//eprmite la creacion de carpeta con carpeta anidadas
//rmdir("Carpeta/otra/otra2");
//rmdir("Carpeta/otra");
//rmdir("Carpeta");
//copy($miArchivo,"copiadata.csv");
//unlink("copiadata.csv");
echo date("D d Y H:i:s",fileatime($miArchivo))."<br/>";//ultimo acceso
echo file_exists($miArchivo)."<br/>";// si ecxiste
echo fileowner($miArchivo)."<br/>"; //propietario
echo filesize($miArchivo)."<br/>";// tamanio
echo filetype($miArchivo)."<br/>";//el tipo
echo is_dir($miArchivo)."<br/>";
echo is_file($miArchivo)."<br/>";



#ESCRITURA
if(!$stream3=fopen("texto.txt","w")){
    echo "Error en creacion de archivo";

}
else{
    // fwrite($stream3,"creo contenido");
    // fwrite($stream3,"creo contenido2");
    // fwrite($stream3,"creo contenido3");
    fwrite($stream3,"sobrrescribo archivo");

    fclose($stream3);

}
#APPEND
if(!$stream4=fopen("texto.txt","a")){
    echo " error en apertura de archivo";
}else{

    fwrite($stream4,"con append en fopen puedo conatatenar contenido , no sobreescribe el archivo");
    fclose($stream4);
}

#ESCRIBIR EN FORMATO CSV
$animales=array(array("Tortuga","macho",5),array("gato","macho",1),array("perra","hembra",15));
if(!$strem5=fopen("texto.txt","w")){
echo "error en ecritura";
}
else{

    foreach($animales as $row){
        fputcsv($strem5,$row);
    }
   
    fclose($strem5);
}

#IMPLODE convierte array en una cadena pongo cero por q si no es una array anidaddo NO PUEDO PONER EL SEPARADOR DEESPUES
echo implode(",",$animales[0]);// con separador
echo implode($animales[0]);//sin separador  todo junto
echo implode("/",$animales[1]);

#EXPLODE cpnvierte Cadena en array
$cadena="Boca/El/Unico/Grande";
$matriz=explode("/",$cadena);
foreach($matriz as $item){
    echo $item."<br/>";
}

$cadena2="River sos de la B";
list($uno, $dos, $tres, $cuatro, $cinco)=explode(" ",$cadena2); // creo lista
echo $uno;



?>