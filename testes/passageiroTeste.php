<?php
include_once("../libs/global.php");

$pass = new Passageiro(true, "João", "Gomes", "17470389", "11894138686", "Brasileiro", "04/12/1995", "joao.victor214@gmail.com");

$pass->save();

// pegar todos os passageiros
$passageiros = Passageiro::getRecords();

// exibir todos os passageiros
foreach ($passageiros as $passageiro) {
    print_r($passageiro->getNome() . " " . $passageiro->getSobrenome() . "\n");
    print_r($passageiro->getDocumentoIdentificacao() . "\n");
}
