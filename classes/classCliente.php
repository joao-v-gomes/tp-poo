<?php
include_once("../libs/global.php");

class Cliente extends persist
{
  private int $id;
  private string $nome;
  private string $sobrenome;
  private string $rg;
  private string $passaporte;
  private string $documentoIdentifi;

  public function __construct(int $id, string $nome, string $sobrenome, string $documentoIdentifi)
  {
    $this->id = $id;
    $this->nome = $nome;
    $this->sobrenome = $sobrenome;
    // $this->rg = $rg;
    // $this->passaporte = $passaporte;
    $this->documentoIdentifi = $documentoIdentifi;
  }

  public function validaDocumentoidentificacao()
  {
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
