<?php

class nodo {
    public $dato = "";
    public $next = null;
}

class LCE {

    public $head = null;

    function InsertarNodoInicio($valor){
        $my_nodo = new nodo();
        $my_nodo -> dato = $valor;
        if($this -> head == null){
            $this -> head = $my_nodo;
        }
        $my_nodo -> next = $this -> head;
        $x = $this -> head;
        
        while($x -> next != $this -> head){
            $x = $x -> next;
        }
        $x -> next= $my_nodo;
        $this -> head = $my_nodo;
    }

    function InsertarNodoFinal($valor){
        $my_nodo = new nodo();
        $my_nodo -> dato = $valor;
        if($this -> head == null){
            $this -> head = $my_nodo;
        }
        $my_nodo -> next = $this -> head;
        $x = $this -> head;
        while($x -> next != $this -> head){
            $x = $x -> next;
        }
        $x -> next= $my_nodo;
    }

    function Imprimir(){
        if($this -> head == null){
            return "Lista vacia";
        }else{
            $x = $this->head;
            while($x -> next != $this -> head){
                echo " - ".$x -> dato."  ";
                $x = $x -> next;
            }
            echo " - ".$x -> dato."  ";
        }
    }

    function BorrarNodoLista($valor){
        if($this -> head == null){
            return "Lista Vacia";
        }else{
            $x = $this->head;
            $prev = null;
            while($x -> next != $this -> head){
                if($x-> dato == $valor){
                    if($prev == null){
                        $this -> head = $x -> next;
                    }else{
                        $prev -> next = $x -> next;
                        return;
                    }
                }else{
                    $prev = $x;
                    $x = $x -> next;
                }
            }
            if($x -> dato == $valor){
                while($x -> next -> next != $this -> head){
                    $x = $x -> next;
                }
                $x -> next= $this -> head;
            }else{
                echo "</br>_*El NODO ".$valor." no encontrado*_";
            }
        }
    }

    function InsertarNodoDespues($valor, $n){
        $x = $this-> head;
        
        while($x -> dato != $n && $x -> next != $this -> head){
            $x = $x -> next;
        }
        if($x -> dato == $n){
            $my_nodo = new nodo();
            $my_nodo -> dato = $valor;
            $my_nodo -> next = $x -> next;
            $x -> next = $my_nodo;
        }else{
            echo "valor no encontrado";
        }
    }

    function SacarPromodeio(){
        if($this -> head == null){
            return "pila vacia";
        }else{
            $x = $this -> head;
            $suma = 0;
            $iterador = 0;
            while($x -> next != $this -> head){
                $iterador ++;
                $suma += $x -> dato;
                $x = $x -> next;
            }
            $iterador++;
            $suma += $x -> dato;
            $promedio = $suma / $iterador;
            return "---".$promedio."---";
        }
    }
}

$my_LCE = new LCE();
$my_LCE -> InsertarNodoInicio(12);
$my_LCE -> InsertarNodoFinal(6);
$my_LCE -> InsertarNodoInicio(10);
$my_LCE -> InsertarNodoFinal(60);
$my_LCE -> InsertarNodoInicio(100);

$x = $my_LCE -> Imprimir();
echo $x;
echo "</br>";

echo "</br>";
echo "borrar el numero 99";

$my_LCE -> BorrarNodoLista(99);
echo "</br>";

echo "</br>";

$y = $my_LCE -> Imprimir();
echo $y;
echo "</br>";

echo "</br>";
echo "Insertar el nodo 15 despues del nodo 10";

$my_LCE -> InsertarNodoDespues(15, 10);
echo "</br>";

$z = $my_LCE -> Imprimir();
echo $z;
echo "</br>";

echo "</br>";
echo "Sacar el promedio de la lista circular encadenada";
echo "</br>";

$e = $my_LCE -> SacarPromodeio();
echo $e;
echo "</br>";

?>