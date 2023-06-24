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
  
    if (count($viagens) == 0) {
        print_r("Nenhuma viagem cadastraao!\r\n");
        print_r("\n\n");
        return;
    } 

    mostra_viagem($viagens);
    $indexviagem = (int)readline("digite o index de uma viagem: ");
    $viagem = $viagens[$indexviagem - 1];
    $listaViagens = array();
    array_push($listaViagens,$indexviagem);


    $clientes = Cliente::getRecords();
    if (count($clientes) == 0) {
        print_r("Nenhum cliente cadastrado!\r\n");
        print_r("\n\n");
        return;
    } 

    mostra_Clientes($clientes);
    $indexcliente = (int)readline("digite o index de um cliente: ");
    $cliente = $clientes[$indexcliente - 1];


    $passageiros = Passageiro::getRecords();
    if (count($passageiros) == 0) {
        print_r("Nenhum passageiro cadastrado!\r\n");
        print_r("\n\n");
        return;
    } 

    mostra_Passageiros($passageiros);
    $index = (int)readline("digite o index de um passgeiro: ");
    $passageiro = $passageiros[$index - 1];

    $voos = Voo::getRecords();
    $indexvoo = $viagem->getVoo();
    $voo = $voos[$indexvoo - 1];
  
    $aeroportos = Aeroporto::getRecords();  
    $indexaeroOrigem = $voo->getAeroportoOrigem();
    $aeroportoOrigem = $aeroportos[$indexaeroOrigem - 1];

    $indexaeroDestino = $voo->getAeroportoDestino();
    $aeroportoDestino = $aeroportos[$indexaeroDestino - 1];

    $franquiasBagagem = (int)readline("quantas franquias vc quer(limite 3): ");
    $assento = (string)readline("digite um assento(numero): ");

    $passagem = new Passagem($aeroportoOrigem->getSigla(),$aeroportoDestino->getSigla(),$viagem->getvalorViagem(),$assento,$franquiasBagagem,$passageiro,$cliente,$listaViagens,$viagem->getValorMulta());

    $passagem->save();
  
    print_r("passagem adquirida com sucesso!");
    print_r("\n\n");
  
}

function cancela_Passagem(){

    $clientes = Cliente::getRecords();
    if (count($clientes) == 0) {
        print_r("Nenhum cliente cadastrado!\r\n");
        print_r("\n\n");
        return;
    } 

    mostra_Clientes($clientes);
    $indexcliente = (int)readline("digite o index de um cliente: ");
    $cliente = $clientes[$indexcliente - 1];
  
    $passagens = Passagem::getRecords();
    foreach($passagens as $passagem){
      $clientepassagem = $passagem->getCliente();
      if($clientepassagem->getRg() == $cliente->getRg() || $clientepassagem->getPassaporte() == $cliente->getPassaporte()){
        $passagemCliente = $passagem;
      }
    }

    $viagens = Viagem::getRecords();
    $indexs = $passagemCliente->getlistaViagensEConexoes();

    $viagem = $viagens[$indexs[0] - 1];

    $viagem->removerPassageiro($passagemCliente);
    print_r("Passageiro Removido");
    print_r("\n\n");
    $viagem->save();

    $status = "Passagem Cancelada";
    $passagemCliente->setStatus($status);
    $passagemCliente->save();

}
