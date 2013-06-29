<?php


namespace ts\rankinglist\rankingLeague;


class SimpleRankingLeagueImpl implements SimpleRankingLeague {


    function __construct($id, $name)
    {
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