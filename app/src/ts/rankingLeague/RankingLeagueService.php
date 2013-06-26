<?php
namespace ts\rankingLeague;


use ts\seeding\SeedingPlayerInfo;
use ts\serie\SimpleSerie;

interface RankingLeagueService {
    /**
     * @param $tournament int
     * @return RankingLeague
     */
    public function rankingLeagueFromTournament($tournament);

    /**
     * @param $rankingleague_id
     * @param $player_id
     * @return player\RankingLeaguePlayer
     */
    public function playerRanking($rankingleague_id, $player_id);

    /**
     * @param $rankingleague_id
     * @return SimpleSerie
     */
    public function series($rankingleague_id);
}