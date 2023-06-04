<?php

use Random\Engine;

include_once("../libs/global.php");

class Aeroporto extends persist
{
  private string $sigla;
  // private string $cidade;
  // private string $estado;
  private Endereco $endereco;

  // private array $listaVoos;
  private ?array $listaCompanhiasAereas;

  static $local_filename = "aeroportos.txt";

  public function __construct(string $sigla, Endereco $endereco)
  {
    $this->setSigla($sigla);
    $this->setEndereco($endereco);
    // $this->setCidade($cidade);
    // $this->setEstado($estado);

    // Quais serao os aeroportos dessa lista? Todos? Só os que temos voos?
    // - Se for todos, acho merda pq vamos precisar ficar atualizando sempre que um novo aeroporto for criado
    // - Se for só os que temos voos, já temos essa lista nos voos
    //
    // Fiquei pensando depois se Aeroporto precisa dessa lista.
    // Pensei em deixar essa lista na "classeSistema", que seria a "main" e que chamaria todas as outras.
    // $this->listaAeroportos = $listaAeroportos;
    // $this->listaVoos = array();
    $this->listaCompanhiasAereas = array();
    // $this->setListaCompanihasAereas(SEM_COMPANHIA_AEREA_DEFINIDA);
  }

  public function alterarAeroporto(Aeroporto $novoAeroporto)
  {
    $this->setSigla($novoAeroporto->getSigla());
    $this->setEndereco($novoAeroporto->getEndereco());
    // $this->setCidade($novoAeroporto->getCidade());
    // $this->setEstado($novoAeroporto->getEstado());
    $this->setListaCompanihasAereas($novoAeroporto->getListaCompanhiasAereas());
  }

  public function getSigla()
  {
    return $this->sigla;
  }

  public function getEndereco()
  {
    return $this->endereco;
  }
  // public function getCidade()
  // {
  //   return $this->cidade;
  // }

  // public function getEstado()
  // {
  //   return $this->estado;
  // }

  public function setSigla(string $sigla)
  {
    $this->sigla = $sigla;
  }

  public function setEndereco(Endereco $endereco)
  {
    $this->endereco = $endereco;
  }
  // public function setCidade(string $cidade)
  // {
  //   $this->cidade = $cidade;
  // }

  // public function setEstado(string $estado)
  // {
  //   $this->estado = $estado;
  // }

  public function setListaCompanihasAereas(?array $listaCompanhiasAereas)
  {
    $this->listaCompanhiasAereas = $listaCompanhiasAereas;
  }

  // não usamos essas funcoes devido ao persist
  // public function cadastraNovoVoo(Voo $novoVoo)
  // {
  //   array_push($this->listaVoos, $novoVoo);
  // }

  public function cadastraNovaCompanhiaAerea(int $indexCompAerea)
  {
    array_push($this->listaCompanhiasAereas, $indexCompAerea);
  }

  public function getListaCompanhiasAereas()
  {
    return $this->listaCompanhiasAereas;
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
