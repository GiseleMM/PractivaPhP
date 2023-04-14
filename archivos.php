<?php
class Usuario
{
    private static $usuarios = [];
    private static $archivo = "usuarios.csv";
    private $_nombre;
    private $_clave;
    private $_email;
    function __construct($nombre, $clave, $email)
    {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_email = $email;
    }
    public  function Data()
    {
        return $this->_nombre . "," . $this->_clave . "," . $this->_email;
    }
    function Alta()
    {
        if (!$pfile = fopen(Usuario::$archivo, "a")) {
            echo "no se pudo abrir archivo" . "<br>";
        } else {
            Usuario::$usuarios[] = $this;
            $data = $this->Data() . "\n";
            if (fwrite($pfile, $data) > 0) {
                echo "escritura exitosa" . "<br>";
            }

            fclose($pfile);
        }
    }
    function Verificar()
    {
        foreach (Usuario::$usuarios as $clave => $valor) {
       

            if ($valor->_nombre == $this->_nombre){

                if(($valor->_clave == $this->_clave) && ($valor->_email==$this->_email)) {
                echo "Verificado";
                }else{
                  
                    if($valor->_clave!=$this->_clave){
                        echo "Error datos";
                    }
                    if($valor->_email!=$this->_email){
                        echo "usuario no registrado";
                   }
             
                }
            }
            }
        }
   



    static function Leer()
    {
        $vect = [];
        if (!$lector = fopen(Usuario::$archivo, "r")) {
            echo "ERROR en apertura de archivo" . Usuario::$archivo;
        } else {
            while (!feof($lector)) {
                $linea = fgets($lector);
                if (strlen($linea) > 0) { //---------------EVITO LECTURA FANTASMA
                    $vect[] = $linea;
                }
            }
            fclose($lector);
        }
        return $vect;
    }
    static function Lista()
    {

        $aux = Usuario::Leer();
        if (isset($aux)) {
            foreach ($aux as $value) { ?>
                <ul>
                    <?php
                    $subArray = explode(",", $value);
                    foreach ($subArray as $item) { ?>

                        <li>
                            <?= $item ?>;

                        </li>
                    <?php
                    }
                    ?>
                </ul>
<?php

            }
        }
    }
}








$u1 = new Usuario("roman", "1111", "duhd@dj.com");
var_dump($u1);
$u1->Alta();
$u2 = new Usuario("roman2", "2222", "duhd@aaa.com");
$u2->Alta();
$u3 = new Usuario("roman3", "3333", "yyhd@aaa.com");
$u3->Alta();
//Usuario::Leer();
echo "<br/>";
//Usuario::Lista();
$u1->Verificar();
$u3=new Usuario("RomanNORegistrado","222","jdsfj");
$u3->Verificar();
?>