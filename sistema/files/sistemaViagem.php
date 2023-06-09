<?php

include_once("../libs/global.php");
include_once("sistemaVoo.php");
include_once("sistemaPassageiro.php");
include_once("sistemaPassagem.php");
class SistemaViagem {
  
  static function function cadastra_Viagem(){
    
    $voos = Voo::getRecords();
    SistemaVoo::mostraVoos($voos);
    $index = (int)readline("Digite o index do voo: ");
  
    $voo = $voos[$index - 1];
  
    $horarioPartida = $voo->getPrevisaoPartida();
    $horarioChegada = (string)readline("qual o horario da de chegada: ");
    $horarioChegada = DateTime::createFromFormat("H:i", $horarioChegada);
  
    $carga = (float)readline("digite o valor da carga: ");
    $milhasViagem = (int)readline("digite o valor das milhas: ");
    $valorViagem = (float)readline("digite o valor da viagem: ");
    $valorFranquiaBagagem = (float)readline("digite o valor da franquia: ");
    $valorMulta = (float)readline("digite o valor da multa: ");
  
    $viagem = new Viagem($horarioPartida, $horarioChegada, $carga, $milhasViagem, $valorViagem, $valorFranquiaBagagem, $valorMulta);
    $viagem->setVoo($index);
  
    $viagem->save();
  }
  
  static function function mostra_Viagem(array $viagens)
  {
    print_r("Viagens cadastradas:\r\n");
    print_r("Index - Voo -  Aeroporto Origem - Aeroporto Destino - Comp Aerea - Horario Partida - Horario Chegada - Valor da Viagem - Valor da franquia\r\n");
    $voos = Voo::getRecords();
    foreach ($viagens as $viagem) {
      $voo = $voos[$viagem->getVoo() - 1];
  
      if ($voo->getCompanhiaAerea() == null) {
        $compAereaVoo = "null";
      } else {
        $compAereaVoo = $voo->getCompanhiaAerea();
      }
  
      print_r($viagem->getIndex() . " - " . $viagem->getVoo() . " - " . $voo->getAeroportoOrigem() . " - " . $voo->getAeroportoDestino() . " - " . $compAereaVoo . " - " . $viagem->getValorviagem() . " - " . $viagem->getValorFranquiaBagagem() . "\r\n");
    }
  }
  
  static function function ver_Viagem()
  {
    $viagens = Viagem::getRecords();
  
    if (count($viagens) == 0) {
      print_r("Nenhuma viagem cadastrada!\r\n");
      print_r("\n\n");
      return;
    }
  
    SistemaViagem::mostra_Viagem($viagens);
  
    print_r("\n\n");
  }
  
  static function function altera_Viagem()
  {
    $viagens = Viagem::getRecords();
  
    if (count($viagens) == 0) {
      print_r("Nenhuma viagem cadastrada!\r\n");
      print_r("\n\n");
      return;
    }
  
    SistemaViagem::mostra_Viagem($viagens);
  
    $indexviagem = (int)readline("Digite o index da viagem: ");
  
    $viagem = $viagens[$indexviagem - 1];
  
    $voos = Voo::getRecords();
  
    SistemaVoo::mostraVoos($voos);
  
    $indexvoo = (int)readline("Digite o index do voo: ");
  
    $voo = $voos[$indexvoo - 1];
  
    $horarioPartida = $voo->getPrevisaoPartida();
    $horarioChegada =  (string)readline("qual o horario da chegada: ");
    $horarioChegada = DateTime::createFromFormat("H:i", $horarioChegada);
  
    $carga = (float)readline("digite o valor da carga: ");
    $milhasViagem = (int)readline("digite o valor das milhas: ");
    $valorViagem = (float)readline("digite o valor da viagem: ");
    $valorFranquiaBagagem = (float)readline("digite o valor da franquia:");
    $valorMulta = (float)readline("digite o valor da multa: ");
  
    $viagemnova = new Viagem($horarioPartida, $horarioChegada, $carga, $indexvoo, $milhasViagem, $valorViagem, $valorFranquiaBagagem, $valorMulta);
  
    $viagem->alteracaoViagem($viagemnova);
    $viagem->save();
  }
  
  static function function mostrar_passageiros_Viagem()
  {
    $viagens = Viagem::getRecords();
  
    if (count($viagens) == 0) {
      print_r("Nenhuma viagem cadastrada!\r\n");
      print_r("\n\n");
      return;
    }
  
    SistemaViagem::mostra_Viagem($viagens);
  
    $index = (int)readline("Digite o index da viagem: ");
    $viagem = $viagens[$index - 1];
  
    $passageirosViagem = array();
    $passageirosViagem = $viagem->getPassageiros();
    print_r("\n\n");
  
    mostra_Passageiros($passageirosViagem);
  }
  
