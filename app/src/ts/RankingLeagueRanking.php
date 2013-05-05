<?php
namespace ts;

/**
 * A entry in a rankingleague.
 */
interface RankingLeagueRanking
{

    public function rankingLeague();

    /**
     * number of ranking points in the league
     * @return int
     */
    public function rankingPoints();

    /**
     * the position in the league
     * @return int
     */
    public function position();

    /**
     * Returns the owner of the position in the rankingleague.
     * @return mixed [Player|Team].
     */
    public function owner();
}
