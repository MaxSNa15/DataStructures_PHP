<?php

/*
 * Llenar un stack con: 3, 7, 9, 1, 5, 2
 * Hacer un procedimineto para vaciar el stack completo al ir sacando los datos
 * que los compara¿e para que diga cual es el mayor
 * El resultado debe ser: 251973 mayor 9
 */

class Stack{

    public $pila =[];
    public $top = -1;

    function Push($valor){
        $this -> top ++;
        $this -> pila[$this -> top] = $valor;
    }

    function Pop(){
        if($this -> top == -1){
            echo "Error, pila vacia";
        }else{
            $valor = $this -> pila[$this -> top];
            $this ->top --;
            return $valor;
        }
    }

    function EliminarSrack(){
        $mayor = $this->pila[0];
        for ($i=0; $i <= 5; $i++) { 
            $y =$this -> Pop();
            echo " $y "; 
            if ($y > $mayor) {
                $mayor = $y;
            }
        }
        echo"</br>";
        echo "El numero mayor es: ".$mayor; 
    }
}

$miPila = new Stack();
$miPila ->Push(3);
$miPila ->Push(7);
$miPila ->Push(9);
$miPila ->Push(1);
$miPila ->Push(5);
$miPila ->Push(2);

$miPila -> EliminarSrack();

echo "</br>"; 

$y = $miPila -> Pop();
echo "$y"; 

?>