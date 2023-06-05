<?php
// include_once('../global.php');

include_once('class.observer.php');

class concreteObserver extends observer
{
    protected $observerState;
    protected string $name;

    public function __construct(string $p_name)
    {
        $this->name = $p_name;
    }

    // Implementation of the abstract method
    public function update($p_subject)
    {
        $this->observerState = $p_subject->getState();
        print_r("\nValor " . $this->observerState . " atualizado no observer " . $this->name);
    }
}
