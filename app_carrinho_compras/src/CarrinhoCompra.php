<?php

namespace src;

use src\Item;

class CarrinhoCompra {
    
    //atributos
    private $itens;
    private $status;
    private $valorTotal;

    //métodos
    public function __construct() {
        $this->itens = [];
        $this->status = 'aberto';
        $this->valorTotal = 0;
    }

    public function getItens() {
        return $this->itens;
    }

    public function adicionarItem(Item $item) {
        array_push($this->itens, $item);
        return true;
    }

    public function validarCarrinho() {
        return count($this->itens) > 0;
    }

}