<?php
namespace ts\volleyball\match;

use ts\match\Match;
use ts\tournament\SimpleTournament;


interface BeachVolleyballMatch extends Match {

    /**
     * @return Set[]
     */
    public function result();

    /**
     * @return SimpleTournament
     */
    public function tournament();

}