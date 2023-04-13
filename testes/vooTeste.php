<?php
include_once("../classVoo.php");
include_once("../classAeronave.php");

$hp = new DateTime('now');
$hc = new DateTime('now');

$topgun = new Aeronave("russian", "mk-dir", 500, 10000, "a123", true);

$galera = array("Milton", "Irineu", "Wesley");

$voandoHigh = new Voo("Confins", "Congonhas", $hp, $hc, 24, "Latam", $topgun, $galera, 4500);

print_r($voandoHigh);
