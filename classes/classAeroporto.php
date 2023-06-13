<?php

include_once("../libs/global.php");

class Aeroporto extends persist implements Subject
{
  private string $sigla = "";
  // private string $cidade;
  // private string $estado;
  private ?Endereco $endereco = null;

  // private array $listaVoos;
  private ?array $listaCompanhiasAereas;

  static $local_filename = "aeroportos.txt";

  // private Log $log;

  // private array $observers = array();
  private Observer $observer;

  public function attach(Observer $observer): void
  {
    // $this->observers[] = $observer;
    // array_push($this->observers, $observer);

    $this->observer = $observer;

    print_r("Observer attachado...\n\n");

    // print_r($observer);

    // print_r($this->observers);
  }

  public function detach(Observer $observer): void
  {
    unset($this->observer);

    print_r("Observer dettachado...\n\n");
    // $key = array_search($observer, $this->observers, true);
    // if ($key) {
    //   unset($this->observers[$key]);
    // }
  }

  public function notificaCriacaoNovaInstancia()
  {
    print_r("Notificando observers da criacao...\n\n");
    $this->observer->criaNovaInstancia($this);
  }

  public function notificaAlteracaoAtributo($classe, string $nomeAtributo, $valorAntigo, $valorNovo)
  {
    print_r("Notificando observers do set...\n\n");
    $this->observer->setAtributo($classe, $nomeAtributo, $valorAntigo, $valorNovo);
  }

  public function notificaVisualizacaoAtributo($classe, string $nomeAtributo)
  {
    print_r("Notificando observers do get...\n\n");
    $this->observer->getAtributo($classe, $nomeAtributo);
  }

  public function __construct(string $sigla, Endereco $endereco)
  {
    $log = new Log();

    $this->attach($log);

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

    $this->notificaCriacaoNovaInstancia();
  }

  public function alterarAeroporto(Aeroporto $novoAeroporto)
  {
    $this->setSigla($novoAeroporto->getSigla());
    $this->setEndereco($novoAeroporto->getEndereco());
    // $this->setCidade($novoAeroporto->getCidade());
    // $this->setEstado($novoAeroporto->getEstado());
    $this->setListaCompanihasAereas($novoAeroporto->getListaCompanhiasAereasArray());
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

  public function setSigla(string $newSigla)
  {

    $oldSigla = $this->sigla;
    $this->sigla = $newSigla;

    // $this->notify();
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

  public function getListaCompanhiasAereasArray()
  {
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

    return $listaCompanhiasAereasString;
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
