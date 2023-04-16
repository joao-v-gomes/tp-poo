<?php
include_once("classVoo.php");

class Linha extends persist
{
    private $frequencia = array();
    private DateTime $previsaoPartida;
    private DateTime $previsaoChegada;
    private float $previsaoDuracao;
    private Voo $voo;
    static $local_filename = "linha.txt";


    public function __construct(array $frequencia, DateTime $previsaoPartida, DateTime $previsaoChegada, float $previsaoDuracao, Voo $voo)
    {
      $this->frequencia = $frequencia;
      $this->previsaoPartida = $previsaoPartida;
      $this->previsaoChegada = $previsaoChegada;
      $this->previsaoDuracao = $previsaoDuracao;
      $this->voo = $voo;
    }

    public function alteraVoo(Voo $novoVoo)
    {
        // conferir depois as verificacoes para a troca de voo
        //$this->voo = $novoVoo;
    }
    static public function getFilename() {
        return get_called_class()::$local_filename;
    }
}
