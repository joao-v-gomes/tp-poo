<?php
include_once("../libs/global.php");

class Aeroporto extends persist
{
  private string $sigla;
  private string $cidade;
  private string $estado;
  private $listaVoos = array();
  private $listaCompanhiasAereas = array();
  private $listaAeroportos = array();
  static $local_filename = "aeroporto.txt";

  public function __construct(string $sigla, string $cidade, string $estado, array $listaVoos, array $listaCompanhiasAereas, array $listaAeroportos)
  {
    $this->sigla = $sigla;
    $this->cidade = $cidade;
    $this->estado = $estado;
    $this->listaVoos = $listaVoos;
    $this->listaCompanhiasAereas = $listaCompanhiasAereas;
    $this->listaAeroportos = $listaAeroportos;
  }

  public function cadastraNovoVoo(Voo $novoVoo)
  {
    array_push($this->listaVoos, $novoVoo);
  }

  public function cadastraNovaCompanhiaAerea(CompanhiaAerea $novaCompanhiaAerea)
  {
    array_push($this->listaCompanhiasAereas, $novaCompanhiaAerea);
  }

  public function cadastraNovoAeroporto(Aeroporto $novoAeroporto)
  {
    array_push($this->listaAeroportos, $novoAeroporto);
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
