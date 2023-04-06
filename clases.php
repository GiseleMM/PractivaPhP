<?php 
//ASIGNACION
class A{
    public $valor=100;
}

$instancia=new A();
$asig=$instancia;
$ref=&$instancia;

echo $instancia::class;

//$instancia->valor=20;
//$asig->valor=30;
$ref->valor=5;
var_dump($instancia);
echo "<br/>";
var_dump($asig);
echo "<br/>";
var_dump($ref);
echo "<br/>";
//si  asigno o paso la referencia es como si pasara la direccion de memoria si modifico una modifico todas
class B{
    public $mismoNombre="propieadad";
    public function mismoNombre(){
        return "metodo";
    }
}
echo((new B())->mismoNombre);
PHP_EOL;
echo((new B())->mismoNombre());

//EXTENDS

class Base{
    public function F1(){
        echo "f1 base".PHP_EOL;
    }
}
class Derivada extends Base{
    public function F1(){
        echo parent::F1()."agrego con derivada";
    }
}
(new Derivada())->F1();
echo (new Derivada())::class;

//::class
class KSHSKH{}    
$obj =new KSHSKH();
echo $obj::class;// optengo string con nombre

//::  acceder a static y contantes desde el exterior
class D{
    const MAX="CONSTANTE";
} 
echo D::MAX;


//:: acceder desde el  interior de la clase  a  constantes y estaticos 
class C extends D{
    private static $miStatica="variable estatica";
    public static function Metodo(){
        //si no los pongo dentro de  metodo es error 
    echo self::$miStatica;// accedo dentro de la misma clase
    
    echo parent::MAX;
    }

}
C::Metodo();

//VISIBILIDAD

class Madre{
    public $a="propiedad  public";
    protected $b="propiedad  protected";
    private $c="propiedad  private";

    public function M1(){
        echo "metodo publico <br/>";
    }
    
    protected function M2(){
        echo "metodo protected <br/>";
    }
    private function M3(){
        echo "metodo private<br/>";
    }

    public function Show(){
        //propedades uso desde adentro de la clase
        echo $this->a;
        echo $this->b;
        echo $this->c;
        //metodos
        $this->M1();
        $this->M2();
        $this->M3();
        
    }


}
class Hija extends Madre{
   public function Show2(){
    parent::M1();// tengo todo lo publico  y  protected
    parent::M2();
    echo $this->a;
    echo $this->b;
    //echo $this->c; no lo tengo

   }
}
$ma=new Madre();
echo $ma->a;
//echo $ma->b; no  las reconoce por q la estoy usando afuera de clase y derivada
//echo $ma->c;
$ma->M1();
//$ma->M2(); // no puedo usar los metodos protected y private fuera de la clase
//$ma->M3();
$hija=new Hija();
echo $hija->a;
//echo $hija->b;
//echo $hija->c;
$hija->Show2();
var_dump($ma);
var_dump($hija);


//STATIC
class ClaseConStatic{
    //propiedad
    public static $propiedad="propiedad estatica";
    //uso interno 
    public function ShowPropiedad(){
        echo self::$propiedad; // uso self para referirnos a un elemento estatico de la clase dentro de la misma , en este caso una propiedad.
        //self::Metodo(); puedo llamar al metodo tambien con self dentro de la misma clase
    }

    public static function Metodo(){
        echo "metodo estaico";
    }


}
$est=new ClaseConStatic();
$est::Metodo();// uso el objeto para llamar a metodo estatico
ClaseConStatic::Metodo();
 $est->ShowPropiedad(); //dentro uso la propiedad estatica
//

 function NL(){
    echo "<br/>";
}
function Titulo($titulo){
    NL();
    echo $titulo;
    NL();
}
//ABTRACCION EN CLASES
Titulo("abstracta");

abstract class ClaseABSTARCTA{
    abstract protected function MetodoAbstracto($param);
}
class ClaseConcreta extends ClaseABSTARCTA{
    public  function MetodoAbstracto($param, $paramConValor=100){// puedo relajar la visibilidad y ademas agregar  argumento con valores por default
        echo $param;
        echo $paramConValor;
    }

}
(new ClaseConcreta())->MetodoAbstracto("uso metodo abstracto");
(new ClaseConcreta())->MetodoAbstracto("uso metodo abstracto","uso argumento con valor por defecto");


//INTERFACE 
Titulo("INTERFACE");
interface IEjemplo{
    public function MetodoDeInterfaz($valor);

}
class ClaseConInterfaz implements IEjemplo{
 public function MetodoDeInterfaz($valor)
 {
    echo $valor;
 }
}
$objeto= new ClaseConInterfaz();
$objeto->MetodoDeInterfaz("uso metdoo de interfaz");

//ITERAR
Titulo("ITERAR OBJETO");
class MiClase{
    public $atributo1="uno";
    public $atributo2="dos";
    public $atributo3="tres";

protected $atributo4="cuatro";
private $atributo5="cinco";
    public function MiIterador(){

        foreach ($this as $key => $value) {
            print "$key=> $value";
            print "/n";
        }
    }

}
$miClase= new MiClase();
foreach ($miClase as $key => $value) {
        print "$key=>$value";
        print "/n";
}
//esto solo muestra los atributos publicos por q estoy fuera de la clase
$miClase->MiIterador();
//esto muestra todo por que lo hice dentro de la clase



?>