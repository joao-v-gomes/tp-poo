<?php    
    include_once('../global.php');
    class bubbleSortStrategy extends sortingStrategy {

        // Implementation of the abstract method
        public function doit( Array $items ) {
            return $this->bubbleSort( $items );
        }    
        
        private function bubbleSort($array)
        {
          for($i = 0; $i < count($array); $i++)
          {
             for($j = 0; $j < count($array) - 1; $j++)
             {
               if($array[$j] > $array[$j + 1])
               {
                 $aux = $array[$j];
                 $array[$j] = $array[$j + 1];
                 $array[$j + 1] = $aux;
               }
             }
          }
          return $array;
        }
    }