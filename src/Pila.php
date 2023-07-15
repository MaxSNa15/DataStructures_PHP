<?php

class Pila{

    public $array =[];
    public $top = -1;

    function Push($valor){
            $this -> top ++;
            $this -> array[$this -> top] = $valor;
    }

    function Pop(){
            if($this -> top == -1){
                echo "Error, pila vacia";
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
                echo $this -> array[$i];
                echo "</br>";
                }
            }
    }

    function Buscar($valor){
            if($this -> top == -1){
                echo "Error, pila vacia";
            }else{
                $x =0;
                $y=0;
                while($x <= $this ->top){
                    if($valor == $this -> array[$x]){
                        $y = 1;
                        return $y;
                    }else{
                        $x++;
                    }
                }
                return $y;
            }
    }

    function Menor(){
        if($this -> top == -1){
            echo "Error, pila vacia";
        }else{
            $menor = $this -> array[0];
            $x =0;
            while($x <= $this -> top){
                if($this -> array[$x]<$menor){
                    $menor = $this -> array[$x];
                }
                $x ++;
            }
            return $menor;
        }
    }

    function Mayor(){
        if($this -> top == -1){
            echo "Error, pila vacia";
        }else{
            $mayor = $this -> array[0];
            $x =0;
            while($x <= $this -> top){
                if($this -> array[$x] > $mayor){
                    $mayor = $this -> array[$x];
                }
                $x ++;
            }
            return $mayor;
        }
    }

    function Promedio(){
        if($this -> top == -1){
            echo "Error, pila vacia";
        }else{
            $suma =0;
            $x =0;
            while($x <= $this -> top){
                $suma +=$this -> array[$x];
                $x ++;
            }
            $promedio = $suma/($this -> top+1);
            return $promedio;
        }
    }

}

$miPila = new pila();
$miPila ->Push(4);
$miPila ->Push(10);

$miPila -> Imprimir();

?>