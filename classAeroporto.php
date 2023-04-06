<?php
include_once("classVoo.php");
include_once("classCompanhiaAerea.php");
include_once("classLinha.php");

class Aeroporto
{
    private string $sliga;
    private string $cidade;
    private string $estado;
    private $listaVoos = array();
    private $listaLinhas = array();
    private $listaVoosExecutados = array();
    private $listaCompanhiasAereas = array();

    public function __construct()
    {
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
}
