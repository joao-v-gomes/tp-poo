<?php
include_once("../classCompanhiaAerea.php");

$ca = new CompanhiaAerea("teste-nome", "teste-codigo", "teste-razaoSocial", "teste-cnpj", "teste-sigla");

$ca->exibirCompanhia();

echo ("\n");

$a = new Aeronave("teste-fabricante", "teste-modelo", 14, 14.3, "teste-registro", true);

print_r($a);

echo ("\n");

$ca->exibirListaAeronaves();

echo ("\n");

$ca->cadastrarNovaAeronave($a);
$ca->exibirListaAeronaves();
