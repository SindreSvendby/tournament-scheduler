<?php


namespace ts\volleyball\match\set;


class SetImpl implements Set {

    private $pointsTeamOne;
    private $pointsTeamTwo;

    function __construct($pointsTeamOne, $pointsTeamTwo)
    {
        $this->pointsTeamOne = $pointsTeamOne;
        $this->pointsTeamTwo = $pointsTeamTwo;
    }


    public function pointsTeamOne()
    {
        return $this->pointsTeamOne;
    }

    public function pointsTeamTwo()
    {
        return $this->pointsTeamTwo;
    }

}