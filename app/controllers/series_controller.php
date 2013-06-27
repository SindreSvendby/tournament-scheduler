<?php

use ts\seeding\SeedingManager;
use ts\ranking\RankingListServiceImpl;

class SeriesController extends MvcPublicController {

    public function show() {
        $this->set_object();
        $rankingListService = new RankingListServiceImpl();
        $rankingList = $rankingListService->serie($this->object->id);
        $this->set('rankingList', $rankingList);
    }

    function player(){
        if(empty($this->params['id']) || empty($this->params['player_id'])) {
            throw new UnexpectedValueException("params rankingleague_id and player_id needs to be set");
        }
        $serie_id = $this->params['id'];
        $player_id = $this->params['player_id'];
        $service = new RankingListServiceImpl();
        $rankingPlayer = $service->playerSerieRanking($serie_id, $player_id);
        $this->set('rankingLeaguePlayer', $rankingPlayer);

    }

}

?>