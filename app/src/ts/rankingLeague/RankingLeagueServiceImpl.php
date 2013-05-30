<?php
namespace ts\rankingLeague;

class RankingLeagueServiceImpl implements RankingLeagueService {
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

}