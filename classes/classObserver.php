<?php

include_once("../libs/global.php");

interface Observer
{
    public function criaNovaInstancia(Subject $subject);

    public function setAtributo($classe, string $nomeAtributo, $valorAntigo, $valorNovo);

    public function getAtributo($classe, string $nomeAtributo);
}
