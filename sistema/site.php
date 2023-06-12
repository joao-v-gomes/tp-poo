<?php

include_once("../libs/global.php");
include_once("files/sistemaCliente.php");
include_once("files/sistemaPassageiro.php");
include_once("files/sistemaViagem.php");
include_once("files/sistemaPassagem.php");

$sair = 0;


while ($sair == 0) {
    $escolha = 0;
    print_r("------ BEM VINDO AO SITE DAS COMPAHIAS AEREAS ------\r\n");


    print_r("---CLIENTE--- \r\n");
    print_r(++$escolha . " - Cadastra Cliente\r\n");
    print_r(++$escolha . " - Ver Clientes\r\n");
    print_r(++$escolha . " - Editar Cliente\r\n");
    print_r(++$escolha . " - comprar Passagem\r\n");
    print_r(++$escolha . " - cancelar Passagem\r\n");

    print_r("---PASSAGEIRO--- \r\n");
    print_r(++$escolha . " - Cadastra Passgeiro\r\n");
    print_r(++$escolha . " - Ver Passageiro\r\n");
    print_r(++$escolha . " - Editar Passageiro\r\n");

    print_r("---VIAGEM--- \r\n");
    print_r(++$escolha . " - Cadastra viagem\r\n");
    print_r(++$escolha . " - Ver Viagens\r\n");
    print_r(++$escolha . " - Editar Viagem\r\n");
    print_r(++$escolha . " - ver os passageiros da viagem\r\n");
    print_r(++$escolha . " - adicionar passageiros na Viagem\r\n");
    print_r(++$escolha . " - fazer check_in\r\n");
    print_r(++$escolha . " - pesquisar Viagem\r\n");

    print_r("---PASSAGEM--- \r\n");
    print_r(++$escolha . " - Cadastra Passagem\r\n");
    print_r(++$escolha . " - Ver Passagem\r\n");
    print_r(++$escolha . " - Editar Passagem\r\n");

    print_r("\r\n-1 para sair do sistema\r\n");

    $opcao = (string)readline("Digite uma opcao: ");

    $escolha = 0;

    switch($opcao){

        case ++$escolha:
            print_r("Cadastramento de Clientes\r\n");
            print_r("\n\n");
            cadastra_Cliente();
            break;
            
        case ++$escolha:
            print_r("Ver Clientes\r\n");
            print_r("\n\n");
            ver_Clientes();
            break;

        case ++$escolha:
            print_r("Editar Clientes\r\n");
            print_r("\n\n");
            editar_Cliente();
            break;

        case ++$escolha:
            print_r("Comprar Passagem\r\n");
            print_r("\n\n");
            comprar_Passagem();
            break;

        case ++$escolha:
            print_r("Cancelar Passagem\r\n");
            print_r("\n\n");
            cancela_Passagem();
            break;

        case ++$escolha:
            print_r("Cadastramento de Passageiro\r\n");
            print_r("\n\n");
            cadastra_Passageiro();
            break;
                
        case ++$escolha:
            print_r("Ver Passageiros\r\n");
            print_r("\n\n");
            ver_Passageiros();
            break;
    
        case ++$escolha:
            print_r("Editar Passgeiros\r\n");
            print_r("\n\n");
            editar_Passageiro();
            break;

        case ++$escolha:
            print_r("Cadastramento de Viagens\r\n");
            print_r("\n\n");
            cadastra_Viagem();
            break;
                    
        case ++$escolha:
            print_r("Ver Viagem\r\n");
            print_r("\n\n");
            ver_Viagem();
            break;
        
        case ++$escolha:
            print_r("Editar Viagem\r\n");
            print_r("\n\n");
            altera_Viagem();
            break;
      
        case ++$escolha:
            print_r("ver Passageiros na Viagem\r\n");
            print_r("\n\n");
            mostrar_passageiros_Viagem();
            break;

        case ++$escolha:
            print_r("adicionar Passageiros na  Viagem\r\n");
            print_r("\n\n");
            adicionar_passageiros_Viagem();
            break;

        case ++$escolha:
            print_r("Fazer o Check in\r\n");
            print_r("\n\n");
            fazer_checkin();
            break;

        case ++$escolha:
            print_r("Pesquisar uma Viagem\r\n");
            print_r("\n\n");
            pesquisar_Viagem();
            break;

        case ++$escolha:
            print_r("Cadastramento de Passagem\r\n");
            print_r("\n\n");
            criar_Passagem();
            break;
                    
        case ++$escolha:
            print_r("Ver Passagens\r\n");
            print_r("\n\n");
            ver_Passagens();
            break;
        
        case ++$escolha:
            print_r("Editar Passagens\r\n");
            print_r("\n\n");
            editar_Passagem();
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