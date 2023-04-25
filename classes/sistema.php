<?php

include_once("../libs/global.php");

$opcMenu = 0;

print_r("MENU\r\n");

print_r(++$opcMenu . " - Cadastrar Aeroporto\r\n");
print_r(++$opcMenu . " - Cadastrar Companhia Aerea\r\n");

$opcao = (string)readline("Digite uma opcao: ");


switch ($opcao) {
    case 1:
        print_r("Cadastramento de Aeroporto\r\n");
        break;

    case 2:
        print_r("Cadastramento de Companhia Aerea\r\n");
        break;

    default:
        print_r("Opcao errada!!\r\n");
        break;
}
