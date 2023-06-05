<?php    
    include_once('../global.php');
    class twoTripFlight implements flightInterface { // Factory Class
        protected int $nTrips = 2;
        protected string $origin1;
        protected string $destination1;
        protected string $origin2;
        protected string $destination2;

        public function __construct( $p_origin1, $p_destination1, $p_origin2, $p_destination2 ) {
            $this->origin1 = $p_origin1;
            $this->destination1 = $p_destination1;
            $this->origin2 = $p_origin2;
            $this->destination2 = $p_destination2;
        }

        public function getNumberOfTrips() {
            return $this->nTrips;
        }

    }