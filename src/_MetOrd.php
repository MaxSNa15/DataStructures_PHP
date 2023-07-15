<?php

/*
 * Diferentes Metodos de Ordenamiento
 * Metodo Burbuja
 * Metodo por Inserción
 * Metodo por Selección
 */

class Pila{

    public $array =[];
    public $top = -1;

    function Push($valor){
        $this -> top ++;
        $this -> array[$this -> top] = $valor;
    }

    function Pop(){
        if($this -> top == -1){
            echo "Error, array vacio";
        }else{
            $valor = $this -> array[$this -> top];
            $this ->top --;
            return $valor;
        }
    }

    function Imprimir(){
        if($this -> top == -1){
            echo "Error, pila vacia";
        }else{
            for($i = 0 ; $i<=$this -> top; $i++){
                echo $this -> array[$i]." ";
                }
            }
    }

    function MetBurbuja(){
        $a = 0;
        for ($i=0; $i <= 5; $i++) { 
            for ($j=0; $j <= 3 ; $j++) { 
                if ($this->array[$j] > $this->array[$j+1]) {
                    $a = $this->array[$j];
                    $this->array[$j] = $this->array[$j+1];
                    $this->array[$j+1] = $a;
                }
            }
        }
    }

    function MetInserción(){
        $e = (count($this->array));
        return $e;
    }
}

$miPila = new Pila();
$miPila ->Push(4);
$miPila ->Push(5);
$miPila ->Push(2);
$miPila ->Push(1);
$miPila ->Push(3);

$miPila -> Imprimir();

$miPila->MetBurbuja();

echo "</br>"; 
echo "</br>";

$miPila -> Imprimir();

$r = $miPila -> MetInserción();
echo "$r"; 


?>