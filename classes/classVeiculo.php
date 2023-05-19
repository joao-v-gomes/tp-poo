<?php
include_once("../libs/global.php");

class Veiculo extends persist
{

    private string $codigo;
    private string $placa;
    private int $qtdeAssentos;
    private array $rota;
    private DateTime $tempoPercurso;
    private DateTime $horarioEmbarquePrevisto;
    private int $CompAereaPertencente;

    static $local_filename = "veiculos.txt";


    function __construct(string $codigo, string $placa, int $qtdeAssentos)
    {
        $this->setCodigo($codigo);
        $this->setPlaca($placa);
        $this->setQtdeAssentos($qtdeAssentos);
        // $this->setHorarioEmbarquePrevisto($horarioEmbarquePrevisto);
        // $this->setCompAereaPertencente($CompAereaPertencente);
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca($placa): void
    {
        $this->placa = $placa;
    }

    public function getQtdeAssentos()
    {
        return $this->qtdeAssentos;
    }

    public function setQtdeAssentos($qtdeAssentos): void
    {
        $this->qtdeAssentos = $qtdeAssentos;
    }

    public function getRota()
    {
        return $this->rota;
    }

    public function setRota($rota): void
    {
        $this->rota = $rota;
    }

    public function addRota($endereco): void
    {
        array_push($this->rota, $endereco);
    }

    public function getTempoPercurso()
    {
        return $this->tempoPercurso;
    }

    public function setTempoPercurso($tempoPercurso): void
    {
        $this->tempoPercurso = $tempoPercurso;
    }

    public function getHorarioEmbarquePrevisto()
    {
        return $this->horarioEmbarquePrevisto;
    }

    public function setHorarioEmbarquePrevisto($horarioEmbarquePrevisto): void
    {
        $this->horarioEmbarquePrevisto = $horarioEmbarquePrevisto;
    }

    public function getCompAereaPertencente()
    {
        return $this->CompAereaPertencente;
    }

    public function setCompAereaPertencente($CompAereaPertencente): void
    {
        $this->CompAereaPertencente = $CompAereaPertencente;
    }

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
