<?php
include_once("../libs/global.php");

// print_r(__DIR__);

$topgun = new Aeronave("russian", "mk-dir", 500, 10000, "a123", true);

$topgun->save();

$aeronaves = Aeronave::getRecords();

print_r($aeronaves);

// print_r($topgun);