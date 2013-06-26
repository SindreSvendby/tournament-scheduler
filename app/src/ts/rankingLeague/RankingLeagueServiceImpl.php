<?php
namespace ts\rankingLeague;

use ts\serie\SimpleSerie;
use ts\serie\SimpleSerieImpl;

class RankingLeagueServiceImpl implements RankingLeagueService {

    private static $DAO;

    function __construct() {
        if(self::$DAO == null) {
            self::$DAO = new RankingLeagueDAO();
        }
    }
    /**
     * @param $tournament int The tournament_id
     * @return RankingLeague a instance of RankingLeague based on the tournament_id
     */
    public function rankingLeagueFromTournament($tournament)
    {
        $mvc_tournament = mvc_model("Tournament");
        //$mvc_tournament-> // get series
        //get rankingleague and return that
    }

    /**
     * @param $rankingleague_id
     * @param $player_id
     * @return player\RankingLeaguePlayer
     */
    public function playerRanking($rankingleague_id, $player_id)
    {
        $results = self::$DAO->playerRanking($rankingleague_id, $player_id);
        $rankingLeaguePlayer = player\RankingLeaguePlayerFactory::createPlayer($results);
        return $rankingLeaguePlayer;
    }

    /**
     * @param $rankingLeague_id
     * @return array SimpleSerie[]
     */
    public function series($rankingLeague_id) {
        $results = self::$DAO->series($rankingLeague_id);
        $series = array();
        foreach($results as $result) {
            $series[] = new SimpleSerieImpl($result['id'], $result['name']);
        }
        return $series;
    }

}