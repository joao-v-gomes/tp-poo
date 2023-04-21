<?php
include_once("classViagem.php");
include_once("classCompanhiaAerea.php");
include_once("classVoo.php");

class Aeroporto extends persist
{
    private string $sigla;
    private string $cidade;
    private string $estado;
    private $listaVoos = array();
    private $listaCompanhiasAereas = array();
    private $listaAeroportos = array();
    static $local_filename = "aeroporto.txt";

    public function __construct(string $sigla, string $cidade, string $estado, array $listaVoos, array $listaCompanhiasAereas)
    {
      $this->sigla = $sigla;
      $this->cidade = $cidade;
      $this->estado = $estado;
      $this->listaVoos = $listaVoos;
      $this->listaCompanhiasAereas = $listaCompanhiasAereas;
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
