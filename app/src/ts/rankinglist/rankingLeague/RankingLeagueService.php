<?php
namespace ts\rankinglist\rankingLeague;


use ts\seeding\SeedingPlayerInfo;
use ts\serie\SimpleSerie;

interface RankingLeagueService {

    /**
     * @param $rankingleague_id
     * @param $player_id
     * @return \ts\player\RankingListPlayer
     */
    public function playerRanking($rankingleague_id, $player_id);

    /**
     *
     * @param $rankingleague_id
     * @return SimpleRankingLeague
     */
    public function rankingLeagues($rankingleague_id);
}