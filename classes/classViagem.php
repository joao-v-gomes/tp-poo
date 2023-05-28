<?php
include_once("../libs/global.php");

class Viagem extends persist
{
  private DateTime $horarioPartida;
  private DateTime $horarioChegada;
  private DateInterval $duracao;
  //private Aeronave $aeronave;
  private float $carga = 0;
  //declarar o array do outro jeito estava dando erro na chamada de funcao
  //private ?array $passageiros;
  //private $passageiros = array();
  private int $voo;
  private int $milhasViagem;
  private float $valorViagem;
  private float $valorFranquiaBagagem;
  private float $valorMulta;


  static $local_filename = "viagens.txt";

  public function __construct(DateTime $horarioPartida, DateTime $horarioChegada, float $carga, /*int $voo,*/ int $milhasViagem, float $valorViagem, float $valorFranquiaBagagem, float $valorMulta)
  {
    $this->setHorarioPartida($horarioPartida);
    $this->setHorarioChegada($horarioChegada);
    $this->setDuracao($horarioPartida, $horarioChegada);
    // $this->setAeronave($aeronave);
    $this->setCarga($carga);
    //$this->setVoo($voo);
    $this->setMilhasViagem($milhasViagem);
    $this->setvalorViagem($valorViagem);
    $this->setvalorFranquiaBagagem($valorFranquiaBagagem);
    $this->setValorMulta($valorMulta);
  }

  // public function getAeroportoOrigem()
  // {
  //   return $this->aeroportoOrigem;
  // }

  // public function getAeroportoDestino()
  // {
  //   return $this->aeroportoDestino;
  // }

  public function getHorarioPartida()
  {
    return $this->horarioPartida;
  }

  public function getHorarioChegada()
  {
    return $this->horarioChegada;
  }

  public function getPassageiros()
  {
    return $this->passageiros;
  }

  public function getDuracaoEstimada()
  {
    return $this->duracao;
  }

  public function getCompanhiaAerea()
  {
    return $this->companhiaAerea;
  }

  public function getAeronave()
  {
    return $this->aeronave;
  }

  public function getCarga()
  {
    return $this->carga;
  }

  public function setHorarioPartida(DateTime $horarioPartida)
  {
    $this->horarioPartida = $horarioPartida;
  }

  public function setHorarioChegada(DateTime $horarioChegada)
  {
    $this->horarioChegada = $horarioChegada;
  }

  public function setDuracao(DateTime $horarioPartida, DateTime $horarioChegada)
  {
    $this->duracao = $horarioChegada->diff($horarioPartida);
  }

  public function setCarga(float $carga)
  {
    $this->carga += $carga;
  }

  public function setVoo($voo)
  {
    $this->voo = $voo;
  }

  public function setMilhasViagem($milhasViagem)
  {
    $this->milhasViagem = $milhasViagem;
  }

  public function setvalorViagem($valorViagem)
  {
    $this->valorViagem = $valorViagem;
  }

  public function setvalorFranquiaBagagem($valorFranquiaBagagem)
  {
    $this->valorFranquiaBagagem = $valorFranquiaBagagem;
  }

  public function setValorMulta($valorMulta)
  {
    $this->valorMulta = $valorMulta;
  }
  
  public function inserirPassageiro($novaPassagem)
  {
    //qualquer tipo de verificacao deve ser feita na hora da venda (carga e assentos)
    $this->passageiros[] = $novaPassagem->getPassageiro();
    $this->setCarga($novaPassagem->getPesoTotal()); 
  }

  //***Falta testar as funcoes comentadas abaixo***

  // public function removerPassageiro($passagemRemovida)
  // {
  //   $passageiro = $passagemRemovida->getPassageiro();
  //   $cpfDoPassageiro = $passageiro->getCpf();
  //   //print_r($cpfDoPassageiro);
  //   $cpf = array_column($this->passageiros, 'cpf');
  //   $found_key = array_search($cpfDoPassageiro, $cpf);
  //   //$key = array_search($cpfDoPassageiro, $this->passageiros);
  //   if($found_key !== false)
  //   {
  //     print_r("hello4");
  //     unset($this->passageiros[$found_key]);
  //     $cargaRemovida = -($passagemRemovida->getPesoTotal());
  //     $this->setCarga($cargaRemovida);
  //   }
  //   if($found_key === false)
  //   {
  //     print_r("nn encontrado");
  //   }
  // }

  // public function fazerCheckIn ($passagem)
  // {
  //   $passagem->setStatus("Check-in realizado");
  // }

  // public function cancelamentoDePassagem($passagem)
  //   {
  //     $passagem->setStatus("Passagem cancelada");
  //     $this->removerPassageiro($passagem);
  //   }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
