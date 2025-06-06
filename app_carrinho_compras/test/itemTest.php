<?php

use PHPUnit\Framework\TestCase;
use src\Item;

class itemTest extends TestCase {

    public function __contruct() {
        $item = new Item();
    }

    public function testFuncionamento() {
        
        $valor = 10.0;
        $this->assertEquals($valor, 10);
    }
    /**
     * @dataProvider dataValores
     */
    public function testValorItem($valor) {

        $item = new Item();

        $item->setValor($valor);

        $item->setDescricao('Item de teste');

        //verifica se o valor do item é 10.0
        $this->assertEquals($valor, $item->getValor());
        
    }

    /**
     * @dataProvider dataDescricao
     */
    public function testDescricaoItem() {
        $item = new Item();
        
        $descricao = 'Item de teste';

        $item->setDescricao($descricao);

        $this->assertEquals($descricao, $item->getDescricao());
    }

    /**
     * @dataProvider dataValoresDescricao
     */
    public function testValorItemValido($valor, $descricao) {
        $item = new Item();

        $item->setValor($valor);
        $item->setDescricao($descricao);

        $this->assertTrue($item->itemValido());
        $this->assertEquals(true, $item->itemValido());

    }

    public static function dataValores() {
        return [
            [10.0],
            [0.0],
            [-10.0],
        ];
    }

    public static function dataDescricao() {
        return [
            ['Item de teste'],
            [''],
        ];
    }

    public static function dataValoresDescricao() {
        return [
            [10.0, 'Item de teste'],
            // [0.0, ''],
            // [-10.0, ''],
        ];
    }
}