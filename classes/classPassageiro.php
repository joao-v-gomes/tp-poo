<?php
  include_once("../libs/global.php");

  class Passageiro
  {
    private string $nome;
    private string $id;

    public function __construct(string $nome, string $id)
    {
      $this->nome = $nome;
      $this->id = $id;
    }
  }
