<?php

include_once('../global.php');

class LogEscrita extends Log
{
    public function __construct($classe, string $atributo, $objetoAntigo, $objetoNovo)
    {
        print_r("Criando log de escrita...\n\n");

        $this->setTipoLog(ESCRITA_ATRIBUTO);
        $this->setMensagem("Atributo " . $atributo . " da classe " . get_class($classe) . " foi alterado de " . $objetoAntigo . " para " . $objetoNovo . ".");
        $this->setData(date("d/m/Y H:i:s"));
    }

    public function setTipoLog(int $tipoLog)
    {
        $this->tipoLog = $tipoLog;
    }

    public function getTipoLog()
    {
        return $this->tipoLog;
    }

    public function setMensagem(string $mensagem)
    {
        $this->mensagem = $mensagem;
    }

    public function getMensagem()
    {
        return $this->mensagem;
    }

    public function setData(string $data)
    {
        $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }
}
