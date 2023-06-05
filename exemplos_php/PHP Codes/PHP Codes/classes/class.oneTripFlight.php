<?php    
    include_once('../global.php');
    class oneTripFlight implements flightInterface { // Factory Class
        protected int $nTrips = 1;
        protected string $origin;
        protected string $destination;

        public function __construct( $p_origin, $p_destination ) {
            $this->origin = $p_origin;
            $this->destination = $p_destination;
        }

        public function getNumberOfTrips() {
            return $this->nTrips;
        }

    }