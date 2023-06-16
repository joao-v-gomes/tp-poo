<?php
include_once("../libs/global.php");

class Endereco
{
    private string $rua;
    private string $numero;
    private string $complemento;
    private string $cep;
    private string $cidade;
    private string $estado;

    private ?float $coordenadaLongitude;
    private ?float $coordenadaLatitude;


    // static $local_filename = "enderecos.txt";


    function __construct(string $rua, string $numero, string $complemento, string $cep, string $cidade, string $estado)
    {
        $this->setRua($rua);
        $this->setNumero($numero);
        $this->setComplemento($complemento);
        $this->setCep($cep);
        $this->setCidade($cidade);
        $this->setEstado($estado);

        $this->buscaCoordenadasMaps();
    }

    public function buscaCoordenadasMaps()
    {
        $gmaps = new Maps();

        $objMapsCoordenadas = $gmaps->getObjetoMapsCoordenadas($this);

        if ($objMapsCoordenadas == null) {
            print_r("Erro ao obter objeto maps coordenadas\n");
            $this->setCoordenadas(null, null);
            return null;
        } else {
            $this->setCoordenadas($objMapsCoordenadas['lng'], $objMapsCoordenadas['lat']);
        }
    }

    public function getEndCompleto()
    {

        return $this->rua . ", " . $this->numero . ", " . $this->complemento . ", " . $this->cep . ", " . $this->cidade . ", " . $this->estado . ", " . $this->coordenadaLongitude . ", " . $this->coordenadaLatitude;
    }

    public function getEndMaps()
    {
        return $this->rua . ", " . $this->numero . ", " . $this->cep . ", " . $this->cidade . ", " . $this->estado;
    }


    public function getRua(): string
    {
        return $this->rua;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getComplemento(): string
    {
        return $this->complemento;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function getCoordenadaX(): string
    {
        return $this->coordenadaLongitude;
    }

    public function getCoordenadaY(): string
    {
        return $this->coordenadaLatitude;
    }

    public function setRua(string $rua): void
    {
        $this->rua = $rua;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function setComplemento(string $complemento): void
    {
        $this->complemento = $complemento;
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    public function setCoordenadas(?float $coordenadaLongitude, ?float $coordenadaLatitude): void
    {
        $this->setCoordenadaLongitude($coordenadaLongitude);
        $this->setCoordenadaLatitude($coordenadaLatitude);
    }

    public function setCoordenadaLongitude(?float $coordenadaLongitude): void
    {
        $this->coordenadaLongitude = $coordenadaLongitude;
    }

    public function setCoordenadaLatitude(?float $coordenadaLatitude): void
    {
        $this->coordenadaLatitude = $coordenadaLatitude;
    }
}
