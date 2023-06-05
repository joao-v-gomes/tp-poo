<?php
// include_once('../global.php');
include_once('class.subject.php');


abstract class observer2
{

    abstract public function update(subject $p_subject);
}
