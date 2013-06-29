<?php


namespace ts\rankinglist\rankingLeague;

use ts\player\RankingListPlayerFactory;

class RankingLeaguePlayerFactory extends RankingListPlayerFactory {

    protected function createRankingList($results)
    {
        $result = $results[0];
        return new RankingLeagueImpl($result['rankingLeagueId'], $result['rankingLeagueName']);
    }
}