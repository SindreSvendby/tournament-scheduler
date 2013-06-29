<?php

namespace ts\rankinglist\rankingLeague;

use ts\player\RankingListPlayer;
use ts\player\RankingListPlayerFactory;


class RankingLeagueServiceImpl implements RankingLeagueService {

    private static $DAO;

    function __construct() {
        if(self::$DAO == null) {
            self::$DAO = new RankingLeagueDAO();
        }
    }

    /**
     * @param $rankingleague_id
     * @param $player_id
     * @return RankingListPlayer
     */
    public function playerRanking($rankingleague_id, $player_id)
    {
        $results = self::$DAO->playerRanking($rankingleague_id, $player_id);
        $factory = new RankingLeaguePlayerFactory();
        $rankingLeaguePlayer = $factory->createPlayer($results);
        return $rankingLeaguePlayer;
    }

    /**
     * @param $rankingLeague_id
     * @return array SimpleSerie[]
     */
    public function rankingLeagues($rankingLeague_id) {
        $results = self::$DAO->series($rankingLeague_id);
        $series = array();
        foreach($results as $result) {
            $series[] = new SimpleRankingLeagueImpl($result['id'], $result['name']);
        }
        return $series;
    }
}