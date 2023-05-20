<?php

function teste1(?bool $parametro)
{
    if ($parametro) {
        // echo "Verdadeiro<br>";
        return "Verdadeiro";
    } else {
        // echo "Falso<br>";
        return null;
    }
    // echo "Teste 1<br>";

}

$var = null;


teste1($var) != null ? print_r(teste1($var)) : print_r("null");
