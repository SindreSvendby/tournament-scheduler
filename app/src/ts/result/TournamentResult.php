<?php
namespace ts\result;

use ts\tournament\SimpleTournament;
use ts\team\Team;

/**
 * A result in a Tournament
 */
interface TournamentResult
{
    /**
     * The place achieved int the tournament
     * @return int
     */
    public function place();

    /**
     * Number of points received in the tournament.
     * @return int
     */
    public function points();

    /**
     * The tournament this result if for.
     * @return SimpleTournament
     */
    public function tournament();

    /**
     * The team that got this result
     * @return Team
     */
    public function team();
}
