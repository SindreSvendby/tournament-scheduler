<?php
namespace ts\tournament;

interface SimpleTournament
{
    /**
     * The name of the tournament
     * @return String
     */
    public function name();

    /**
     * @return int
     */
    public function id();
}
