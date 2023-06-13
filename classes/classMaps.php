<?php

// namespace yidas\googleMaps;

require '../libs/vendor/autoload.php';

include_once("../libs/global.php");
include_once("../libs/vendor/yidas/google-maps-services/src/Client.php");

class Maps
{

    private $gmaps;

    public function __construct()
    {
        // $this->gmaps = new yidas\googleMaps::Client(['key' => 'AIzaSyB-5QX5Z5Q8QZ9Z3X6Z3Z3Z3Z3Z3Z3Z3Z3']);

        // $this->gmaps = new Client(['key' => 'AIzaSyB-5QX5Z5Q8QZ9Z3X6Z3Z3Z3Z3Z3Z3Z3Z3']);

        $this->gmaps = new \yidas\googleMaps\Client(['key' => GMAPS_KEY]);
    }


    public function getObjetoMapsCompleto(Endereco $endereco)
    {
        // print_r($endereco->getEndMaps() . "\n");

        $objMapsCompleto = $this->gmaps->geocode($endereco->getEndMaps());

        if ($objMapsCompleto == null) {
            print_r("Erro ao obter objeto maps completo\n");
            return null;
        } else {
            return $objMapsCompleto;
        }
    }

    public function getObjetoMapsCoordenadas(Endereco $endereco)
    {
        // print_r($endereco->getEndMaps() . "\n");

        // $objMapsCompleto = $this->gmaps->geocode($endereco->getEndMaps());

        $objMapsCompleto = $this->getObjetoMapsCompleto($endereco);

        if ($objMapsCompleto == null) {
            print_r("Erro ao obter objeto maps completo\n");
            return null;
        } else {
            $objMapsCoordenadas = $objMapsCompleto[0]['geometry']['location'];

            return $objMapsCoordenadas;
        }
    }
}