  static function function adicionar_passageiros_Viagem()
  {
    $viagens = Viagem::getRecords();
  
    if (count($viagens) == 0) {
      print_r("Nenhuma viagem cadastrada!\r\n");
      print_r("\n\n");
      return;
    }
  
    SistemaViagem::mostra_Viagem($viagens);
  
    $index = (int)readline("Digite o index da viagem: ");
  
    $viagem = $viagens[$index - 1];
    print_r("\n\n");
  
    $passagens = Passagem::getRecords();
  
    if (count($passagens) == 0) {
      print_r("Nenhuma passagem cadastrada!\r\n");
      print_r("\n\n");
      return;
    }
    
    $passagens2 = array();
    foreach($passagens as $pass){
      if($pass->getStatus() != "Check-in realizado" && $pass->getStatus() != "Passagem Cancelada"){
        array_push($passagens2,$pass);
      }
    }
    
    if(count($passagens2) == 0) {
        print_r("Nenhuma Passagem cadastrada!\r\n");
        print_r("\n\n");
        return;
    } 
    mostrar_Passagens($passagens2);
  
    $index = (int)readline("Digite a posição da Passagem: ");
  
    $passagem = $passagens2[$index - 1];
    $indexpassagem = $passagem->getlistaViagensEConexoes();
  
    if ($indexpassagem[0] == $viagem->getIndex()) {
  
      $viagem->inserirPassageiro($passagem);
      $viagem->save();
      print_r("passageiro adicionado!!!");
      print_r("\n\n");
    } else {
      print_r("deu ruim!!!");
    }
    //verificar caso um certo passageiro ja tenha sido adicionado
  }
  
  static function function fazer_checkin()
  {
    $viagens = Viagem::getRecords();
  
    if (count($viagens) == 0) {
      print_r("Nenhuma viagem cadastrada!\r\n");
      print_r("\n\n");
      return;
    }
  
    SistemaViagem::mostra_Viagem($viagens);
  
    $index = (int)readline("Digite o index da viagem: ");
  
    $viagem = $viagens[$index - 1];
  
    $passagens = Passagem::getRecords();
  
    if (count($passagens) == 0) {
      print_r("Nenhuma passagem cadastrada!\r\n");
      print_r("\n\n");
      return;
    }
  
    mostrar_Passagens($passagens);
  
    $index = (int)readline("Digite o index da Passagem: ");
  
    $passagem = $passagens[$index - 1];
    $indexpassagem = $passagem->getlistaViagensEConexoes();
    if ($indexpassagem[0] ==  $viagem->getIndex()) {
      $passageiro = $passagem->getPassageiro();
      $indexvoo = $viagem->getVoo();
      $voos = Voo::getRecords();
      $voo = $voos[$indexvoo - 1];
      
      $cartao = new Cartaoembarque($passageiro->getNome(), $passageiro->getSobrenome(), $voo->getAeroportoOrigem(), $voo->getAeroportoDestino(), $voo->getPrevisaoPartida(), $viagem->getHorarioPartida(), $passagem->getAssento());
  
      $status = "Check-in realizado";
      $passagem->setStatus($status);
      print_r("o check_in foi realizado!");
      print_r("\n\n");
      $passagem->save();
  
      
  
    }
    //vai passar uma passagem
    //conferir se esta na viagem
    //se estiver gerar o cartão de embarque
    //contabilizar as milhas
    //mudar o status da passagem
  }
  
  static function function pesquisar_Viagem()
  {
    
    $aeroOrigem = (string)readline("qual a sigla do aeroporto de origem: ");
    $aeroDestino = (string)readline("qual a sigla do aeroporto de destino: ");
    $dataViagem = (string)readline("qual a data da viagem: ");
    $dataViagem = DateTime::createFromFormat("H:i", $dataViagem);
    $quantpassa = (int)readline("quantos passageiros tera na viagem: ");
    $aeroportos = Aeroporto::getRecords();
    foreach ($aeroportos as $aeroporto) {
      if ($aeroporto->getSigla() == $aeroOrigem) {
        $origem = $aeroporto;
      }
    }
    if($origem == null){
      print_r("não encontramos uma viagem com essa origem");
      return;
    }
  
    $companhiasaereas = $origem->getCompanhiasAereas();
    foreach ($companhiasaereas as $companhia) {
      $viagens = $companhia->getviagens();
      foreach ($viagens as $viagem) {
        $voo = $viagem->getVoo();
        if ($voo->getAeroportoDestino() == $aerodestino) {
          $viagensdest = array();
          array_push($viagensdest, $viagem);
        }
      }
    }
    foreach ($viagensdest as $viagem) {
      if ($viagem->getHorarioPartida() == $dataviagem) {
        $viagenshora = array();
        array_push($viagenshora, $viagem);
      }
    }
    SistemaViagem::mostra_Viagem($viagenshora);
  }
}
