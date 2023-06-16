<?php

include_once("../libs/global.php");

abstract class Subject extends persist
{
    protected $observer;

    static $local_filename = "subject.txt";

    public function attach($observer)
    {
        $this->observer = $observer;

        // print_r("Observer attachado...\n\n");
    }

    public function detach($observer)
    {
        unset($this->observer);

        // print_r("Observer dettachado...\n\n");
    }

    public function notificaCriacaoNovaInstancia($novaInstancia)
    {
        // print_r("Notificando observers da criacao... Subject\n\n");
        $this->observer->criaNovaInstancia($novaInstancia);
    }

    public function notificaAlteracaoAtributo($classe, string $nomeAtributo, $valorAntigo, $valorNovo)
    {
        // print_r("Notificando observers do set... Subject\n\n");
        $this->observer->setAtributo($classe, $nomeAtributo, $valorAntigo, $valorNovo);
    }

    public function notificaVisualizacaoAtributo($classe, string $nomeAtributo)
    {
        // print_r("Notificando observers do get... Subject\n\n");
        $this->observer->getAtributo($classe, $nomeAtributo);
    }

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
