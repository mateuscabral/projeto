<?php

final Class Carrinho{
    public $nome;
    public $preco;
    public $quantidade;


public function construct(){
    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
    }
}

public function add($nome, $preco, $quantidade){
}

public function excluir(){
    unset($_SESSION['carrinho']);
}

public function calc(){
    $nome_produto;
    $preco;
    $quantidade;
    $valor_total = $quantidade * $preco;
}
}


?>