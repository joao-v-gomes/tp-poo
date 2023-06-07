<?php

include_once("../libs/global.php");
include_once("files/sistemaAeroporto.php");
include_once("files/sistemaCompAerea.php");
include_once("files/sistemaAeronave.php");
include_once("files/sistemaVeiculo.php");
include_once("files/sistemaTripulante.php");
include_once("files/sistemaVoo.php");
include_once("files/sistemaUsuario.php");
include_once("files/sistemaLogs.php");

// define("PILOTO", 1);
// define("COMISSARIO", 2);
class Sistema
{
    function executar()
    {
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
            print_r(++$opcMenu . " - Ver Voos de um Aeroporto\r\n");

            print_r("\n--- VOOS ---\r\n");
            print_r(++$opcMenu . " - Cadastrar Voos 'Simples'\r\n");
            print_r(++$opcMenu . " - Cadastrar Voos 'Completos'\r\n");
            print_r(++$opcMenu . " - Ver Voos\r\n");
            print_r(++$opcMenu . " - Editar Voos\r\n");
            print_r(++$opcMenu . " - Adicionar uma Companiha Aerea a um Voo\r\n");

            print_r("\n--- COMPANHIAS AEREAS ---\r\n");
            print_r(++$opcMenu . " - Cadastrar Companhia Aerea\r\n");
            print_r(++$opcMenu . " - Ver Companhias Aereas\r\n");
            print_r(++$opcMenu . " - Editar Companhia Aerea\r\n");
            print_r(++$opcMenu . " - Adicionar uma Aeronave a uma Companhia Aerea\r\n");
            print_r(++$opcMenu . " - Ver Aeronaves da Comp Aerea\r\n");
            print_r(++$opcMenu . " - Adicionar um Veiculo a uma Companhia Aerea\r\n");
            print_r(++$opcMenu . " - Ver Veiculos da Comp Aerea\r\n");
            print_r(++$opcMenu . " - Ver Pilotos da Comp Aerea\r\n");
            print_r(++$opcMenu . " - Ver Comissarios da Comp Aerea\r\n");

            print_r("\n--- PROGRAMAS DE MILHAGEM ---\r\n");
            print_r(++$opcMenu . " - Cadastrar Programa de Milhagem\r\n");
            print_r(++$opcMenu . " - Ver Programas de Milhagem\r\n");
            print_r(++$opcMenu . " - Editar Programa de Milhagem\r\n");
            print_r(++$opcMenu . " - Ver Programa de Milhagem da Companiha Aerea\r\n");
            print_r(++$opcMenu . " - Cadastrar categoria no Programa de Milhagem\r\n");
            print_r(++$opcMenu . " - Ver categorias do Programa de Milhagem\r\n");
            print_r(++$opcMenu . " - Editar categoria do Programa de Milhagem\r\n");

            print_r("\n--- TRIPULANTES ---\r\n");
            print_r(++$opcMenu . " - Cadastrar Piloto\r\n");
            print_r(++$opcMenu . " - Ver Pilotos\r\n");
            print_r(++$opcMenu . " - Editar Piloto\r\n");
            print_r(++$opcMenu . " - Cadastrar Comissario\r\n");
            print_r(++$opcMenu . " - Ver Comissarios\r\n");
            print_r(++$opcMenu . " - Editar Comissario\r\n");

            print_r("\n--- USUARIOS ---\r\n");
            print_r(++$opcMenu . " - Cadastrar Usuario\r\n");
            print_r(++$opcMenu . " - Ver Usuarios\r\n");
            print_r(++$opcMenu . " - Editar Usuario\r\n");

            print_r("\n--- AERONAVES ---\r\n");
            print_r(++$opcMenu . " - Cadastrar Aeronave\r\n");
            print_r(++$opcMenu . " - Ver Aeronaves\r\n");
            print_r(++$opcMenu . " - Editar Aeronave\r\n");

            print_r("\n--- VEICULOS ---\r\n");
            print_r(++$opcMenu . " - Cadastrar Veiculo\r\n");
            print_r(++$opcMenu . " - Ver Veiculos\r\n");
            print_r(++$opcMenu . " - Editar Veiculo\r\n");


            print_r("\n--- LOGS ---\r\n");
            print_r(++$opcMenu . " - Ver Logs\r\n");

            print_r("\r\n-1 para sair do sistema\r\n");

            $opcao = (string)readline("Digite uma opcao: ");

            $opcMenu = 0;

            switch ($opcao) {

                    // #### AEROPORTOS ####
                case ++$opcMenu:
                    print_r("Cadastramento de Aeroporto\r\n");
                    print_r("\n\n");
                    SistemaAeroporto::sis_cadastrarAeroporto();
                    break;

                case ++$opcMenu:
                    print_r("Ver aeroportos\r\n");
                    print_r("\n\n");
                    SistemaAeroporto::sis_verAeroportos();
                    break;

                case ++$opcMenu:
                    print_r("Editar Aeroporto\r\n");
                    print_r("\n\n");
                    SistemaAeroporto::sis_editarAeroporto();
                    break;

                case ++$opcMenu:
                    print_r("Adicionar Comp. Aerea em Aeroporto\r\n");
                    print_r("\n\n");
                    SistemaAeroporto::sis_conectarCompanhiaAereaEmAeroporto();
                    break;

                case ++$opcMenu:
                    print_r("Ver Comp. Aerea em Aeroporto\r\n");
                    print_r("\n\n");
                    SistemaAeroporto::sis_verCompanhiasAereasEmAeroporto();
                    break;

                case ++$opcMenu:
                    print_r("Ver Voos em Aeroporto\r\n");
                    print_r("\n\n");
                    SistemaAeroporto::sis_verVoosEmAeroporto();
                    break;

                    // #### VOOS ####

                case ++$opcMenu:
                    print_r("Cadastramento de Voo Simples\r\n");
                    print_r("\n\n");
                    SistemaVoo::sis_CadastrarVooSimples();
                    break;

                case ++$opcMenu:
                    print_r("Cadastramento de Voo Completo\r\n");
                    print_r("\n\n");
                    SistemaVoo::sis_CadastrarVooCompleto();
                    break;

                case ++$opcMenu:
                    print_r("Ver Voos\r\n");
                    print_r("\n\n");
                    SistemaVoo::sis_verVoos();
                    break;

                case ++$opcMenu:
                    print_r("Editar Voo\r\n");
                    print_r("\n\n");
                    SistemaVoo::sis_editarVoo();
                    break;

                case ++$opcMenu:
                    print_r("Conexao Comp Aerea com Voo\r\n");
                    print_r("\n\n");
                    SistemaVoo::sis_conectarCompanhiaAereaEmVoo();
                    break;

                    // #### COMPANHIAS AEREAS ####

                case ++$opcMenu:
                    print_r("Cadastramento de Companhia Aerea\r\n");
                    print_r("\n\n");
                    SistemaCompAerea::sis_CadastrarCompanhiaAerea();
                    break;

                case ++$opcMenu:
                    print_r("Ver Companhia Aerea\r\n");
                    print_r("\n\n");
                    SistemaCompAerea::sis_verCompanhiasAereas();
                    break;

                case ++$opcMenu:
                    print_r("Editar Companhia Aerea\r\n");
                    print_r("\n\n");
                    SistemaCompAerea::sis_editarCompanhiaAerea();
                    break;

                case ++$opcMenu:
                    print_r("Conexao Aeronave em Companhia Aerea\r\n");
                    print_r("\n\n");
                    SistemaCompAerea::sis_conectarAeronaveEmCompanhiaAerea();
                    break;

                case ++$opcMenu:
                    print_r("Ver Aeronaves da Comp Aerea\r\n");
                    print_r("\n\n");
                    SistemaCompAerea::sis_verAeronavesDaCompanhiaAerea();
                    break;

                case ++$opcMenu:
                    print_r("Conexao Veiculo em Companhia Aerea\r\n");
                    print_r("\n\n");
                    SistemaCompAerea::sis_conectarVeiculoEmCompanhiaAerea();
                    break;

                case ++$opcMenu:
                    print_r("Ver Veiculos da Comp Aerea\r\n");
                    print_r("\n\n");
                    SistemaCompAerea::sis_verVeiculosDaCompanhiaAerea();
                    break;

                case ++$opcMenu:
                    print_r("Ver Pilotos da Comp Aerea\r\n");
                    print_r("\n\n");
                    SistemaCompAerea::sis_verPilotosDaCompanhiaAerea();
                    break;

                case ++$opcMenu:
                    print_r("Ver Comissarios da Comp Aerea\r\n");
                    print_r("\n\n");
                    SistemaCompAerea::sis_verComissariosDaCompanhiaAerea();
                    break;

                    // #### PROGRAMA MILHAGEM ####

                case ++$opcMenu:
                    print_r("Cadastrar programa de milhagem\r\n");
                    print_r("\n\n");
                    SistemaProgramaMilhagem::sis_cadastrarProgramaDeMilhagem();
                    break;

                case ++$opcMenu:
                    print_r("Ver programas de milhagem\r\n");
                    print_r("\n\n");
                    SistemaProgramaMilhagem::sis_verProgramasDeMilhagem();
                    break;

                case ++$opcMenu:
                    print_r("Editar programa de milhagem\r\n");
                    print_r("\n\n");
                    SistemaProgramaMilhagem::sis_editarProgramaDeMilhagem();
                    break;

                case ++$opcMenu:
                    print_r("Ver programa de milhagem da Comp Aerea\r\n");
                    print_r("\n\n");
                    SistemaProgramaMilhagem::sis_verProgramaDeMilhagemDaCompanhiaAerea();
                    break;

                case ++$opcMenu:
                    print_r("Cadastra categoria no programa de milhagem\r\n");
                    print_r("\n\n");
                    SistemaProgramaMilhagem::sis_cadastrarCategoriaNoProgramaDeMilhagem();
                    break;

                case ++$opcMenu:
                    print_r("Ver categorias no programa de milhagem\r\n");
                    print_r("\n\n");
                    SistemaProgramaMilhagem::sis_verCategoriasNoProgramaDeMilhagem();
                    break;

                case ++$opcMenu:
                    print_r("Editar categoria no programa de milhagem\r\n");
                    print_r("\n\n");
                    SistemaProgramaMilhagem::sis_editarCategoriaNoProgramaDeMilhagem();
                    break;

                    // #### TRIPULANTES ####

                case ++$opcMenu:
                    print_r("Cadastramento de Piloto\r\n");
                    print_r("\n\n");
                    SistemaTripulante::sis_CadastrarPiloto();
                    break;

                case ++$opcMenu:
                    print_r("Ver Pilotos\r\n");
                    print_r("\n\n");
                    SistemaTripulante::sis_verPilotos();
                    break;

                case ++$opcMenu:
                    print_r("Editar Piloto\r\n");
                    print_r("\n\n");
                    SistemaTripulante::sis_editarPiloto();
                    break;

                case ++$opcMenu:
                    print_r("Cadastramento de Comissario\r\n");
                    print_r("\n\n");
                    SistemaTripulante::sis_CadastrarComissario();
                    break;

                case ++$opcMenu:
                    print_r("Ver Comissarios\r\n");
                    print_r("\n\n");
                    SistemaTripulante::sis_verComissarios();
                    break;

                case ++$opcMenu:
                    print_r("Editar Comissario\r\n");
                    print_r("\n\n");
                    SistemaTripulante::sis_editarComissario();
                    break;

                    // #### USUARIOS ####

                case ++$opcMenu:
                    print_r("Cadastramento de Usuario\r\n");
                    print_r("\n\n");
                    SistemaUsuario::sis_CadastrarUsuario();
                    break;

                case ++$opcMenu:
                    print_r("Ver Usuarios\r\n");
                    print_r("\n\n");
                    SistemaUsuario::sis_verUsuarios();
                    break;

                case ++$opcMenu:
                    print_r("Editar Usuario\r\n");
                    print_r("\n\n");
                    SistemaUsuario::sis_editarUsuario();
                    break;

                    // #### AERONAVES ####

                case ++$opcMenu:
                    print_r("Cadastramento de Aeronave\r\n");
                    print_r("\n\n");
                    SistemaAeronave::sis_CadastrarAeronave();
                    break;

                case ++$opcMenu:
                    print_r("Ver Aeronaves\r\n");
                    print_r("\n\n");
                    SistemaAeronave::sis_verAeronaves();
                    break;

                case ++$opcMenu:
                    print_r("Editar Aeronave\r\n");
                    print_r("\n\n");
                    SistemaAeronave::sis_editarAeronave();
                    break;

                    // #### VEICULOS ####

                case ++$opcMenu:
                    print_r("Cadastramento de Veiculo\r\n");
                    print_r("\n\n");
                    SistemaVeiculo::sis_CadastrarVeiculo();
                    break;

                case ++$opcMenu:
                    print_r("Ver Veiculos\r\n");
                    print_r("\n\n");
                    SistemaVeiculo::sis_verVeiculos();
                    break;

                case ++$opcMenu:
                    print_r("Editar Veiculo\r\n");
                    print_r("\n\n");
                    SistemaVeiculo::sis_editarVeiculo();
                    break;

                    // #### LOGS ####

                case ++$opcMenu:
                    print_r("Ver Logs\r\n");
                    print_r("\n\n");
                    SistemaLogs::sis_verLogs();
                    break;

                    // #### SISTEMA ####

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
    }
}


$sistema = new Sistema();

$sistema->executar();
