<?php

include_once("../libs/global.php");

function sis_CadastrarAeronave()
{
    $fabricante = (string)readline("Digite o fabricante da aeronave: ");
    $modelo = (string)readline("Digite o modelo da aeronave: ");
    $capacidadePassageiros = (int)readline("Digite a capacidade de passageiros da aeronave: ");
    $capacidadeCarga = (float)readline("Digite a capacidade de carga da aeronave: ");

    do {
        $registro = (string)readline("Digite o registro da aeronave: ");

        $aeronave = Aeronave::criarAeronave($fabricante, $modelo, $capacidadePassageiros, $capacidadeCarga, $registro);
    } while ($aeronave == null);

    $aeronave->save();

    print_r("Aeronave cadastrada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verAeronaves()
{
    $aeronaves = Aeronave::getRecords();

    mostraAeronaves($aeronaves);

    print_r("\n\n");
}

function mostraAeronaves(array $aeronaves)
{
    print_r("Aeronaves cadastradas:\r\n");
    print_r("Index - Fabricante - Modelo - Capacidade de Passageiros - Capacidade de Carga - Registro - Comp. Aerea\r\n");

    foreach ($aeronaves as $aeronave) {
        print_r($aeronave->getIndex() . " - " . $aeronave->getFabricante() . " - " . $aeronave->getModelo() . " - " . $aeronave->getCapacidadePassageiros() . " - " . $aeronave->getCapacidadeCarga() . " - " . $aeronave->getRegistro() . " - " . $aeronave->getCompAereaPertencente() . "\r\n");
    }
}

function sis_editarAeronave()
{
    $aeronaves = Aeronave::getRecords();

    mostraAeronaves($aeronaves);

    $indexAeronave = (int)readline("Digite o index da aeronave: ");

    $aeronave = $aeronaves[$indexAeronave - 1];

    $fabricante = (string)readline("Digite o fabricante da aeronave: ");
    $modelo = (string)readline("Digite o modelo da aeronave: ");
    $capacidadePassageiros = (int)readline("Digite a capacidade de passageiros da aeronave: ");
    $capacidadeCarga = (float)readline("Digite a capacidade de carga da aeronave: ");
    $registro = (string)readline("Digite o registro da aeronave: ");

    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a qual pertence essa aeronave: ");

    $aeronaveNova = Aeronave::criarAeronave($fabricante, $modelo, $capacidadePassageiros, $capacidadeCarga, $registro, $indexCompanhiaAerea);

    if ($aeronaveNova == null) {
        print_r("Aeronave não pode ser editada!\r\n");
        return;
    } else {
        $aeronave->alteraAeronave($aeronaveNova);

        $aeronave->save();

        print_r("Aeronave editada com sucesso!\r\n");
    }

    print_r("\n\n");
}
