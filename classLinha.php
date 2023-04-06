<?php
include_once("classVoo.php");

class Linha
{
    private $frequencia = array();
    private DateTime $previsaoPartida;
    private DateTime $previsaoChegada;
    private float $previsaoDuracao;
    private Voo $voo;


    public function __construct()
    {
    }

    public function alteraVoo(Voo $novoVoo)
    {
        // conferir depois as verificacoes para a troca de voo
        $this->voo = $novoVoo;
    }
}
