<?php 
if(isset($_GET["case"])){

    isset($_GET["nombre"])?$nombre=$_GET["nombre"]:$nombre=null;
    isset($_GET["num"])?$numero=$_GET["num"]:$numero=null;
    isset($_GET["mail"])?$mail=$_GET["mail"]:$mail=null;

   // var_dump($_GET);
    
    switch ($_GET["case"]) {
        case 1:

            //ALTA
            echo "case 1";

            if(($archivo=fopen("usuarios.csv","a"))!=false){
                echo "abri archi9vo";
                $cant=0;
                if(!is_null($nombre) && !is_null($numero) && !is_null($mail)){
                   $buffer=array($nombre,$numero,$mail);
                    echo "variables no nulas";
                   
                    $cant=fputcsv($archivo,$buffer,",");
                    if($cant>0){
                        echo "<h2>"."registrado en archivo"."</h2>";
                    }
                }
                fclose($archivo);
            }


            break;
        case 2:
            //LISTAR
            if(($archivo=fopen("usuarios.csv","r"))!=false){
                $cant=0;
                echo "<ul type='i'>";
                while(!feof($archivo)){
                    $linea=fgets($archivo);
                    if($linea!=false && strlen($linea)>0){
                    echo "<li>".$linea."</li>";
                    }

                }
                
                echo "</ul>";
fclose($archivo);
            }
            case 3:
                //MODIFICAR
                $lista=array();
                if(($archivo=fopen("usuarios.csv","r"))!=false){
                     if(!is_null($nombre) && !is_null($numero) && !is_null($mail)){
                            $cant=0;
                            while(!feof($archivo)){
                                
                                if(($lineaArray=fgetcsv($archivo,1000,","))!=false){
                                    if($lineaArray[0]===$nombre){

                                        array_push($lista,Array($nombre,$numero,$mail));

                                    }else{
                                            array_push($lista,$lineaArray);
                                    }

                                    var_dump($lista);
                                }

                            }

                     }


                    fclose($archivo);
                }
                $mod=0;
              if(($ar=fopen("usuarios.csv","w"))!=false){

                    foreach ($lista as $key => $value) {
                         echo (var_dump($value)."<br/>");
                         $row=implode(",",$value);
                            

                        $mod= fwrite($ar,$row.PHP_EOL);
                    }

                    if($mod>0){ echo "archivo modificado";}
fclose($ar);

               }

               case 4:
                //DELETE
                $lista=array();
                if(($archivo=fopen("usuarios.csv","r"))!=false){
                    echo "ENTRE".PHP_EOL;
                    $cant=0;
                    while((!feof($archivo))!=false){
                        echo "ENTRE FEOF".PHP_EOL;
                        $item=fgets($archivo);
                        echo $item.PHP_EOL;
                        if((!is_null($item)) && (strlen($item)>0)){
echo "ENTRE IF NO NULL ".PHP_EOL;
                            if(($arrayString=explode(",",$item))!=false){
                                echo "ENTRE A IF ".PHP_EOL;

                                var_dump($arrayString);
                                if($arrayString[0]==$nombre){
                                    continue;
                                }
                                //BORRADO DE MEMORIA
                                array_push($lista,$arrayString);
                            }
                            
                        }
                    }
                    echo "ENTRE A lista "."<br/>".PHP_EOL;
                    var_dump($lista);
                    $cantidad=count($lista);
                    fclose($archivo);
                }

                //REESCRIBO ARCHIVO
                $contador=0;
                if(($archivo=fopen("usuarios.csv","w"))!=false){

                        foreach ($lista as $key => $value) {
                            echo "<br/>";
                           $csvLinea= implode(",",$value);
                          if(fwrite($archivo,$csvLinea)>0){
                            $contador++;
                          }

                         
                        }

                    fclose($archivo);
                }
                if($contador===$cantidad){
                    echo "eliminacion exitosa";
                }

            break;
        default:
            # code...
            break;
    }
}
?>