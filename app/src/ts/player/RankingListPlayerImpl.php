<?php


namespace ts\player;

use ts\rankinglist\rankingLeague\RankingLeague;
use ts\result\TournamentResult;
use ts\player\Player;

class RankingListPlayerImpl implements RankingListPlayer {

    private $type;
    private $tournamentResults;
    private $player;
    private $ranking;

    /**
     * @param $tournamentResults TournamentResult[]
     * @param $rankingLeague RankingLeague
     * @param $player Player
     * @param $ranking int
     */
    function __construct($tournamentResults, $rankingLeague, $player, $ranking) {
        $this->tournamentResults = $tournamentResults;
        $this->type = $rankingLeague;
        $this->player = $player;
        $this->ranking = $ranking;
    }
    /**
     * @return RankingLeague
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * @return int The ranking in the rankingLeague
     */
    public function ranking()
    {
        return $this->ranking;
    }

    /**
     * @return TournamentResult[] an array of TournamentResult
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