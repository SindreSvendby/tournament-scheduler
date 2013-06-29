<?php


namespace ts\rankinglist\serie;

use ts\player\RankingListPlayerFactory;

class SerieListPlayerFactory extends RankingListPlayerFactory {

    protected function  createRankingList($results) {

        $result = $results[0];
        return new SimpleSerieImpl($result['sid'], $result['sname']);
    }
}