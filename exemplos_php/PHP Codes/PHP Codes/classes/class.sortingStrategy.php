<?php    
    include_once('../global.php');
    abstract class sortingStrategy {

        abstract public function doit( Array $items );
        
    }