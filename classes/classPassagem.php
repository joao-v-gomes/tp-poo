<?php
include_once("../libs/global.php");

class Passagem extends persist
{
  private string $siglaAeroportoOrigem;
  private string $siglaAeroportoDestino;
  private float $preco;
  private string $assento;
  private int $franquiasBagagem;
  private Passageiro $passageiro;
  private Cliente $cliente;

  public function __construct(string $siglaAeroportoOrigem, string $siglaAeroportoDestino, float $preco, string $assento, int $franquiasBagagem, Passageiro $passageiro, Cliente $cliente)
  {
    $this->siglaAeroportoOrigem = $siglaAeroportoOrigem;
    $this->siglaAeroportoDestino = $siglaAeroportoDestino;
    $this->preco = $preco;
    $this->assento = $assento;
    $this->franquiasBagagem = $franquiasBagagem;
    $this->passageiro = $passageiro;
    $this->cliente = $cliente;
  }

  public function validaDocumentoIdentificacao()
  {
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
