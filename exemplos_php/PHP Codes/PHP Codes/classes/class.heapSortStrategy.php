<?php
    include_once('../global.php');
    class heapSortStrategy extends sortingStrategy {

        // Implementation of the abstract method
        public function doit( Array $items ) {
            return $this->heapsort( $items, sizeof($items) );
        }    
    
        // function for heap sort which calls heapify function 
        // to build the max heap and then swap last element of 
        // the max-heap with the first element
        // exclude the last element from the heap and rebuild the heap
        private function heapsort(&$Array, $n) {
            for($i = (int)($n/2); $i >= 0; $i--) {
                $this->heapify($Array, $n-1, $i);
            }
        
            for($i = $n - 1; $i >= 0; $i--) {
                //swap last element of the max-heap with the first element
                $temp = $Array[$i];
                $Array[$i] = $Array[0];
                $Array[0] = $temp;

                //exclude the last element from the heap and rebuild the heap 
                $this->heapify($Array, $i-1, 0);
            }
            return $Array;
        }

        // heapify function is used to build the max heap
        // max heap has maximum element at the root which means
        // first element of the array will be maximum in max heap
        private function heapify(&$Array, $n, $i) {
            $max = $i;
            $left = 2*$i + 1;
            $right = 2*$i + 2;

            //if the left element is greater than root
            if($left <= $n && $Array[$left] > $Array[$max]) {
                $max = $left;
            }

            //if the right element is greater than root
            if($right <= $n && $Array[$right] > $Array[$max]) {
                $max = $right;
            }

            //if the max is not i
            if($max != $i) {
                $temp = $Array[$i];
                $Array[$i] = $Array[$max];
                $Array[$max] = $temp;
                //Recursively heapify the affected sub-tree
                $this->heapify($Array, $n, $max); 
            }
        }

    }

/*
// test the code
$MyArray = array(10, 1, 23, 50, 7, -4);
$n = sizeof($MyArray); 
echo "Original Array\n";
PrintArray($MyArray, $n);

heapsort($MyArray, $n);
echo "\nSorted Array\n";
PrintArray($MyArray, $n);*/
?>