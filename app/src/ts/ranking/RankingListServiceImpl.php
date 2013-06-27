<?php


namespace ts\ranking;


use ts\tournament\SimpleTournamentImpl;

class RankingListServiceImpl implements RankingListService {

    private static $DAO;

    public function __construct() {
        if(self::$DAO == null) {
            self::$DAO = new RankingListDAO();
        }
    }

    /**
     * @param $serie_id
     * @return array
     */
    public function serie($serie_id) {
        $results = self::$DAO->serie($serie_id);
        $rankingList = new RankingPlayerList($results);
        return $rankingList->seedingList;
    }

    public function playerSerieRanking($serie_id, $player_id) {
        $results = self::$DAO->getPlayerRankingForOneSeries($serie_id, $player_id);
        print_a($results);
        $rankingPlayers = array();
        foreach($results as $result) {
            $rankingPlayers[] = new RankingPlayer($result['place'], $result['points'],
                new SimpleTournamentImpl($result['tid'], $result['tname']));
        }
        return $rankingPlayers;
    }
}