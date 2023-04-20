<?php
include_once("classPassageiro.php");
include_once("classCliente.php");


class Passagem{
  private string $siglaAeroportoOrigem;
  private string $siglaAeroportoDestino;
  private float $preco;
  private string $assento;
  private int $franquiasBagagem;
  private Passageiro $passageiro;
  private Cliente $cliente;

  public function __construct(){
    
  }
  
  public function validaDocumentoidentificacao(){
    
  }
  
}