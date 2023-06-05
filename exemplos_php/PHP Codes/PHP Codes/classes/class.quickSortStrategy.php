<?php
    include_once('../global.php');
    class quickSortStrategy extends sortingStrategy {

        // Implementation of the abstract method
        public function doit( Array $items ) {
            return $this->quick_sort( $items );
        }    
    
        private function quick_sort($my_array)
        {
            $loe = $gt = array();
            if(count($my_array) < 2)
            {
                return $my_array;
            }
            $pivot_key = key($my_array);
            $pivot = array_shift($my_array);
            foreach($my_array as $val)
            {
                if($val <= $pivot)
                {
                    $loe[] = $val;
                }elseif ($val > $pivot)
                {
                    $gt[] = $val;
                }
            }
            return array_merge($this->quick_sort($loe),array($pivot_key=>$pivot),$this->quick_sort($gt));
        }
    }

?>
