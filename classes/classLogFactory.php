<?php

include_once("../libs/global.php");

class LogFactory extends Log
{

    static $local_filename = "logs.txt";

    public function salvaLog(int $tipoLog, $classe, $atributo, $objetoAntigo, $objetoNovo)
    {
        switch ($tipoLog) {
            case NOVA_INSTANCIA:
                $log = new LogNovaInstancia($classe);
                $log->save();
                break;
            case ESCRITA_ATRIBUTO:
                $log = new LogEscrita($classe, $atributo, $objetoAntigo, $objetoNovo);
                $log->save();
                break;
            case LEITURA_ATRIBUTO:
                $log = new LogLeitura($classe, $atributo);
                $log->save();
                break;
            default:
                break;
        }
    }

    public function criaNovaInstancia($novaInstancia)
    {
        $this->salvaLog(NOVA_INSTANCIA, $novaInstancia, null, null, null);
    }

    public function setAtributo($classe, string $nomeAtributo, $valorAntigo, $valorNovo)
    {

        $this->salvaLog(ESCRITA_ATRIBUTO, $classe, $nomeAtributo, $valorAntigo, $valorNovo);
    }

    public function getAtributo($classe, string $nomeAtributo)
    {
        $this->salvaLog(LEITURA_ATRIBUTO, $classe, $nomeAtributo, null, null);
    }

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
