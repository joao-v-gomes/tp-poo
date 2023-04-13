<?php
include_once("../classLinha.php");

$conjunto = array(15, 14, 12);

$pp = new DateTime('now');
$pc = new DateTime('now');

$hp = new DateTime('now');
$hc = new DateTime('now');

$topgun = new Aeronave("russian", "mk-dir", 500, 10000, "a123", true);

$galera = array("Milton", "Irineu", "Wesley");

$voandoHigh = new Voo("Confins", "Congonhas", $hp, $hc, 24, "Latam", $topgun, $galera, 4500);

$linhaBrazuca = new Linha($conjunto, $pp, $pc, 300, $voandoHigh);

print_r($linhaBrazuca);
