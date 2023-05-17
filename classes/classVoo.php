<?php
include_once("../libs/global.php");

class Voo extends persist
{
  private array $frequencia;
  private  string $aeroportoOrigem;
  private string $aeroportoDestino;
  private Aeronave $aeronave;
  private int $piloto;
  private int $copiloto;
  private array $listaComissarios;
  private DateTime $previsaoPartida;
  private DateTime $previsaoChegada;
  private DateInterval $previsaoDuracao;
  private string $codigoVoo;
  // private Viagem $viagem;

  // private array $listaViagens;

  static $local_filename = "voos.txt";


  public function __construct(array $frequencia, string $aeroportoOrigem, string $aeroportoDestino, Aeronave $aeronave, int $piloto, int $copiloto, array $listaComissarios,  DateTime $previsaoPartida, DateTime $previsaoChegada, string $codigoVoo)
  {
    $this->setFrequencia($frequencia);
    $this->setAeroportoOrigem($aeroportoOrigem);
    $this->setAeroportoDestino($aeroportoDestino);
    $this->setAeronave($aeronave);
    $this->setPiloto($piloto);
    $this->setCopiloto($copiloto);
    $this->setListaComissarios($listaComissarios);
    $this->setPrevisaoPartida($previsaoPartida);
    $this->setPrevisaoChegada($previsaoChegada);
    $this->setPrevisaoDuracao($previsaoPartida, $previsaoPartida);
    $this->setCodigoVoo($codigoVoo);

    // $this->listaViagens = $listaViagens;
  }

  public function getFrequencia()
  {
    return $this->frequencia;
  }

  public function getAeroportoOrigem()
  {
    return $this->aeroportoOrigem;
  }

  public function getAeroportoDestino()
  {
    return $this->aeroportoDestino;
  }

  public function getAeronave()
  {
    return $this->aeronave;
  }

  public function getPiloto()
  {
    return $this->piloto;
  }

  public function getCopiloto()
  {
    return $this->copiloto;
  }

  public function getListaComissarios()
  {
    return $this->listaComissarios;
  }

  public function getPrevisaoPartida()
  {
    return $this->previsaoPartida;
  }

  public function getPrevisaoChegada()
  {
    return $this->previsaoChegada;
  }

  public function getPrevisaoDuracao()
  {
    return $this->previsaoDuracao;
  }

  public function getCodigoVoo()
  {
    return $this->codigoVoo;
  }

  // public function getViagem()
  // {
  //   return $this->viagem;
  // }

  public function setFrequencia(array $frequencia)
  {
    $this->frequencia = $frequencia;
  }

  public function setAeroportoOrigem(string $aeroportoOrigem)
  {
    $this->aeroportoOrigem = $aeroportoOrigem;
  }

  public function setAeroportoDestino(string $aeroportoDestino)
  {
    $this->aeroportoDestino = $aeroportoDestino;
  }

  public function setAeronave(Aeronave $aeronave)
  {
    $this->aeronave = $aeronave;
  }

  public function setPiloto(int $piloto)
  {
    $this->piloto = $piloto;
  }

  public function setCopiloto(int $copiloto)
  {
    $this->copiloto = $copiloto;
  }

  public function setListaComissarios(array $listaComissarios)
  {
    $this->listaComissarios = $listaComissarios;
  }

  public function addListaComissarios(Comissario $comissario)
  {
    // $this->listaComissarios[] = $comissario;
    array_push($this->listaComissarios, $comissario);
  }

  public function setPrevisaoPartida(DateTime $previsaoPartida)
  {
    $this->previsaoPartida = $previsaoPartida;
  }

  public function setPrevisaoChegada(DateTime $previsaoChegada)
  {
    $this->previsaoChegada = $previsaoChegada;
  }

  public function setPrevisaoDuracao(DateTime $previsaoChegada, DateTime $previsaoPartida)
  {
    $this->previsaoDuracao = $previsaoChegada->diff($previsaoPartida);
  }

  public function setCodigoVoo(string $codigoVoo)
  {
    $this->codigoVoo = $codigoVoo;
  }

  // public function setViagem(Viagem $viagem)
  // {
  //   $this->viagem = $viagem;
  // }

  // public function alteraViagem(Viagem $novaViagem)
  // {
  //   // conferir depois as verificacoes para a troca de viagem
  //   $this->viagem = $novaViagem;
  // }

  public function validaCodigoVoo()
  {
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
