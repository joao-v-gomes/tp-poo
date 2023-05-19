<?php

include_once("../libs/global.php");

function sis_CadastrarCompanhiaAerea()
{
    $nome = (string)readline("Digite o nome da companhia aerea: ");
    $codigo = (string)readline("Digite o codigo da companhia aerea: ");
    $razaoSocial = (string)readline("Digite a razao social da companhia aerea: ");
    $cnpj = (string)readline("Digite o CNPJ da companhia aerea: ");
    $sigla = (string)readline("Digite a sigla da companhia aerea: ");

    $companhiaAerea = new CompanhiaAerea($nome, $codigo, $razaoSocial, $cnpj, $sigla);

    $companhiaAerea->save();

    print_r("Companhia Aerea cadastrada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verCompanhiasAereas()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    print_r("\n\n");
}

function mostraCompanhiasAereas(array $companhiasAereas)
{
    print_r("Companhias Aereas cadastradas:\r\n");
    print_r("Index - Nome - Codigo - Razao Social - CNPJ - Sigla\r\n");

    foreach ($companhiasAereas as $companhiaAerea) {
        print_r($companhiaAerea->getIndex() . " - " . $companhiaAerea->getNome() . " - " . $companhiaAerea->getCodigo() . " - " . $companhiaAerea->getRazaoSocial() . " - " . $companhiaAerea->getCnpj() . " - " . $companhiaAerea->getSigla() . "\r\n");
    }
}

function sis_editarCompanhiaAerea()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $index = (int)readline("Digite o index da companhia aerea que deseja editar: ");

    $companhiaAerea = $companhiasAereas[$index - 1];

    $nome = (string)readline("Digite o nome da companhia aerea: ");
    $codigo = (string)readline("Digite o codigo da companhia aerea: ");
    $razaoSocial = (string)readline("Digite a razao social da companhia aerea: ");
    $cnpj = (string)readline("Digite o CNPJ da companhia aerea: ");
    $sigla = (string)readline("Digite a sigla da companhia aerea: ");

    $companhiaAerea->setNome($nome);
    $companhiaAerea->setCodigo($codigo);
    $companhiaAerea->setRazaoSocial($razaoSocial);
    $companhiaAerea->setCnpj($cnpj);
    $companhiaAerea->setSigla($sigla);

    $companhiaAerea->save();

    print_r("Companhia Aerea editada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_conectarAeronaveEmCompanhiaAerea()
{
    $aeronaves = Aeronave::getRecordsByField('compAereaPertencente', SEM_COMPANHIA_AEREA);

    // print_r("Aeronaves sem companhia aerea:\r\n");
    // print_r($aeronaves);

    if (count($aeronaves) == 0) {
        print_r("Nao ha aeronaves sem companhia aerea!\r\n");
        return;
    }

    mostraAeronaves($aeronaves);

    $indexAeronave = (int)readline("Digite o index da aeronave: ");

    $companhiasAereas = CompanhiaAerea::getRecords();

    if (count($companhiasAereas) == 0) {
        print_r("Nao ha companhias aereas cadastradas!\r\n");
        return;
    }

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    foreach ($aeronaves as $aeronave) {
        if ($aeronave->getIndex() == $indexAeronave) {
            $aeronave->setCompAereaPertencente($indexCompanhiaAerea);

            $aeronave->save();

            break;
        }
    }

    print_r("Aeronave conectada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verAeronavesDaCompanhiaAerea()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    // $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

    // print_r("Companhia Aerea selecionada: " . $companhiaAerea);

    // $siglaCompAereaSelecionada = $companhiaAerea->getSigla();

    // print_r("Sigla da Companhia Aerea selecionada: " . $siglaCompAereaSelecionada . "\r\n");

    $aeronaves = Aeronave::getRecordsByField('compAereaPertencente', $indexCompanhiaAerea);

    mostraAeronaves($aeronaves);

    print_r("\n\n");
}
