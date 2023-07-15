<?php

class Nodo{
    public $prev = null;
    public $dato = "";
    public $next = null;
}

class LDE{
    public $front = null;
    public $end = null;

    function InsertarInicio($valor){
        $my_nodo = new Nodo();
        $my_nodo -> dato = $valor;
        if($this->front == null && $this->end == null){
            $this->front = $my_nodo;
            $this->end = $my_nodo;
        }else{
            $this->front->prev = $my_nodo;
            $my_nodo->next = $this->front;
            $this->front = $my_nodo;
        }
    }

    function InsertarDespues($valor, $nodo){
        $my_nodo = new Nodo();
        $my_nodo -> dato = $valor;
        if($this->front == null && $this->end == null){
            $this->front = $my_nodo;
            $this->end = $my_nodo;
        }else{
            $x=$this->front;
            while($x->dato != $nodo && $x->next != null){
                $x = $x -> next;
            }
            if($x->dato == $nodo){
                if($x->next != null){
                    $x->next->prev = $my_nodo;
                    $my_nodo->next = $x->next;
                    $x->next = $my_nodo;
                    $my_nodo->prev = $x;
                }else{
                    $this->end->next = $my_nodo;
                    $my_nodo->prev = $this->end;
                    $this->end = $my_nodo;
                }
            }else{
                return "__NODO No Existe__";
            }
        }
    }

    function InsertarFinal($valor){
        $my_nodo = new Nodo();
        $my_nodo -> dato = $valor;
        if($this->front == null && $this->end == null){
            $this->front = $my_nodo;
            $this->end = $my_nodo;
        }else{
            $this->end->next = $my_nodo;
            $my_nodo->prev = $this->end;
            $this->end = $my_nodo;
        }
    }

    function BorrarNodo($valor){
        if($this->front == null && $this->end == null){
            return "LISTA VACIA";
        }else{
            $x=$this->front;
            while($x->dato != $valor && $x->next != null){
                $x = $x -> next;
            }
            if($x->dato == $valor){
                if($x == $this->front){
                    $this->front = $x->next;
                    $x->next->prev = null;
                    $x->next = null;
                    return;
                }elseif($x == $this->end){
                    $this->end = $x->prev;
                    $x->prev->next = null;
                    $x->prev = null;
                    return;
                }else{
                    $x->prev->next =$x->next;
                    $x->next->prev =$x->prev;
                    return;
                }
            }else{
                return "__NODO No Encontrado__";
            }
        }
    }

    function ImprimirDer(){
        if($this->front == null && $this->end == null){
            return "LISTA VACIA";
        }else{
            $x=$this->front;
            while($x != null){
                echo " ".$x -> dato." = ";
                $x = $x -> next;
            }
        }
    }

    function ImprimirIzq(){
        if($this->front == null && $this->end == null){
            return "LISTA VACIA";
        }else{
            $x=$this->end;
            while($x != null){
                echo " = ".$x -> dato." ";
                $x = $x -> prev;
            }
        }
    }
}

$MyLDE = new LDE();
$MyLDE -> InsertarInicio(10);
$MyLDE -> InsertarInicio(8);
$MyLDE -> InsertarInicio(25);
$MyLDE -> InsertarInicio(28);
$MyLDE -> InsertarInicio(26);
$MyLDE -> InsertarFinal(9);

$r = $MyLDE -> InsertarDespues(44, 25);
echo $r;   
echo "<br>";

$r = $MyLDE -> InsertarDespues(44, 9);
echo $r;   
echo "<br>";

$x = $MyLDE -> ImprimirDer();
echo $x;

echo "<br>";
echo "Imprimiendo del lado IZQUIERDO";
echo "<br>";

$x = $MyLDE -> ImprimirIzq();
echo $x;

echo "<br>";
echo "<br>";
echo "***Borrando un nodo de la Lista**";

$x = $MyLDE -> BorrarNodo(26);
echo $x;

echo "<br>";

$x = $MyLDE -> ImprimirDer();
echo $x;

echo "<br>";
echo "Imprimiendo del lado IZQUIERDO";
echo "<br>";

$x = $MyLDE -> ImprimirIzq();
echo $x;

/*
*Funciona en todos los sentidos
*Al eliminar el primer o el ultimo NODO
*/

?>