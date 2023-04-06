<?php
include_once("classAeronave.php");

class Voo
{
    private string $aeroportoOrigem;
    private string $aeroportoDestino;
    private DateTime $horarioPartida;
    private DateTime $horarioChegada;
    private float $duracaoEstimada;
    private string $companhiaAerea;
    private Aeronave $aeronave;
    private array $passageiros;
    private float $carga;

    public function __construct()
    {
    }

    public function alterarAeronave(Aeronave $novaAeronave)
    {
        // verificar capacidade de carga e passageiros antes de alterar
        $this->aeronave = $novaAeronave;
    }

    // function inserirPassageiro(Passageiro $novoPassageiro)
    // {
    // }

    // function removerPassageiro(Passageiro $novoPassageiro)
    // {
    // }

    public function inserirCarga(float $novaCarga)
    {
        // depois precisamos conferir se ja atingiu
        // a capacidade maxima de carga
        $this->carga = $this->carga + $novaCarga;
    }

    public function removerCarga(float $novaCarga)
    {
        // verificar se nao e negativo  
        $this->carga = $this->carga - $novaCarga;
    }
}
