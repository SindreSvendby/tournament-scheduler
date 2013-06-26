<?php


namespace ts\rankingLeague;


class RankingLeagueImpl implements RankingLeague {

    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function name()
    {
        return $this->name;
    }

    public function id()
    {
        return $this->id;
    }
}