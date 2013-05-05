<?php
namespace ts;

/**
 * A result of a Tournament
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
     * @return Tournament
     */
    public function tournament();

    /**
     * The team that got this result
     * @return Team
     */
    public function team();
}
