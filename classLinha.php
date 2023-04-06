<?php
include_once("classVoo.php");

class Linha
{
    private $frequencia = array();
    private DateTime $previsaoPartida;
    private DateTime $previsaoChegada;
    private float $previsaoDuracao;
    //private Voo $voo;


    public function __construct(array $frequencia, DateTime $previsaoPartida, DateTime $previsaoChegada, float $previsaoDuracao, )
    {
      $this->frequencia = $frequencia;
      $this->previsaoPartida = $previsaoPartida;
      $this->previsaoChegada = $previsaoChegada;
      $this->previsaoDuracao = $previsaoDuracao;
      //$this->voo = $voo;
    }

    public function alteraVoo(Voo $novoVoo)
    {
        // conferir depois as verificacoes para a troca de voo
        //$this->voo = $novoVoo;
    }
}
