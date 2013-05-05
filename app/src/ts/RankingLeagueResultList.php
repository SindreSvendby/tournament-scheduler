<?php
namespace ts;

interface RankingLeagueResultList extends RankingLeague {

    /**
     * @return RankingLeagueRanking[]
     */
    public function rankingLeagueRankings();


}