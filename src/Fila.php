<?php

class Fila{

    public $fila =[];
    public $head = 0;
    public $tail = 0;

    function Enqueue($valor){
        $this -> fila[$this -> tail] = $valor;
        $this -> tail++;
    }

    function Dequeue(){
        if($this -> head == $this -> tail){
            return "Fila vacia";
        }else{
            $valor= $this -> fila[$this -> head];
            $this -> head++;
            return $valor;
        }
    }

    function Imprimir(){
        if($this -> head == $this -> tail){
            return "Fila vacia";
        }else{
            for ($i=$this -> head; $i< $this -> tail; $i++) { 
                echo $this -> fila[$i];
                echo " ";
            }
        }
    }

    function ParEImpar(){
        if($this -> head == $this -> tail){
            return "Fila vacia";
        }else{
            for ($i=$this -> head; $i< $this -> tail; $i++){ 
                if($this -> fila[$this -> head] % 2 == 0 ){
                    echo "1";
                    echo "</br>";
                }else{
                    echo "0";
                    echo "</br>";
                }
                $this -> head ++;
            }
        }
    }

    function Sumatoria(){
        if($this -> head == $this -> tail){
            return "Fila vacia";
        }else{
            $sumaTotal = 0;
            for ($i=$this -> head; $i< $this -> tail; $i++){
                $sumaTotal += $this -> fila[$i];
            }
            return $sumaTotal;
        }
    }

}

$myFila= new Fila();
$myFila ->Enqueue(2);
$myFila ->Enqueue(3);
$myFila -> Imprimir();

?>