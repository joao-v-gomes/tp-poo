<?php
include_once("../libs/global.php");

class CompanhiaAerea extends persist
{
    private string $nome;
    private string $codigo;
    private string $razaoSocial;
    private string $cnpj;
    private string $sigla;

    private array $listaDeViagens;
    private array $listaDeViagensExecutadas;
    private array $listaAeronaves;

    private  ?int $programaMilhagem;

    static $local_filename = "companhiasAereas.txt";

    public function __construct(string $nome, string $codigo, string $razaoSocial, string $cnpj, string $sigla)
    {
        $this->setNome($nome);
        $this->setCodigo($codigo);
        $this->setRazaoSocial($razaoSocial);
        $this->setCnpj($cnpj);
        $this->setSigla($sigla);

        $this->setProgramaMilhagem(SEM_PROGRAMA_DE_MILHAGEM_DEFINIDO);

        $this->listaDeViagens = array();
        $this->listaDeViagensExecutadas = array();
        $this->listaAeronaves = array();
    }

    public function alterarCompanhiaAerea(CompanhiaAerea $novaCompAerea)
    {
        $this->setNome($novaCompAerea->getNome());
        $this->setCodigo($novaCompAerea->getCodigo());
        $this->setRazaoSocial($novaCompAerea->getRazaoSocial());
        $this->setCnpj($novaCompAerea->getCnpj());
        $this->setSigla($novaCompAerea->getSigla());
        $this->setProgramaMilhagem($novaCompAerea->getProgramaMilhagem());
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getSigla()
    {
        return $this->sigla;
    }

    public function getProgramaMilhagem()
    {
        return $this->programaMilhagem;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setCodigo(string $codigo)
    {
        $this->codigo = $codigo;
    }

    public function setRazaoSocial(string $razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
    }

    public function setCnpj(string $cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function setSigla(string $sigla)
    {
        $this->sigla = $sigla;
    }

    public function setProgramaMilhagem(?int $programaMilhagem)
    {
        $this->programaMilhagem = $programaMilhagem;
    }

    public function executaViagem(Viagem $novaViagem)
    {
    }

    public function cadastrarNovaAeronave(Aeronave $novaAeronave)
    {
        array_push($this->listaAeronaves, $novaAeronave);
    }

    public function cadastrarViagem(Voo $voo, int $milhasViagem, float $valorViagem, float $valorFranquiaBagagem, float $valorMulta, string $horarioChegada,string $horarioPartida)
    {
        $horarioPartida = DateTime::createFromFormat("d/m/Y H:i", $horarioPartida);
        $horarioChegada = DateTime::createFromFormat("d/m/Y H:i", $horarioChegada);

        $viagem = new Viagem($horarioPartida, $horarioChegada, $milhasViagem, $valorViagem, $valorFranquiaBagagem, $valorMulta);

        $viagem->setVoo($voo->getIndex());
        array_push($this->listaDeViagens, $viagem);
        $viagem->save();
    }

    public function cadastrarCliente()
    {
    }

    public function cadastrarPassageiro()
    {
    }

    public function validaViagem()
    {
    }

    public function compraPassagem(Cliente $cliente, Passageiro $passageiro, string $dia, Aeroporto $aeroOrigem, Aeroporto $aeroDestino, string $assento, int $FranquiaBagagem)
    {
        $dia = DateTime::createFromFormat("H:i", $dia);//d/m/Y H:i
        $voos = Voo::getRecords();
        $quant = count($this->listaDeViagens);

        for ($i = 0; $i < $quant; $i++) {
            $index = $this->listaDeViagens[$i]->getVoo();
            $voo = $voos[$index - 1];

            if ($voo->getAeroportoOrigem() == $aeroOrigem->getIndex() && $voo->getAeroportoDestino() == $aeroDestino->getIndex() && $this->listaDeviagens[$i]->getHorarioPartida() == $dia) {
                $viagem = $this->listaDeViagens[$i];
                $listaVia = array($viagem);
                $passagem = new Passagem($aeroOrigem->getSigla(), $aeroDestino->getsigla(), $viagem->getvalorViagem(), $assento, $FranquiaBagagem, $passageiro, $cliente, $listaVia, $viagem->getValorMulta());
                $passagem->save();
            }
        }
    }

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
