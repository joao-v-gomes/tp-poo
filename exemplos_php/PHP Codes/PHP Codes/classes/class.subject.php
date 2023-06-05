<?php
// include_once('../global.php');

include_once('class.observer.php');

abstract class subject
{
    protected array $observers = array();

    public function attach(observer $p_observer)
    {
        array_push($this->observers, $p_observer);
    }

    public function detach(observer $p_observer)
    {
        // TO DO
    }

    public function notify()
    {
        for ($i = 0; $i < count($this->observers); $i++) {
            $this->observers[$i]->update($this);
        }
    }

    abstract public function getState();

    abstract public function setState($p_state);
}
