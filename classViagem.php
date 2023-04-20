<?php
include_once("classAeronave.php");

class Voo extends persist
{
    public string $aeroportoOrigem;
    private string $aeroportoDestino;
    private DateTime $horarioPartida;
    private DateTime $horarioChegada;
    private float $duracaoEstimada;
    private string $companhiaAerea;
    private Aeronave $aeronave;
    private array $passageiros;
    private float $carga;
    static $local_filename = "viagem.txt";

    public function __construct(string $aeroportoOrigem, string $aeroportoDestino, DateTime $horarioPartida, DateTime $horarioChegada, float $duracaoEstimada, string $companhiaAerea, Aeronave $aeronave, array $passageiros, float $carga)
    {
      $this->aeroportoOrigem = $aeroportoOrigem;
      $this->aeroportoDestino = $aeroportoDestino;
      $this->horarioPartida = $horarioPartida;
      $this->horarioChegada = $horarioChegada;
      $this->duracaoEstimada = $duracaoEstimada;
      $this->companhiaAerea = $companhiaAerea;
      $this->aeronave = $aeronave;
      $this->passageiros = $passageiros;
      $this->carga = $carga;
    }

    public function alterarAeronave(Aeronave $novaAeronave)
    {
        // verificar capacidade de carga e passageiros antes de alterar
        $this->aeronave = $novaAeronave;
    }

    public function getAeroportoOrigem()
    {
      return $this->aeroportoOrigem;  
    }

    // public function inserirPassageiro(Passageiro $novoPassageiro)
    // {
    // }

    // public function removerPassageiro(Passageiro $novoPassageiro)
    // {
    // }

    public function inserirCarga(float $novaCarga)
    {
        // depois precisamos conferir se já atingiu
        // a capacidade máxima de carga
        $this->carga = $this->carga + $novaCarga;
    }

    public function removerCarga(float $novaCarga)
    {
        // verificar se nao e negativo  
        $this->carga = $this->carga - $novaCarga;
    }

    static public function getFilename() 
    {
            return get_called_class()::$local_filename;
    }
}
