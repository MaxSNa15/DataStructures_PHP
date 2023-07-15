<?php

class Nodo{
    public $left = null;
    public $dato = " ";
    public $right = null;
}

class BST{

    public $root = null;

    function insertarNodo($subarbol, $nodo){
        if($nodo-> dato <= $subarbol->dato){
            if($subarbol->left == null){
                $subarbol->left = $nodo;
            }else{
                $this->insertarNodo($subarbol->left, $nodo);
            }
        }else{
            if($subarbol->right == null){
                $subarbol->right = $nodo;
            }else{
                $this->insertarNodo($subarbol->right, $nodo);
            }
        }
    }

    function insertar($valor){
        $nodo = new Nodo();
        $nodo->dato = $valor;
        if($this->root == null){
            $this->root = $nodo;
        }else{
            $this->insertarNodo($this->root, $nodo);
        }
    }

// !REGION 
    function DFS(){
        if($this->root == null){
            echo "arbol vacio";
        }else{
            $this->DFS_r($this->root);
        }
    }

    function DFS_r($subarbol){
        echo $subarbol->dato. "-";
        if($subarbol->left!= null){
            $this->DFS_r($subarbol->left);
        }
        if($subarbol->right!=null){
            $this->DFS_r($subarbol->right);
        }
    }

    function BFS(){
        if($this->root == null){
            echo "arbol vacio";
        }else{
            $this->BFS_r($this->root);
        }
    }

    function BFS_r($subarbol){
        echo $subarbol->dato. "-";
        
        if($subarbol->left!= null){
            $subarbol=$subarbol->left;
            echo $subarbol->dato. "-";
        }
        if($subarbol->right!=null){
            $subarbol=$subarbol->right;
            echo $subarbol->dato. "-";
        }
        if($subarbol->right!=null){
            $subarbol=$subarbol->right;
            echo $subarbol->dato. "-";
        }
        if($subarbol->left != null){
            $this->BFS_r($subarbol->left);
        }
        if($subarbol->right !=null){
            $this->BFS_r($subarbol->right);
        }
    }
// !END REGION

}

$arbol = new BST();

$arbol->insertar(15); 
$arbol->insertar(32);
$arbol->insertar(18);
$arbol->insertar(3);
$arbol->insertar(2);
$arbol->insertar(20);
$arbol->insertar(5);

echo "_*_DFS_*_"."</br>"; 
$arbol->DFS();

echo "</br>"; 
echo "_*_BFS_*_"."</br>"; 
$arbol->BFS();


?>