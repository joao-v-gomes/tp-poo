<?php
include_once("classViagem.php");

class Linha extends persist
{
    private $frequencia = array();
    private DateTime $previsaoPartida;
    private DateTime $previsaoChegada;
    private float $previsaoDuracao;
    private $viagem = array();
    private string $codigoVoo;
    static $local_filename = "voo.txt";


    public function __construct(array $frequencia, DateTime $previsaoPartida, DateTime $previsaoChegada, float $previsaoDuracao, Voo $voo, string $codigoVoo)
    {
      $this->frequencia = $frequencia;
      $this->previsaoPartida = $previsaoPartida;
      $this->previsaoChegada = $previsaoChegada;
      $this->previsaoDuracao = $previsaoDuracao;
      $this->codigoVoo = $codigoVoo;
      $this->voo = $voo;
    }

    public function alteraViagem(Viagem $novaViagem)
    {
        // conferir depois as verificacoes para a troca de voo
        //$this->voo = $novoVoo;
    }

    static public function getFilename() {
        return get_called_class()::$local_filename;
    }
}
