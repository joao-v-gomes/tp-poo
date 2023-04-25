<?php
include_once('../libs/global.php');
// include_once("../classVoo.php");
// include_once("../classAeronave.php");

$hp = new DateTime('now');
$hc = new DateTime('now');

$flag = 1;
// $flag = 0;

$topgun = new Aeronave("russian", "mk-dir", 500, 10000, "a123", true);

$razorCrest = new Aeronave("imperial", "m31", 300, 20000, "c321", true);

$galera = array("Milton", "Irineu", "Wesley");

//$voandoHigh = new Voo("Confins", "Congonhas", $hp, $hc, 24, "Latam", $topgun, $galera, 4500);

//print_r($voandoHigh);

// Instanciando um novo objeto da classe voo
if ($flag) {
    $voo1 = new Voo("NY", "Boston", $hp, $hc, 36, "AirFrance", $topgun, $galera, 7700);;
    $voo1->save();
}
if ($flag) {
    $voo2 = new Voo("João Monlevade", "Matozinhos", $hp, $hc, 75, "Gol", $topgun, $galera, 3400);;
    $voo2->save();
}

// Carregando registros já persistidos da classe Voo
if (!$flag) {
    $voos = Voo::getRecords();
    print_r($voos);
}

// Procurando pelo voo para NY e adicionando pontos
if ($flag) {
    $voos = Voo::getRecordsByField('aeroportoOrigem', 'NY');
    $aeroportoOri = $voos[0];
    $aeroportoOri->setAeronave($razorCrest);
    $aeroportoOri->save();
    print_r($voos);
}
