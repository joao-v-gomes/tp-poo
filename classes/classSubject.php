<?php

include_once("../libs/global.php");

interface Subject
{
    public function attach(Observer $observer);

    public function detach(Observer $observer);

    // public function notify();

    public function notificaCriacaoNovaInstancia();

    public function notificaAlteracaoAtributo($classe, string $nomeAtributo, $valorAntigo, $valorNovo);

    public function notificaVisualizacaoAtributo($classe, string $nomeAtributo);
}
