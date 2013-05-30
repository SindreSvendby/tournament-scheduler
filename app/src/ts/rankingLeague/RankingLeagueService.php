<?php
namespace ts\rankingLeague;


interface RankingLeagueService {
    /**
     * @param $tournament int
     * @return RankingLeague
     */
    public function rankingLeagueFromTournament($tournament);
}