<?php
include_once("../libs/global.php");

//$i = 0;

// while ($i < 1000) {

//print_r($i . "\n");

$cliente1 = new Cliente("Joao Victor", "Gomes", "11111111");

//print_r($cliente1);

$cliente1->save();

$cliente2 = new Cliente("Joao 2 Victor 2", "Gomes 2", "AA11111");

// print_r($cliente2);

$cliente2->save();

//print_r($cliente2);

$Matt = new Passageiro(true, "Matheus", "Salles", "123456", "14092698097", "brasileiro", "04/07/1776", "meuemail@gmail.com");

$lista = ["CNF", "SP", "CNG"];

$velhaPassagem = new Passagem("SP", "BH", 1543.22, "C24", 1, $Matt, $cliente2, $lista);

print_r($velhaPassagem);

//$novaPassagem = new Passagem("CNF", "CNG", 123.22, "B12", 2, $Matt, $cliente2, $lista);

//$velhaPassagem->alteracaoPassagem($novaPassagem);
$velhaPassagem->cancelamentoDePassagem();

print_r($velhaPassagem);

// print_r($cliente1);

//$i++;
// }

$clientes = Cliente::getRecords();
// print_r($clientes);

//print_r("\n");

// foreach ($clientes as $cliente) {
//     print_r($cliente->getIndex() . '  ');
//     print_r($cliente->getNome() . '  ');
//     print_r($cliente->getSobrenome() . '  ');
//     print_r($cliente->getDocumentoIdentificacao() . '  ');
//     print_r("\n");
// }
