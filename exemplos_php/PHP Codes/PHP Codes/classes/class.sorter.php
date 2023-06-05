<?php    
    include_once('../global.php');
    class sorter {
        private sortingStrategy $strategy;

        public function setStrategy( sortingStrategy &$p_strategy ) {
            $this->strategy = $p_strategy;
        }

        public function sort( Array $p_array ) {
            return $this->strategy->doIt( $p_array );
        }
        
    }