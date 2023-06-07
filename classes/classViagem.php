<?php
include_once("../libs/global.php");

class Viagem extends persist
{
  private DateTime $horarioPartida;
  private DateTime $horarioChegada;
  private DateInterval $duracao;
  //private Aeronave $aeronave;
  private float $carga = 0;
  private ?array $passageiros;
  //private $passageiros = array();
  private int $voo;
  private int $milhasViagem;
  private float $valorViagem;
  private float $valorFranquiaBagagem;
  private float $valorMulta;


  static $local_filename = "viagens.txt";

  public function __construct(DateTime $horarioPartida, DateTime $horarioChegada, int $milhasViagem, float $valorViagem, float $valorFranquiaBagagem, float $valorMulta)
  {
    $this->setHorarioPartida($horarioPartida);
    $this->setHorarioChegada($horarioChegada);
    $this->setDuracao($horarioPartida, $horarioChegada);
    // $this->setAeronave($aeronave);
    $this->setCarga(SEM_CARGA_DEFINIDA);
    //$this->setVoo($voo);
    $this->setMilhasViagem($milhasViagem);
    $this->setvalorViagem($valorViagem);
    $this->setvalorFranquiaBagagem($valorFranquiaBagagem);
    $this->setValorMulta($valorMulta);
    $this->passageiros = array();
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
    $this->carga = $carga;
  }

  public function adicionarCarga(float $carga)
  {
    $this->carga += $carga;
  }

  public function removerCarga(float $carga)
  {
    $this->carga -= $carga;
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
    array_push($this->passageiros, $novaPassagem->getPassageiro());
    $this->adicionarCarga($novaPassagem->getPesoTotal()); 
  }

  public function removerPassageiro($passagemRemovida)
  {
    $passageiro = $passagemRemovida->getPassageiro();
    $cpfDoPassageiro = $passageiro->getCpf();
    $i = 0;
    foreach($this->passageiros as $passageiro)
    {
      $i++;
      if($passageiro->getCpf() === $cpfDoPassageiro)
      {
        unset($this->passageiros[$i -1 ]);
        $cargaRemovida = ($passagemRemovida->getPesoTotal());
        $this->removerCarga($cargaRemovida);
        array_merge($this->passageiros);
        break;
      }
      else
        {
        //print_r("nao eh esse passageiro encontrado");
        }
    }
  }

  public function fazerCheckIn ($passagem)
  {
    $passagem->setStatus("Check-in realizado");
  }

  public function cancelamentoDePassagem($passagem)
    {
      $passagem->setStatus("Passagem cancelada");
      $this->removerPassageiro($passagem);
    }

  // public function compraPassagem($index)
  //   {
    
  //   }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
