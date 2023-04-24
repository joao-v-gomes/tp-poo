<?php
include_once("../libs/global.php");

// define("TAMANHO_RG", 8);
define('VAZIO', '');

class Cliente extends persist
{
  //private int $id;
  private string $nome;
  private string $sobrenome;
  private string $rg = '';
  private string $passaporte = '';
  // private string $documentoIdentifi;

  static $local_filename = "clientes.txt";

  public function __construct(string $nome, string $sobrenome, string $documentoIdentifi)
  {
    //$this->id = $id;
    $this->nome = $nome;
    $this->sobrenome = $sobrenome;
    // $this->rg = $rg;
    // $this->passaporte = $passaporte;
    // $this->documentoIdentifi = $documentoIdentifi;

    $this->validaDocumentoidentificacao($documentoIdentifi);
  }

  public function validaDocumentoidentificacao(string $documentoIdentificacao)
  {
    // Vamos aceitar o rg so com numeros, tipo 11111111, oito digitos sem ponto ou hifen
    // O passaporte tem duas letras no começo, tipo AA11111.
    if (is_numeric($documentoIdentificacao)) {
      $this->rg = $documentoIdentificacao;
    } else {
      $this->passaporte = $documentoIdentificacao;
    }
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function getSobrenome()
  {
    return $this->sobrenome;
  }

  public function getDocumentoIdentificacao()
  {
    if ($this->rg == VAZIO) {
      return $this->getPassaporte();
    } else {
      return $this->getRg();
    }
  }

  public function getRg()
  {
    return $this->rg;
  }

  public function getPassaporte()
  {
    return $this->passaporte;
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
