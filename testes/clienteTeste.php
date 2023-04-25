<?php
include_once("../libs/global.php");

$i = 0;

// while ($i < 1000) {

print_r($i . "\n");

$cliente1 = new Cliente("Joao Victor", "Gomes", 11111111);

// print_r($cliente1);

$cliente1->save();

$cliente2 = new Cliente("Joao 2 Victor 2", "Gomes 2", "AA11111");

// print_r($cliente2);

$cliente2->save();

$i++;
// }

$clientes = Cliente::getRecords();
// print_r($clientes);

print_r("\n");

foreach ($clientes as $cliente) {
    print_r($cliente->getIndex() . '  ');
    print_r($cliente->getNome() . '  ');
    print_r($cliente->getSobrenome() . '  ');
    print_r($cliente->getDocumentoIdentificacao() . '  ');
    print_r("\n");
}
