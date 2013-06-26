<?php


namespace ts\rankingLeague\player;

use ts\player\WPPlayerImpl;
use ts\rankingLeague\RankingLeagueImpl;
use ts\result\TournamentResultFactory;

class RankingLeaguePlayerFactory {

    /**
     * @param $result
     * @return RankingLeaguePlayer
     */
    public static function createPlayer($result) {
        $sum = self::calculateRanking($result);
        $rankingLeague = self::createRankingLeague($result);
        $player = new WPPlayerImpl($result[0]['player_id']);
        $tournamentResults = TournamentResultFactory::createTournamentResults($result);
        return new RankingLeaguePlayerImpl($tournamentResults, $rankingLeague, $player, $sum);
    }
    private static function calculateRanking($results)
    {
        $sum = 0;
        foreach($results as $result) {
            $sum += $result['points'];
        }
        return $sum;
    }

    private static function createRankingLeague($results)
    {
        $result = $results[0];
        return new RankingLeagueImpl($result['rankingLeagueId'], $result['rankingLeagueName']);
    }
}