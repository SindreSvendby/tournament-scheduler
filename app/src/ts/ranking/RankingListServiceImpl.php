<?php


namespace ts\ranking;

use ts\rankinglist\serie\SerieListPlayerFactory;

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

    /**
     * @param $serie_id
     * @param $player_id
     * @return \ts\player\RankingListPlayer
     */
    public function playerRanking($serie_id, $player_id) {

        $results = self::$DAO->getPlayerRankingForOneSeries($serie_id, $player_id);
        $factory = new SerieListPlayerFactory();
        $rankingListPlayer = $factory->createPlayer($results);

        return $rankingListPlayer;
    }
}