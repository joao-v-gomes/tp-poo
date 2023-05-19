<?php

include_once("../libs/global.php");

// define("SEM_COMPANHIA_AEREA", -1);

function sis_CadastrarVeiculo()
{
    $codigo = (string)readline("Digite o codigo do veiculo: ");
    $placa = (string)readline("Digite a placa do veiculo: ");
    $qtdeAssentos = (int)readline("Digite a quantidade de assentos do veiculo: ");

    $veiculo = new Veiculo($codigo, $placa, $qtdeAssentos);

    $veiculo->save();

    print_r("Veiculo cadastrado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verVeiculos()
{
    $veiculos = Veiculo::getRecords();

    mostraVeiculos($veiculos);

    print_r("\n\n");
}

function mostraVeiculos(array $veiculos)
{
    print_r("Veiculos cadastrados:\r\n");
    print_r("Index - Codigo - Placa - Quantidade de assentos - Horario Previsto Embarque - Comp. Aerea\r\n");

    foreach ($veiculos as $veiculo) {
        print_r($veiculo->getIndex() . " - " . $veiculo->getCodigo() . " - " . $veiculo->getPlaca() . " - " . $veiculo->getQtdeAssentos() . " - " . $veiculo->getHorarioEmbarquePrevisto()->format("d/m/Y H:i") . " - " . $veiculo->getCompAereaPertencente() . "\r\n");
    }
}

function sis_editarVeiculo()
{
    $veiculos = Veiculo::getRecords();

    mostraVeiculos($veiculos);

    $indexVeiculo = (int)readline("Digite o index do veiculo: ");

    $veiculo = $veiculos[$indexVeiculo - 1];

    $codigo = (string)readline("Digite o codigo do veiculo: ");
    $placa = (string)readline("Digite a placa do veiculo: ");
    $qtdeAssentos = (int)readline("Digite a quantidade de assentos do veiculo: ");

    $dataHoraEmbarque = (string)readline("Digite a data e hora previstas para o embarque (dd/mm/aaaa hh:mm): ");

    $dataHoraEmbarque = DateTime::createFromFormat("d/m/Y H:i", $dataHoraEmbarque);

    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a qual pertence esse veiculo: ");

    $veiculoNovo = new Veiculo($codigo, $placa, $qtdeAssentos);

    $veiculo->alteraVeiculo($veiculoNovo);
    $veiculo->setHorarioEmbarquePrevisto($dataHoraEmbarque);
    $veiculo->setCompAereaPertencente($indexCompanhiaAerea);

    $veiculo->save();

    print_r("Veiculo editado com sucesso!\r\n");

    print_r("\n\n");
}
