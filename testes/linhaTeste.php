<?php
include_once("../libs/global.php");

// Instanciando um novo objeto da classe linhas
if(1){
  $conjunto = array(15, 14, 12);
  
  $pp = new DateTime('now');
  $pc = new DateTime('now');
  
  $hp = new DateTime('now');
  $hc = new DateTime('now');
  
  $topgun = new Aeronave("russian", "mk-dir", 500, 10000, "a123", true);
  
  $galera = array("Milton", "Irineu", "Wesley");
  
  $voandoHigh = new Voo("Confins", "Congonhas", $hp, $hc, 24, "Latam", $topgun, $galera, 4500);
  
  $linhaBrazuca = new Linha($conjunto, $pp, $pc, 300, $voandoHigh);
  
  $linhaBrazuca->save();
}

if(1){
  $conj = array(12,23,16);
  $partlinha = new DateTime('now');
  $cheglinha = new DateTime('now');
  
  $horapart = new DateTime('now');
  $horacheg = new DateTime('now');

  $top = new Aeronave("brazilian", "Ak-bre", 550, 15000, "b321", true);
  $rap = array("carlos", "bruno", "Weley");

  $voando = new Voo("Confins", "Congonhas", $horapart, $horacheg, 24, "Latam", $top, $rap, 4900);
  $linhaBraz = new Linha($conj, $partlinha ,$cheglinha, 300, $voando);

  $linhaBraz->save();
}

// Carregando registros já persistidos da classe linhas
if(1){
  $linhas = linha::getRecords();
  print_r($linhas);
}

if(1){
  $linhas = linha::getRecordsByField( 'companhiaAerea', 'latam' );
}

