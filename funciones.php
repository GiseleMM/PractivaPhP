<?php
#paametro por defecto
function CustomFont($font,$size=3){
    echo "<p style=\"font-family:{$font}; font-size:{$size}em;\">Hola mundo</p>";
}
CustomFont("Courier");
CustomFont("Courier",1);
CustomFont("Courier",2);

#devolver un valor
function RetornarTabla($valor){
    $vec=[];
    for ($i=1; $i <=10; $i++) { 
    $vec[$i]=$valor*$i;// si coloco vacio empieza desde o y yo queiro q coincida valor con multiplicador
    }
    return $vec;
}
$rta=RetornarTabla(2);
var_dump($rta);

#pasar por referencia

$texto="hola mundo";
echo strtoupper($texto);
echo $texto;// no modifica la original retorna una nueva cadena 


function ConvierteMayuscula(&$str){
  
$str=strtoupper($str);// piso el valor

}
ConvierteMayuscula($texto);
echo $texto;
//ConvierteMayuscula("lali");// no peudo pasar literal tengo q delararla para que esta tenga una referencia

#ALCANDE DE LA VARIABLE GLOBAL 
$externa="EXT";
function ProbarAlcanca(){
    global $externa;//si no pongo global no la puedo leer en la funcion por q no esta declarada en este scope
    echo $externa;
}
ProbarAlcanca();
?>