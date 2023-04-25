<?php

include_once("../libs/global.php");

$sair = 0;

while ($sair == 0) {
    $opcMenu = 0;

    print_r("------ MENU SISTEMA ------\r\n");


    print_r("\n--- AEROPORTOS ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Aeroporto\r\n");
    print_r(++$opcMenu . " - Ver Aeroportos\r\n");

    print_r("\n--- COMPANHIAS AEREAS ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Companhia Aerea\r\n");
    print_r(++$opcMenu . " - Ver Companhias Aereas\r\n");

    print_r("\r\n-1 para sair do sistema\r\n");

    $opcao = (string)readline("Digite uma opcao: ");

    $opcMenu = 0;

    switch ($opcao) {

        case ++$opcMenu:
            print_r("Cadastramento de Aeroporto\r\n");
            print_r("\n\n");
            sis_cadastrarAeroporto();
            break;

        case ++$opcMenu:
            print_r("Ver aeroportos\r\n");
            print_r("\n\n");
            sis_verAeroportos();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Companhia Aerea\r\n");
            print_r("\n\n");
            sis_CadastrarCompanhiaAerea();
            break;

        case ++$opcMenu:
            print_r("Ver Companhia Aerea\r\n");
            print_r("\n\n");
            sis_verCompanhiasAereas();
            break;

        case -1:
            print_r("Saindo do sistema...\r\n");
            $sair = 1;
            break;

        default:
            print_r("Opcao errada!!\r\n");
            print_r("\n\n");
            break;
    }
}

function sis_cadastrarAeroporto()
{
    $sigla = (string)readline("Digite a sigla do aeroporto: ");
    $cidade = (string)readline("Digite a cidade do aeroporto: ");
    $estado = (string)readline("Digite o estado do aeroporto: ");

    $aeroporto = new Aeroporto($sigla, $cidade, $estado);

    $aeroporto->save();

    print_r("Aeroporto cadastrado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verAeroportos()
{
    $aeroportos = Aeroporto::getRecords();

    print_r("Aeroportos cadastrados:\r\n");
    print_r("Index - Sigla - Cidade - Estado\r\n");

    foreach ($aeroportos as $aeroporto) {
        print_r($aeroporto->getIndex() . " - " . $aeroporto->getSigla() . " - " . $aeroporto->getCidade() . " - " . $aeroporto->getEstado() . "\r\n");
    }

    print_r("\n\n");
}

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

    print_r("Companhias Aereas cadastradas:\r\n");
    print_r("Index - Nome - Codigo - Razao Social - CNPJ - Sigla\r\n");

    foreach ($companhiasAereas as $companhiaAerea) {
        print_r($companhiaAerea->getIndex() . " - " . $companhiaAerea->getNome() . " - " . $companhiaAerea->getCodigo() . " - " . $companhiaAerea->getRazaoSocial() . " - " . $companhiaAerea->getCnpj() . " - " . $companhiaAerea->getSigla() . "\r\n");
    }

    print_r("\n\n");
}
