<?php


namespace ts\player;

use ts\player\WPPlayerImpl;
use ts\rankingLeague\RankingLeagueImpl;
use ts\result\TournamentResultFactory;

abstract class RankingListPlayerFactory {

    /**
     * @param $results
     * @return RankingListPlayer
     */
    public function createPlayer($results) {
        $sum = self::calculateRanking($results);
        $rankingLeague = $this->createRankingList($results);
        $player = new WPPlayerImpl($results[0]['player_id']);
        $tournamentResults = TournamentResultFactory::createTournamentResults($results);
        return new RankingListPlayerImpl($tournamentResults, $rankingLeague, $player, $sum);
    }
    private function calculateRanking($results)
    {
        $sum = 0;
        foreach($results as $result) {
            $sum += $result['points'];
        }
        return $sum;
    }

    protected abstract function  createRankingList($result);

}