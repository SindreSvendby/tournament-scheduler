<?php

namespace ts\result;

use ts\team\Team;
use ts\tournament\SimpleTournament;

class SimpleTournamentResult implements TournamentResult {

    function __construct($place, $points, $tournament)
    {
        $this->place = $place;
        $this->points = $points;
        $this->tournament = $tournament;
    }


    /**
     * The place achieved int the tournament
     * @return int
     */
    public function place()
    {
        return $this->place;
    }

    /**
     * Number of points received in the tournament.
     * @return int
     */
    public function points()
    {
        return $this->points;
    }

    /**
     * The tournament this result if for.
     * @return SimpleTournament
     */
    public function tournament()
    {
        return $this->tournament;
    }

    /**
     * The team that got this result
     * @return Team
     */
    public function team()
    {
        throw new \LogicException("Method not implemented");
    }

}