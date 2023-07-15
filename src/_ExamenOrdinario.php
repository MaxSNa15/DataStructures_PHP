<?php

class Nodo{
    public $left = null;
    public $right = null;
    public $dato1;
    public $dato2;
}

class BST{

    public $root = null;
    public $aux = null;
    public $prev = null;
    public $suma;
    public $it = 0;

    function InsertarNodos($dato1,$dato2){
        $this->it ++;
        $nodo = new Nodo();
        $nodo -> dato1 = $dato1;
        $nodo -> dato2 = $dato2;
        $this -> Suma($dato2);
        if ($this -> root == null) {
            $this -> root = $nodo;
        }else{
            $this ->aux = $this ->root;
            while ($this -> aux != null) {
                $this ->prev = $this -> aux;
                if ($nodo->dato2 < $this -> aux->dato2) {
                    $this -> aux = $this -> aux->left;
                }else {
                    $this -> aux = $this -> aux->right;
                }
            }
            if ($nodo->dato2 < $this ->prev->dato2) {
                $this ->prev->left = $nodo;
            }else{
                $this ->prev->right = $nodo;
            }
        }
    }

    function PostOrder($nodo){
        if($nodo != null){
            $this->PostOrder($nodo->left);
            $this->PostOrder($nodo->right);
            echo $nodo->dato1."    ".$nodo->dato2."<br>"; 
        }
    }

    function InOrder($nodo){
        if ($nodo != null) {
            $this->InOrder($nodo->left);
            echo $nodo->dato1."    ".$nodo->dato2."<br>"; 
            $this->InOrder($nodo->right);
        }
    }

    function PreOrder($nodo){
        if ($nodo != null) {
            echo $nodo->dato1."    ".$nodo->dato2."<br>"; 
            $this->PreOrder($nodo->left);
            $this->PreOrder($nodo->right);
        }
    }

    function Menor($nodo){
        if ($nodo != null) {
            $this->Menor($nodo->left);
            if ($nodo ->left == null) {
                echo $nodo->dato1."    ".$nodo->dato2."<br>"; 
            }
        }
    }

    function Mayor($nodo){
        if ($nodo != null) {
            $this->Mayor($nodo->right);
            if ($nodo ->right == null) {
                echo $nodo->dato1."    ".$nodo->dato2."<br>"; 
            }
        }
    }

    function Suma($valor){
        $this -> suma += $valor;
        $this -> suma / 4;
        return $this->suma;
    }

    function Promedio(){
        $prom = $this->Suma(0) / $this->it;
        return $prom;
    }

}

$My_BST = new BST();

$My_BST -> InsertarNodos("Juan Perez", 100);
$My_BST -> InsertarNodos("Alberto Fuentes", 50);
$My_BST -> InsertarNodos("Martha Rodriguez", 80);
$My_BST -> InsertarNodos("Xochitl Sanchez", 75);

$My_BST->InOrder($My_BST->root);

echo "</br>"; 
$My_BST->PostOrder($My_BST->root);

echo "</br>"; 
$My_BST->Menor($My_BST->root);

echo "</br>"; 
$My_BST->Mayor($My_BST->root);

echo "</br>"; 
echo $My_BST->Promedio();

?>