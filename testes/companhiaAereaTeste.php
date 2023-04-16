<?php
include_once('../libs/global.php');

// Instanciando um novo objeto da classe companhia aerea
// if(0){
    $ca1 = new CompanhiaAerea("teste-nome1", "teste-codigo1", "teste-razaoSocial", "teste-cnpj1", "teste-sigla1");
    $ca1->save();
// }
// if(0){
    $ca2 = new CompanhiaAerea("teste-nome2", "teste-codigo2", "teste-razaoSocial2", "teste-cnpj2", "teste-sigla2");
    $ca2->save();
// }

// Instanciando um novo objeto da classe aeronave
$a = new Aeronave("teste-fabricante", "teste-modelo", 14, 14.3, "teste-registro", true);
$a->save();

// Carregando registros já persistidos da classe aeroporto
// if(0){
    $companhiasAerea = CompanhiaAerea::getRecords();
// }
// print_r($ca1);
// print_r($a);

// $ca->cadastrarNovaAeronave($a);

// $ca->exibirListaAeronaves();

// echo ("\n");

$ca1->cadastrarNovaAeronave($a);
print_r($ca1);
print_r($a);
$ca1->exibirListaAeronaves();