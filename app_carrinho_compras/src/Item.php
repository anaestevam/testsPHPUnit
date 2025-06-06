<?php

namespace src;

class Item {

    //atributos
    private $descricao;
    private $valor;

    //métodos
    public function __construct() {
        $this->descricao = '';
        $this->valor = 0;
    }

    public function getDescricao() {
        return $this->descricao;
    }
    public function setDescricao(string $descricao) {
        $this->descricao = $descricao;
    }
    public function getValor() {
        return $this->valor;
    }
    public function setValor(float $valor) {
        $this->valor = $valor;
    }

    public function itemValido() {
        if ($this->valor > 0 && $this->descricao != '') {
            return true;
        }
        return false;
    }
}