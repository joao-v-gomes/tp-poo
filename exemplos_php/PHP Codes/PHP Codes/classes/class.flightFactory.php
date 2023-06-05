<?php    
    include_once('../global.php');
    interface flightInterface { // Factory Class
        
        public function getNumberOfTrips();
        
    }

    class flightFactory { // Factory Class

        static public function getFlight( int $p_numberOfTrips ) {

            if ( $p_numberOfTrips == 1 )
                return  new oneTripFlight( "CNF", "POA" );

            else if ( $p_numberOfTrips == 2 )
                return  new twoTripFlight( "CNF", "GRU", "GRU", "POA" );
        }
        

    }