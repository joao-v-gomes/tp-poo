<?php
include_once('../libs/global.php');

$piloto = new Piloto("João");

$piloto->save();

$pilotos = Piloto::getRecords();

print_r($pilotos);
