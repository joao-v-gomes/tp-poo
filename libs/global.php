<?php
function autoloader($pClassName)
{
    echo __NAMESPACE__;
    $path = '';

    if ($pClassName == 'persist') {
        // CAMINHO REPLIT
        // $path = '/home/runner/tp-poo/libs/' . $pClassName . '.php';

        // CAMINHO JOAO
        $path = '/home/joao/ufmg/poo/tp-poo/libs/' . $pClassName . '.php';
    } else {
        // CAMINHO REPLIT
        // $path = '/home/runner/tp-poo/' . 'class' . $pClassName . '.php';

        // CAMINHO JOAO
        $path = '/home/joao/ufmg/poo/tp-poo/' . 'class' . $pClassName . '.php';
    }

    print_r($path);

    if (is_file($path)) {
        include_once $path;
    } else {
        $path = __DIR__ . '/classes/class.' . $pClassName . '.php';
        if (is_file($path)) {
            include_once $path;
        } else
            throw (new Exception('Não foi encontrada a definição da classe ' . $pClassName . ' na pasta classes.'));
    }
}
spl_autoload_register('autoloader');
