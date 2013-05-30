<?php
namespace ts;

interface RankingLeagueResultList extends rankingLeague\RankingLeague {

    /**
     * @return RankingLeagueRanking[]
     */
    public function rankingLeagueRankings();


}