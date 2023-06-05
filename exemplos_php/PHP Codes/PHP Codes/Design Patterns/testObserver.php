<?php
// include_once('../global.php');

include_once('../classes/class.observer.php');
include_once('../classes/class.observer.php');
include_once('../classes/class.concreteSubject.php');
include_once('../classes/class.concreteObserver.php');

$subject = new concreteSubject();

$barGraph = new concreteObserver("Bar Graph");
$pieGraph = new concreteObserver("Pie Graph");

$subject->attach($barGraph);
$subject->attach($pieGraph);

for ($i = 0; $i < 15; $i++) {
    $subject->setState($i);
    sleep(1);
    if ($i == 10) {
        $tribarGraph = new concreteObserver("Tridimensional Graph");
        $subject->attach($tribarGraph);
    }
}
