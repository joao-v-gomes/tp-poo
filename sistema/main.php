<?php 

include_once("../libs/global.php");
include_once("files/sistemaAeroporto.php");
include_once("files/sistemaCompAerea.php");
include_once("files/sistemaAeronave.php");


//SistemaAeronave::cadastrarAeronave();
//SistemaCompAerea::sis_verCompanhiasAereas();
//SistemaCompAerea::sis_CadastrarCompanhiaAerea();
//SistemaCompAerea::sis_CadastrarCompanhiaAerea();
//SistemaCompAerea::sis_verCompanhiasAereas();

//CADASTRO DE COMPANHIAS AEREAS

$latam = new CompanhiaAerea("Latam","001","Latam Airlines do Brasil S.A","CNPJ","LA");
$Azul = new CompanhiaAerea("Azul","002","Azul Linhas Aéreas Brasileiras S.A.","CNPJ","AD");

$latam->save();
$Azul->save();

SistemaCompAerea::sis_verCompanhiasAereas();

//CADASTRO DE AERONAVES

try
{
  $aero1 = new Aeronave("Embraer","175",180,600,"PX-RUZ",True,$latam->getIndex());
  $aero1->save();
}catch(Exception $e)
{
  print_r("Erro ao criar aeronave: " . $e->getMessage() . "\n");
}

try{
  $aero2 = new Aeronave("Embraer","175",180,600,"PP-RUZ",True,$Azul->getIndex());
}catch (Exception $e) {
			print_r("Erro ao criar aeronave: " . $e->getMessage() . "\n");
}
$aero2->save();

SistemaAeronave::sis_verAeronaves();

//CADASTRO DE AEROPORTOS

$end1 = new Endereco("Rodovia LMG 800","KM 7.9","N/A","33500-900","Confins","MG");
$end2 = new Endereco("Rod. Hélio Smidt","s/num","N/A","07190-972","Guaralhos","SP");
$end3 = new Endereco("Av.washington luis","s/num","N/A","04626-911","Vila Congonhas","SP");
$end4 = new Endereco("Av.Vinte de Janeiro","s/num","N/A","21941-570","Galeão","RJ");
$end5 = new Endereco("Av.Rocha Pombo","2730","N/A","83010-900","São José dos Pinhais","PR");
//por enquanto desligar a funçao no endereco

$aeroporto1 = new Aeroporto("CNF",$end1);
$aeroporto1->save();
$aeroporto2 = new Aeroporto("GRU",$end2);
$aeroporto2->save();
$aeroporto3 = new Aeroporto("CGH",$end3);
$aeroporto3->save();
$aeroporto4 = new Aeroporto("GIG",$end4);
$aeroporto4->save();
$aeroporto5 = new Aeroporto("CWB",$end5);
$aeroporto5->save();

SistemaAeroporto::sis_verAeroportos();

//CADASTRO DE VOO

//static function criarVooCompleto(array $frequencia, int $aeroportoOrigem, int $aeroportoDestino, DateTime $previsaoPartida, ?int $companhiaAerea,  ?Aeronave $aeronave, ?int $piloto, ?int $copiloto, ?array $comissarios, ?string $codigoVoo)

$frequenciaVooIda1 = array("1","2","3","4","5","6","7");
$horario = "09:00";
$horario = DateTime::createFromFormat("H:i", $horario);

$horariotarde = "16:00";
$horariotarde = DateTime::createFromFormat("H:i", $horariotarde);

$vooida1 = new Voo($frequencia,$aeroporto3->getIndex(),$aeroporto5->getIndex(),$horario);
$vooida1->save();

$Azul->cadastrarViagem($vooida1,150,450.87,34.67,128.56,"11:00");

$voovolta1 = new Voo($frequencia,$aeroporto5->getIndex(),$aeroporto3->getIndex(),$horariotarde);
$voovolta1->save();

$Azul->cadastrarViagem($voovolta1,150,450.87,34.67,128.56,"18:00");

$cliente = new Cliente("prof","depoo","1234");


$piloto = new Tripulante(1,"carlos","alberto","12345","","Brasileiro","carlao13@gmail.com","","",$Azul->getIndex(),$aeroporto3->getIndex());

$copiloto = new Tripulante(1,"andre","andrade","54321","","Brasileiro","andrezin@gmail.com","","",$Azul->getIndex(),$aeroporto3->getIndex());

$comissario1 = new Tripulante(2,"andreia","dradio","34215","","russa","andreleia@gmail.com","","",$Azul->getIndex(),$aeroporto3->getIndex());