<?php

interface GoBehavior
{
    public function go();
}

class GoByDrivingBehavior implements GoBehavior
{
    public function go()
    {
        echo 'I am driving';
    }
}

class GoByFlyingBehavior implements GoBehavior
{
    public function go()
    {
        echo 'I am flying';
    }
}


class Vehicle
{
    private $goBehavior;

    public function setGoBehavior(GoBehavior $goBehavior)
    {
        $this->goBehavior = $goBehavior;
    }

    public function go()
    {
        $this->goBehavior->go();
    }
}

$streetRacer = new Vehicle();
$streetRacer->setGoBehavior(new GoByDrivingBehavior());

$streetRacer->go();
