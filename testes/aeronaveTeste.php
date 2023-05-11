<?php
include_once("../libs/global.php");

$topgun = new Aeronave("russian", "mk-dir", 10, 10000, "12-abc", true);

// $topgun->save();

// $aeronaves = Aeronave::getRecords();

// var_dump($topgun->getIndex());


// var_dump(isset($topgun->getRegistro()));

// if ($topgun->getTeste() == true) {
//     echo "Aeronave Criada\n";
// } else {
//     echo "Aeronave não Criada\n";
// }

// var_dump($topgun->getRegistro());

print_r($topgun);

// print_r($aeronaves);
