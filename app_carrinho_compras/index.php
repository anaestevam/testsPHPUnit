<?php

require __DIR__."/vendor/autoload.php";


use src\CarrinhoCompra;
use src\Item;
use src\Pedido;
use src\EmailService;

$carrinho1 = new CarrinhoCompra();
echo '<h3>Com SRP</h3>';

$pedido = new Pedido();

$item1 = new Item();
$item2 = new Item();

$item1->setDescricao('Bicicleta');
$item1->setValor(750.10);

$item2->setDescricao('Galadeira');
$item2->setValor(1950.15);

$pedido->getCarrinhoCompra()->adicionarItem($item1);
$pedido->getCarrinhoCompra()->adicionarItem($item2);

echo '<h4>Itens do carrinho</h4>';
echo '<pre>';
print_r($pedido->getCarrinhoCompra()->getItens());
echo '</pre>';

echo '<h4>Itens do carrinho</h4>';
$total = 0;
foreach($pedido->getCarrinhoCompra()->getItens() as $key => $item1) {
    echo 'Descrição: '.$item1->getDescricao().'<br />';
    echo 'Valor: '.$item1->getValor().'<br />';
    $total += $item1->getValor();
}
echo 'Valor total: '.$total.'<br />';

echo '<h4> Carrinho valido ?</h4>';
echo $pedido->getCarrinhoCompra()->validarCarrinho().'<br />';

echo '<h4>Status do carrinho</h4>';
echo 'status: '.$pedido->getCarrinhoCompra()->getStatus().'<br />';