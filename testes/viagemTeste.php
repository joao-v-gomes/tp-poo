<?php
include_once('../libs/global.php');

$hp = new DateTime("now");
$hc = new DateTime("now");
$hc->setDate(2023, 05, 26);
$hc->setTime(15, 23, 15);

//$flag = 1;
// $flag = 0;

$topgun = new Aeronave("russian", "mk-dir", 500, 10000, "a123", true);

$razorCrest = new Aeronave("imperial", "m31", 300, 20000, "c321", true);

$galera = array("Milton", "Irineu", "Wesley");

$viagem1 = new Viagem($hp, $hc, 312.3, 123, 1240, 123.2, 36.4);

$cliente2 = new Cliente("Joao 2 Victor 2", "Gomes 2", "AA11111");

$Matt = new Passageiro(true, "Matheus", "Salles", "123456", "14092698097", "brasileiro", "04/07/1776", "meuemail@gmail.com");

$lista = ["CNF", "SP", "CNG"];

$velhaPassagem = new Passagem("SP", "BH", 1543.22, "C24", 1, $Matt, $cliente2, $lista, 1223);

$viagem1->inserirPassageiro($velhaPassagem);

$viagem1->removerPassageiro($velhaPassagem);

print_r($viagem1->getPassageiros());

// $viagem2 = new Viagem("João Monlevade", "Matozinhos", $hp, $hc, 75, "Gol", $topgun, $galera, 3400);

//$voandoHigh = new Voo("Confins", "Congonhas", $hp, $hc, 24, "Latam", $topgun, $galera, 4500);

//print_r($voandoHigh);

// Instanciando um novo objeto da classe voo
// if ($flag) {
//     $voo1 = new Voo("NY", "Boston", $hp, $hc, 36, "AirFrance", $topgun, $galera, 7700);
//     $voo1->save();
// }
// if ($flag) {
//     $voo2 = new Voo("João Monlevade", "Matozinhos", $hp, $hc, 75, "Gol", $topgun, $galera, 3400);
//     $voo2->save();
// }

// Carregando registros já persistidos da classe Voo
// if (!$flag) {
//     $voos = Voo::getRecords();
//     print_r($voos);
// }

// Procurando pelo voo para NY e adicionando pontos
// if ($flag) {
//     $voos = Voo::getRecordsByField('aeroportoOrigem', 'NY');
//     $aeroportoOri = $voos[0];
//     $aeroportoOri->setAeronave($razorCrest);
//     $aeroportoOri->save();
//     print_r($voos);
// }
