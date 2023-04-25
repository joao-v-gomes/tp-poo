<?php
include_once("../libs/global.php");

class Voo extends persist
{
  private $frequencia = array();
  private DateTime $previsaoPartida;
  private DateTime $previsaoChegada;
  private float $previsaoDuracao;
  //private Viagem $viagem;
  private $listaViagens = array();
  private string $codigoVoo;

  static $local_filename = "voos.txt";


  public function __construct(array $frequencia, DateTime $previsaoPartida, DateTime $previsaoChegada, float $previsaoDuracao, array $listaViagens, string $codigoVoo)
  {
    $this->frequencia = $frequencia;
    $this->previsaoPartida = $previsaoPartida;
    $this->previsaoChegada = $previsaoChegada;
    $this->previsaoDuracao = $previsaoDuracao;
    $this->codigoVoo = $codigoVoo;
    $this->listaViagens = $listaViagens;
  }

  public function alteraViagem(Viagem $novaViagem)
  {
    // conferir depois as verificacoes para a troca de voo
    //$this->voo = $novoVoo;
  }

  public function validaCodigoVoo()
  {
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
