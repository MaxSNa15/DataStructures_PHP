<?php

class Nodo{
    public $left = null;
    public $dato = "";
    public $right = null;
}

class BST{

    public $root = null;
    public $aux = null;
    public $prev = null;

    function InsertarNodos($valor){
        $nodo = new Nodo();
        $nodo -> dato = $valor;
        if ($this -> root == null) {
            $this -> root = $nodo;
        }else{
            $this ->aux = $this ->root;
            while ($this -> aux != null) {
                $this ->prev = $this -> aux;
                if ($nodo->dato < $this -> aux->dato) {
                    $this -> aux = $this -> aux->left;
                }else {
                    $this -> aux = $this -> aux->right;
                }
            }
            if ($nodo->dato < $this ->prev->dato) {
                $this ->prev->left = $nodo;
            }else{
                $this ->prev->right = $nodo;
            }
        }
    }

    function PostOrder($nodo){
        /* 
         * primero todo izquierdo
         * todo derecho
         * luego root
         */
        if($nodo != null){
            $this->PostOrder($nodo->left);
            $this->PostOrder($nodo->right);
            echo $nodo->dato.", "; 
        }
    }

    function InOrder($nodo){
        /* 
         * Primero el sub arbol izquierdo
         * Luego visito root
         * Luego visito el sub arbol derecho
         */
        if ($nodo != null) {
            $this->InOrder($nodo->left);
            echo $nodo->dato.", "; 
            $this->InOrder($nodo->right);
        }
    }

    function PreOrder($nodo){
        /* 
         *visitar root
         *todo el izquierdo
         *todo derecho 
         */
        if ($nodo != null) {
            echo $nodo->dato.", "; 
            $this->PreOrder($nodo->left);
            $this->PreOrder($nodo->right);
        }
    }

    function Menor($nodo){
        if ($nodo != null) {
            $this->Menor($nodo->left);
            if ($nodo ->left == null) {
                echo $nodo -> dato;
            }
        }
        return $nodo;
    }

    function Mayor($nodo){
        if ($nodo != null) {
            $this->Mayor($nodo->right);
            if ($nodo ->right == null) {
                echo $nodo -> dato;
            }
        }
    }

    function BuscarNodo($nodo,$numero){
        while($nodo != null){
            if ($numero == $nodo->dato) {
                break;
            }
            if($numero < $nodo->dato){
                $nodo = $nodo->left;
            }else{
                $nodo = $nodo->right;
            }
        }
        if ($nodo == null) {
            echo"No encontrado";
        }else{
            echo "Encontrado"; 
        }
    }

    function BuscarNodoRec($nodo,$numero){
        if($nodo == null){
            echo "NO hace nada"; 
        }else if($numero < $nodo ->dato){
            $this->BuscarNodoRec($nodo->left, $numero);
        }else if($numero > $nodo ->dato){
            $this->BuscarNodoRec($nodo->right, $numero);
        }else {
            $this->BorrarNodo($nodo);
        }
    }

    function BorrarNodo($nodo){
        echo "$nodo->dato". "</br>";
        if ($nodo -> left && $nodo -> right) {
            $x =$this->Menor($nodo);
            $x = $x ->left;
            $nodo -> dato = $x -> dato;
            $this->BorrarNodo($x);
        }else if($nodo -> left){
            $this -> Remplazar($nodo, $nodo -> left);
        }else if($nodo -> right){
            $this -> Remplazar($nodo, $nodo -> right);
        }else{
            $this ->Remplazar($nodo, null);
        }
    }

    function Remplazar($nodo, $nuevoNodo){
        if ($nodo -> prev) {
            if ($nodo -> dato == $nodo -> prev -> left -> dato) {
                $nodo -> prev -> left = $nuevoNodo;
            }else if($nodo -> dato == $nodo -> prev -> right -> dato){
                $nodo -> prev -> right = $nuevoNodo;
            }
        }
        if($nuevoNodo){
            $nuevoNodo ->prev = $nodo -> prev;
        }
    }
}

$My_BST = new BST();

$My_BST -> InsertarNodos(15);
$My_BST -> InsertarNodos(32);
$My_BST -> InsertarNodos(18);
$My_BST -> InsertarNodos(3);
$My_BST -> InsertarNodos(2);
$My_BST -> InsertarNodos(20);
$My_BST -> InsertarNodos(5);

echo "_*_INORDER_*_"; 
echo "</br>"; 
$My_BST->InOrder($My_BST->root);

echo "</br>"; 
echo "_*_PREORDER_*_"."</br>"; 
$My_BST->PreOrder($My_BST->root);

echo "</br>"; 
echo "_*_POSTORDER_*_"."</br>"; 
$My_BST->PostOrder($My_BST->root);

echo "</br>"; 
echo "_*_BUSCAR NODO_*_"; 
echo "</br>"; 
$My_BST->BuscarNodo($My_BST->root,-3);

echo "</br>"; 
echo "_*_Menor_*_"; 
echo "</br>"; 
$My_BST->Menor($My_BST->root);

echo "</br>"; 
echo "_*_MAYOR_*_"; 
echo "</br>"; 
$My_BST->Mayor($My_BST->root);

echo "</br>"; 
echo "_*_ELIMINAR NODO_*_"; 
echo "</br>"; 
$My_BST->BuscarNodoRec($My_BST->root,12);
?>