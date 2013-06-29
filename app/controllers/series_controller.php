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
        if(empty($this->params['player_id'])) {
            throw new UnexpectedValueException("params player_id needs to be set");
        }
        $serie_id = $this->params['id'];
        $player_id = $this->params['player_id'];
        $service = new RankingListServiceImpl();
        $rankingPlayer = $service->playerRanking($serie_id, $player_id);
        $this->set('rankingListPlayer', $rankingPlayer);
    }

}

?>