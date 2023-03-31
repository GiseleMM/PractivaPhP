
<?php
$newLine = "<br>" . "\n";

#creando array vacio 
$vect1 = [];
$vect2 = array();
var_dump($vect1);
var_dump($vect2);

#anadir elementos
$vect1[] = "lunes";
$vect1[] = "martes";
$vect1[] = "miercoles";
$vect1[] = "jueves";
$vect1[] = "viernes";
$vect1[] = "sabado";
// con corchtes vacions va agregando elementos al final del array
array_push($vect1, "domingo");
//con la funcion estativa push obtengo el mismo resulatado
var_dump($vect1);

#longitud del array
echo count($vect1) . "$newLine";
echo count($vect2);

#borrar 
unset($vect1[6]);
var_dump($vect1);
unset($vect2);//esto borra array  completo

#array asociativos pares de clave valor
$vect3 = array("Jr1os" => "lali", "yash" => "Roman", "assss" => "Boca");
var_dump($vect3);

#recorrer array asociativo
foreach ($vect1 as $valor) {
    echo $valor . "\n";
}
foreach ($vect3 as $clave => $i) {
    echo $clave . " tiene el valor= " . $i;
}
#acceder  a un elemento con corchetes
echo $vect3["Jr1os"];

#array multidimensional, los array pueden tener como elementos de las claves arrays
$vect4 = array(
    "Rojo" => array(1212, 1233, 1222),
    "Verde" => array(3000, 3034, 3011),
    "azul" => array(2222, 2033, 2455)
);
echo "<br/>"."\n";
var_dump($vect4);
foreach($vect4 as $color){
// accedo a los valores  , cada valor es un array 
    foreach($color as $k=>$v){
        // del array accedo a la k y al valor
echo $k." tiene el valor ".$v;

echo "<br/>"."\n";
    };

}
#Acceso a array multidimensional con corchetes
var_dump($vect4["Rojo"]);//1212 1233 1222
var_dump($vect4["Rojo"][0]); //1212
//si tuviera un array dentro de un elemneto del array tendria q agregar otro corchete

# claves en no todos los elementos
 $vect5= array(
    "A",
    "B",
    8=>"C",
    "D"
);
//La clave es opcional. Si no se especifica, PHP usará el incremento de la clave de tipo integer mayor utilizada anteriormente.
echo "<br/>"."\n";
var_dump($vect5);

#indicar el inicio del indice con un solo valor
$vect6=array(3000=>"Js","PhP","C#","C");
var_dump($vect6);

#ordenar array
var_dump(sort($vect6));
var_dump($vect6);//ordena los valores si es string por ordena alfabetico

#Asignacion de un array a atro es por valor si quiero copiar el array por referencia uso & antes del vect
$copia=$vect6;
var_dump($copia);
$copia[]="C++";
// modifico copia pero no afecta al  array origen
var_dump($vect6);
var_dump($copia);

$referencia=&$vect6;
$referencia[]="Python";
var_dump($vect6);// no modifique este vector pero como el otro tiene la misma ref se modifica igual







?>