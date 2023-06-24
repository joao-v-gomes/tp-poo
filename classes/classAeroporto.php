<?php

include_once("../libs/global.php");

class Aeroporto extends Subject
{
  private string $sigla = "";
  private ?Endereco $endereco = null;

  private ?array $listaCompanhiasAereas;

  static $local_filename = "aeroportos.txt";

  public function __construct(string $sigla, Endereco $endereco)
  {
    $this->attach(new LogFactory());

    $this->setSigla($sigla);
    $this->setEndereco($endereco);

    $this->listaCompanhiasAereas = array();

    $this->notificaCriacaoNovaInstancia($this);
  }

  public function alterarAeroporto(Aeroporto $novoAeroporto)
  {
    $this->setSigla($novoAeroporto->getSigla());
    $this->setEndereco($novoAeroporto->getEndereco());
    $this->setListaCompanihasAereas($novoAeroporto->getListaCompanhiasAereasArray());
  }

  public function getSigla()
  {
    $this->notificaVisualizacaoAtributo($this, "sigla", $this->sigla);

    return $this->sigla;
  }

  public function getEndereco()
  {
    $this->notificaVisualizacaoAtributo($this, "endereco", $this->endereco);

    return $this->endereco;
  }

  public function setSigla(string $newSigla)
  {

    $oldSigla = $this->sigla;
    $this->sigla = $newSigla;

    $this->notificaAlteracaoAtributo($this, "sigla", serialize($oldSigla), serialize($newSigla));
    // $this->notificaAlteracaoAtributo($this, "sigla", $oldSigla, $newSigla);
  }

  public function setEndereco(Endereco $newEndereco)
  {
    $oldEndereco = $this->endereco;

    if ($oldEndereco == null) {
      $oldEndereco = new Endereco("", "", "", "", "", "");
    }

    $this->endereco = $newEndereco;

    $this->notificaAlteracaoAtributo($this, "endereco", serialize($oldEndereco), serialize($newEndereco));
    // $this->notificaAlteracaoAtributo($this, "endereco", $oldEndereco->getEndCompleto(), $newEndereco->getEndCompleto());
  }

  public function setListaCompanihasAereas(?array $listaCompanhiasAereas)
  {
    $oldListaCompanhiasAereas = $this->listaCompanhiasAereas;

    if ($oldListaCompanhiasAereas == null) {
      $oldListaCompanhiasAereas = array();
    }

    $this->listaCompanhiasAereas = $listaCompanhiasAereas;

    $this->notificaAlteracaoAtributo($this, "listaCompanhiasAereas", serialize($oldListaCompanhiasAereas), serialize($listaCompanhiasAereas));
  }

  public function cadastraNovaCompanhiaAerea(int $indexCompAerea)
  {

    $oldListaCompanhiasAereas = $this->listaCompanhiasAereas;

    if ($oldListaCompanhiasAereas == null) {
      $oldListaCompanhiasAereas = array();
    }

    array_push($this->listaCompanhiasAereas, $indexCompAerea);

    $this->notificaAlteracaoAtributo($this, "listaCompanhiasAereas", serialize($oldListaCompanhiasAereas), serialize($this->listaCompanhiasAereas));
  }

  public function getListaCompanhiasAereasArray()
  {
    $this->notificaVisualizacaoAtributo($this, "listaCompanhiasAereas", $this->listaCompanhiasAereas);

    return $this->listaCompanhiasAereas;
  }

  public function getListaCompanhiasAereasString()
  {
    $listaCompanhiasAereasString = "";

    $tamanhoArrayFreq = count($this->listaCompanhiasAereas);

    $i = 0;

    foreach ($this->listaCompanhiasAereas as $indexCompAerea) {
      $i++;

      $listaCompanhiasAereasString .= $indexCompAerea;

      if ($i < $tamanhoArrayFreq) {
        $listaCompanhiasAereasString .= ",";
      }
    }

    $this->notificaVisualizacaoAtributo($this, "listaCompanhiasAereas", $listaCompanhiasAereasString);

    return $listaCompanhiasAereasString;
  }

  // static public function getFilename()
  // {
  //   return get_called_class()::$local_filename;
  // }
}
