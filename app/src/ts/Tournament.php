<?php

interface Tournament
{
    /**
     * The name of the tournament
     * @return String
     */
    public function name();

    /**
     * Where the location is held
     * @return String
     */
    public function location();

    /**
     * What it costs to join the tournament
     * @return int
     */
    public function price();

    /**
     * which TournamentSeries the tournament is associated with
     * @return TournamentSerie
     */
    public function tournamentSerie();

}
