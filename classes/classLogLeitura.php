<?php

include_once("../libs/global.php");

class LogLeitura extends Log
{

    static $local_filename = "logs.txt";

    public function __construct($classe, string $atributo)
    {
        print_r("Criando log de leitura...\n\n");

        $this->setTipoLog(LEITURA_ATRIBUTO);
        $this->setMensagem("Atributo " . $atributo . " da classe " . get_class($classe) . " foi lido.");
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

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
