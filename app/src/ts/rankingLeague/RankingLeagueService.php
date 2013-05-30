<?php


namespace ts;


interface RankingLeagueService {
    /**
     * @param $tournament int
     * @return RankingLeague
     */
    public function rankingLeagueFromTournament($tournament);
}