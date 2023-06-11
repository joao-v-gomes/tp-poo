<?php

include_once("../libs/global.php");

function cadastra_Cliente(){
    $nome = (string)readline("Digite um nome: ");
    $sobrenome = (string)readline("Digite um sobrenome: ");
    $documentoIdentifi = (string)readline("Digite um documento: ");

    $cliente = new Cliente($nome,$sobrenome,$documentoIdentifi);

    $cliente->save();

    print_r("Cliente cadastrado com sucesso!\r\n");

    print_r("\n\n");
}

function ver_Clientes(){
    $clientes = Cliente::getRecords();

    if (count($clientes) == 0) {
        print_r("Nenhum cliente cadastrado!\r\n");
        print_r("\n\n");
        return;
    } else {

        mostra_Clientes($clientes);

        print_r("\n\n");
    }
}

function mostra_Clientes(array $clientes){
    print_r("Clientes cadastrados:\r\n");
    print_r("Index - Nome - Sobrenome - RG - Passaporte\r\n");

    foreach($clientes as $cliente){
        if($cliente->getRg() == null){
            $rg = "null";
        }
        else{
            $rg = $cliente->getRg();
        }

        if($cliente->getPassaporte() == null){
            $pass = "null";
        }
        else{
            $pass = $cliente->getPassaporte();
        }

        print_r($cliente->getIndex() . "-" . $cliente->getNome() . "-" . $cliente->getSobrenome() . "-" . $rg . "-" . $pass . "\r\n");
    }
}

function editar_cliente(){
    $clientes = Cliente::getRecords();

    if (count($clientes) == 0) {
        print_r("Nenhum cliente cadastrado!\r\n");
        print_r("\n\n");
        return;
    } 

    mostra_Clientes($clientes);

    $index = (int)readline("digite o index de um cliente");

    $cliente = $clientes[$index - 1];

    $nome = (string)readline("Digite um nome: ");
    $sobrenome = (string)readline("Digite um sobrenome: ");
    $documentoIdentifi = (string)readline("Digite um documento: ");

    $clientenovo = new Cliente($nome,$sobrenome,$documentoIdentifi);

    $cliente->alterarCliente($clientenovo);

    $cliente->save();
}

function comprar_Passagem(){
    $viagens = Viagem::getRecords();
    if (count($clientes) == 0) {
        print_r("Nenhuma viagem cadastraao!\r\n");
        print_r("\n\n");
        return;
    } 

    mostra_viagem($viagens);
    $indexviagem = (int)readline("digite o index de uma viagem: ");
    $viagem = $viagens[$indexviagem - 1];


    $clientes = Cliente::getRecords();
    if (count($clientes) == 0) {
        print_r("Nenhum cliente cadastrado!\r\n");
        print_r("\n\n");
        return;
    } 

    mostra_Clientes($clientes);
    $indexcliente = (int)readline("digite o index de um cliente");
    $cliente = $clientes[$indexcliente - 1];


    $passageiros = Passageiro::getRecords();
    if (count($passageiros) == 0) {
        print_r("Nenhum passageiro cadastrado!\r\n");
        print_r("\n\n");
        return;
    } 

    mostra_Passageiros($passageiros);
    $index = (int)readline("digite o index de um passgeiro");
    $passageiro = $passageiros[$index - 1];


    $voo = $viagem->getVoo();
    $indexaeroOrigem = $voo->getAeroportoOrigem();
    $aeroportos = Aeroporto::getRecords();
    $aeroportoOrigem = $aeroportos[$indexaeroOrigem - 1];

    $indexaeroDestino = $voo->getAeroportoDestino();
    $aeroportoDestino = $aeroportos[$indexaeroDestino - 1];

    $passagem = new Passagem($aeroportoOrigem->getSigla(),$aeroportoDestino->getSigla(),$viagem->getPreco(),);
  
}
