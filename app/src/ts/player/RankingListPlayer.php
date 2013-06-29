<?php


namespace ts\player;

use ts\rankinglist\rankingLeague\SimpleRankingLeague;
use ts\result\TournamentResult;
use ts\player\Player;
use ts\serie\SimpleSerie;

interface RankingListPlayer {

    /**
     * The type of the rankinglist, f.eks Serie or RankingLeague
     * @return SimpleRankingLeague|SimpleSerie
     */
    public function type();

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