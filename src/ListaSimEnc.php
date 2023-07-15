<?php

class nodo {
    public $dato = "";
    public $next = null;
}

class LES{
    
    public $head = null;

    function InsertarNodoInicio($valor){
        $my_nodo = new nodo();
        $my_nodo -> dato = $valor;
        if($this -> head == null){
            $this -> head = $my_nodo;
        }else{
            $my_nodo -> next = $this -> head;
            $this -> head = $my_nodo;
        }
    }

    function InsertarNodoFinal($valor){
        $my_nodo = new nodo();
        $my_nodo -> dato = $valor;
        $x = $this -> head;
        while($x -> next != null){
            $x = $x -> next;
        }
        $x -> next = $my_nodo;
    }

    function Imprimir(){
        if($this -> head == null){
            return "Lista vacia";
        }else{
            $x = $this->head;
            while($x -> next != null){
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
            while($x -> next != null){
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
                $prev -> next = null;
            }
        }
    }

}

$my_LES = new LES();
$my_LES -> InsertarNodoInicio(3);

?>