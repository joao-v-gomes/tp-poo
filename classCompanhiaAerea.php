<?php
include_once("classVoo.php");
include_once("classAeronave.php");

class CompanhiaAerea
{
    private string $nome;
    private string $codigo;
    private string $razaoSocial;
    private string $cnpj;
    private string $sigla;
    private $listaAeronaves = array();


    public function __construct()
    {
    }

    public function executaVoo(Voo $novoVoo)
    {
    }

    public function cadastrarNovaAeronave(Aeronave $novaAeronave)
    {
        array_push($this->listaAeronaves, $novaAeronave);
    }
}
