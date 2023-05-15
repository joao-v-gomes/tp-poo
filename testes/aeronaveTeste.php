<?php
include_once("../libs/global.php");

// $topgun = new Aeronave("russian", "mk-dir", 10, 10000, "pa-abc", true);

// $topgun = null;

// unset($topgun);

// print_r("Obj vazio? " . empty($topgun) . "\n");

// $topgun->__destruct();

// $topgun->save();

// $aeronaves = Aeronave::getRecords();

// var_dump($topgun->getIndex());


// var_dump(isset($topgun->getRegistro()));

// if ($topgun->getTeste() == true) {
//     echo "Aeronave Criada\n";
// } else {
//     echo "Aeronave não Criada\n";
// }

// var_dump($topgun->getRegistro());

// $topgun = Aeronave::criarAeronave("russian", "mk-dir", 10, 10000, "pa-abc", "tam");

// if ($topgun == NULL) {
//     echo "Aeronave não Criada\n";
// } else {
//     print_r($topgun);
// }

$fabricante = (string)readline("Digite o fabricante da aeronave: ");
$modelo = (string)readline("Digite o modelo da aeronave: ");
$capacidadePassageiros = (int)readline("Digite a capacidade de passageiros da aeronave: ");
$capacidadeCarga = (float)readline("Digite a capacidade de carga da aeronave: ");
$indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a qual pertence essa aeronave: ");
$siglaCompAereaSelecionada = "abc";


do {

    $registro = (string)readline("Digite o registro da aeronave: ");

    $aeronave = Aeronave::criarAeronave($fabricante, $modelo, $capacidadePassageiros, $capacidadeCarga, $registro, $siglaCompAereaSelecionada);
} while ($aeronave == null);

$aeronave->save();

print_r("Aeronave cadastrada com sucesso!\r\n");

print_r("\n\n");

$aeronaves = Aeronave::getRecords();

print_r($aeronaves);
