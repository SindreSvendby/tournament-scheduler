<?php

namespace ts\tournament;

class SimpleTournamentImpl implements SimpleTournament {
    function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }


    /**
     * The name of the tournament
     * @return String
     */
    public function name()
    {
        return $this->name;
    }

    public function id() {
        return $this->id;
    }
}