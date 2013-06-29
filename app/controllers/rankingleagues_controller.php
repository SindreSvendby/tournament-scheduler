<?php

use ts\seeding\SeedingManager;
use \ts\rankinglist\rankingLeague\RankingLeagueServiceImpl;

class RankingleaguesController extends MvcPublicController
{
    function show() {
        $this->set_object();
        $seedingManager = new SeedingManager($this->object->id);
        $this->set('seedingList', $seedingManager->getSeedingList());
        $this->set('series', $seedingManager->series());
    }

    function player(){
        if(empty($this->params['id']) || empty($this->params['player_id'])) {
            throw new UnexpectedValueException("params rankingleague_id and player_id needs to be set");
    }
        $rankingleague_id = $this->params['id'];
        $player_id = $this->params['player_id'];
        $rlService = new RankingLeagueServiceImpl();
        $rankingLeaguePlayer = $rlService->playerRanking($rankingleague_id, $player_id);
        $this->set('rankingLeaguePlayer', $rankingLeaguePlayer);
    }
}

?>