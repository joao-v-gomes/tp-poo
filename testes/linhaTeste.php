<?php
include_once("../classLinha.php");

$conjunto = array(15, 14, 12);

$pp = new DateTime('now');
$pc = new DateTime('now');

$linhaBrazuca = new Linha($conjunto, $pp, $pc, 300);

print_r($linhaBrazuca);
?>

<!-- array $frequencia, DateTime $previsaoPartida, DateTime $previsaoChegada, float $previsaoDuracao, Voo $voo -->