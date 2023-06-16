<?php

include_once("../libs/global.php");

abstract class Log extends persist
{
    protected int $tipoLog; // 1 - criação de nova instância, 2 - alteração de atributo, 3 - visualização de atributo
    protected string $mensagem;
    protected string $data;

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
