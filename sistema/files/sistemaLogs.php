<?php

include_once("../libs/global.php");

class SistemaLogs
{
    static function sis_verLogs()
    {
        $logs = Log::getRecords();

        if (count($logs) == 0) {
            print_r("Nenhum log encontrado.\n\n");
            return;
        }

        SistemaLogs::mostraLogs($logs);
    }

    static function mostraLogs(array $logs)
    {
        print_r("Logs encontrados:\n\n");
        print_r("Index - Tipo Log - Mensagem - Data\n\n");

        foreach ($logs as $log) {
            print_r($log->getIndex() . " - " . $log->getTipoLog() . " - " . $log->getMensagem() . " - " . $log->getData() . "\n");
        }

        print_r("\n\n");
    }
}
