<?php
include_once("classVoo.php");
include_once("classCompanhiaAerea.php");
include_once("classLinha.php");

class Aeroporto extends persist
{
    public string $sigla;
    private string $cidade;
    private string $estado;
    private $listaVoos = array();
    private $listaLinhas = array();
    private $listaVoosExecutados = array();
    private $listaCompanhiasAereas = array();
    static $local_filename = "aeroporto.txt";

    public function __construct(string $sigla, string $cidade, string $estado, array $listaVoos, array $listaLinhas, array $listaVoosExecutados, array $listaCompanhiasAereas)
    {
      $this->sigla = $sigla;
      $this->cidade = $cidade;
      $this->estado = $estado;
      $this->listaVoos = $listaVoos;
      $this->listaLinhas = $listaLinhas;
      $this->listaVoosExecutados = $listaVoosExecutados;
      $this->listaCompanhiasAereas = $listaCompanhiasAereas;
    }

    public function cadastraNovoVoo(Voo $novoVoo)
    {
        array_push($this->listaVoos, $novoVoo);
    }

    public function cadastrarNovaLinha(Linha $novaLinha)
    {
        array_push($this->listaLinhas, $novaLinha);
    }

    public function cadastraNovaCompanhiaAerea(CompanhiaAerea $novaCompanhiaAerea)
    {
        array_push($this->listaCompanhiasAereas, $novaCompanhiaAerea);
    }

    static public function getFilename() 
    {
            return get_called_class()::$local_filename;
    }
}
