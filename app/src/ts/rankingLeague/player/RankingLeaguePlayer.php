<?php


namespace ts\rankingLeague\player;

use ts\rankingLeague\RankingLeague;
use ts\result\TournamentResult;
use ts\player\Player;

interface RankingLeaguePlayer {

    /**
     * @return RankingLeague
     */
    public function rankingLeague();

    /**
     * @return int The ranking in the rankingLeague
     */
    public function ranking();

    /**
     * @return TournamentResult[] and Array of TournamentResult
     */
    public function tournamentResults();

    /**
     * @return Player
     */
    public function player();
}