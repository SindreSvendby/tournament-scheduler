<?php


namespace ts\rankingLeague\player;

use ts\rankingLeague\RankingLeague;
use ts\result\TournamentResult;
use ts\player\Player;

class RankingLeaguePlayerImpl implements RankingLeaguePlayer {

    private $rankingLeague;
    private $tournamentResults;
    private $player;
    private $ranking;

    function __construct($tournamentResults, $rankingLeague, $player, $ranking) {
        $this->tournamentResults = $tournamentResults;
        $this->rankingLeague = $rankingLeague;
        $this->player = $player;
        $this->ranking = $ranking;
    }
    /**
     * @return RankingLeague
     */
    public function rankingLeague()
    {
        return $this->rankingLeague;
    }

    /**
     * @return int The ranking in the rankingLeague
     */
    public function ranking()
    {
        return $this->ranking;
    }

    /**
     * @return TournamentResult[] and Array of TournamentResult
     */
    public function tournamentResults()
    {
        return $this->tournamentResults;
    }

    /**
     * @return Player The Player
     */
    public function player()
    {
        return $this->player;
    }


}