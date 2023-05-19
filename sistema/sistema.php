<?php

include_once("../libs/global.php");
include_once("files/sistemaAeroporto.php");
include_once("files/sistemaCompAerea.php");
include_once("files/sistemaAeronave.php");
include_once("files/sistemaVeiculo.php");
include_once("files/sistemaTripulante.php");

// define("PILOTO", 1);
// define("COMISSARIO", 2);

$sair = 0;

while ($sair == 0) {
    $opcMenu = 0;

    print_r("------ MENU SISTEMA ------\r\n");


    print_r("\n--- AEROPORTOS ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Aeroporto\r\n");
    print_r(++$opcMenu . " - Ver Aeroportos\r\n");
    print_r(++$opcMenu . " - Editar Aeroportos\r\n");
    print_r(++$opcMenu . " - Adicionar uma Companhia Aerea a um Aeroporto\r\n");
    print_r(++$opcMenu . " - Ver Companhias Aereas de um Aeroporto\r\n");
    print_r(++$opcMenu . " - Cadastrar Voos\r\n");
    print_r(++$opcMenu . " - Ver Voos\r\n");
    print_r(++$opcMenu . " - Editar Voos\r\n");

    print_r("\n--- COMPANHIAS AEREAS ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Companhia Aerea\r\n");
    print_r(++$opcMenu . " - Ver Companhias Aereas\r\n");
    print_r(++$opcMenu . " - Editar Companhia Aerea\r\n");
    print_r(++$opcMenu . " - Adicionar uma Aeronave a uma Companhia Aerea\r\n");
    print_r(++$opcMenu . " - Ver Aeronaves da Comp Aerea\r\n");
    print_r(++$opcMenu . " - Adicionar um Veiculo a uma Companhia Aerea\r\n");
    print_r(++$opcMenu . " - Ver Veiculos da Comp Aerea\r\n");

    print_r("\n--- TRIPULANTES ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Piloto\r\n");
    print_r(++$opcMenu . " - Ver Pilotos\r\n");
    print_r(++$opcMenu . " - Editar Piloto\r\n");
    print_r(++$opcMenu . " - Cadastrar Comissario\r\n");
    print_r(++$opcMenu . " - Ver Comissarios\r\n");
    print_r(++$opcMenu . " - Editar Comissario\r\n");

    print_r("\n--- AERONAVES ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Aeronave\r\n");
    print_r(++$opcMenu . " - Ver Aeronaves\r\n");
    print_r(++$opcMenu . " - Editar Aeronave\r\n");

    print_r("\n--- VEICULOS ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Veiculo\r\n");
    print_r(++$opcMenu . " - Ver Veiculos\r\n");
    print_r(++$opcMenu . " - Editar Veiculo\r\n");

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
            print_r("Editar Aeroporto\r\n");
            print_r("\n\n");
            sis_editarAeroporto();
            break;

        case ++$opcMenu:
            print_r("Conexao Comp. Aerea em Aeroporto\r\n");
            print_r("\n\n");
            sis_conectarCompanhiaAereaEmAeroporto();
            break;

        case ++$opcMenu:
            print_r("Ver Comp. Aerea em Aeroporto\r\n");
            print_r("\n\n");
            sis_verCompanhiasAereasEmAeroporto();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Voo\r\n");
            print_r("\n\n");
            sis_CadastrarVoo();
            break;

        case ++$opcMenu:
            print_r("Ver Voos\r\n");
            print_r("\n\n");
            sis_verVoos();
            break;

        case ++$opcMenu:
            print_r("Editar Voo\r\n");
            print_r("\n\n");
            sis_editarVoo();
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

        case ++$opcMenu:
            print_r("Editar Companhia Aerea\r\n");
            print_r("\n\n");
            sis_editarCompanhiaAerea();
            break;

        case ++$opcMenu:
            print_r("Conexao Aeronave em Companhia Aerea\r\n");
            print_r("\n\n");
            sis_conectarAeronaveEmCompanhiaAerea();
            break;

        case ++$opcMenu:
            print_r("Ver Aeronaves da Comp Aerea\r\n");
            print_r("\n\n");
            sis_verAeronavesDaCompanhiaAerea();
            break;

        case ++$opcMenu:
            print_r("Conexao Veiculo em Companhia Aerea\r\n");
            print_r("\n\n");
            sis_conectarVeiculoEmCompanhiaAerea();
            break;

        case ++$opcMenu:
            print_r("Ver Veiculos da Comp Aerea\r\n");
            print_r("\n\n");
            sis_verVeiculosDaCompanhiaAerea();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Piloto\r\n");
            print_r("\n\n");
            sis_CadastrarPiloto();
            break;

        case ++$opcMenu:
            print_r("Ver Pilotos\r\n");
            print_r("\n\n");
            sis_verPilotos();
            break;

        case ++$opcMenu:
            print_r("Editar Piloto\r\n");
            print_r("\n\n");
            sis_editarPiloto();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Comissario\r\n");
            print_r("\n\n");
            sis_CadastrarComissario();
            break;

        case ++$opcMenu:
            print_r("Ver Comissarios\r\n");
            print_r("\n\n");
            sis_verComissarios();
            break;

        case ++$opcMenu:
            print_r("Editar Comissario\r\n");
            print_r("\n\n");
            sis_editarComissario();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Aeronave\r\n");
            print_r("\n\n");
            sis_CadastrarAeronave();
            break;

        case ++$opcMenu:
            print_r("Ver Aeronaves\r\n");
            print_r("\n\n");
            sis_verAeronaves();
            break;

        case ++$opcMenu:
            print_r("Editar Aeronave\r\n");
            print_r("\n\n");
            sis_editarAeronave();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Veiculo\r\n");
            print_r("\n\n");
            sis_CadastrarVeiculo();
            break;

        case ++$opcMenu:
            print_r("Ver Veiculos\r\n");
            print_r("\n\n");
            sis_verVeiculos();
            break;

        case ++$opcMenu:
            print_r("Editar Veiculo\r\n");
            print_r("\n\n");
            sis_editarVeiculo();
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