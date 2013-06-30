<?php

namespace ts\volleyball\match;

class BeachVolleyballMatchImpl implements BeachVolleyballMatch {

    /**
     * @return Set[]
     */
    public function result()
    {
        return $this->result;
    }

    /**
     * @return SimpleTournament
     */
    public function tournament()
    {
        return $this->tournament;
    }

    /**
     * @return int the id of the match
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return TeamDTO
     */
    public function teamOne()
    {
        return $this->teamOne();
    }

    /**
     * @return TeamDTO
     */
    public function teamTwo()
    {
        return $this->teamTwo();
    }

    /**
     * @return TeamDTO
     */
    public function winner()
    {
        return $this->winner;
    }

    /**
     * @return bool true if match is won be walkover.
     */
    public function walkover()
    {
        return $this->walkover;
    }

    /**
     * @return string a comment if something spesial has happend. f.eks walkover.
     */
    public function comment()
    {
        return $this->comment;
    }

    /**
     * This field is meant to be used to tell what kind of game it is. Like a 1/4 final, jumbofinal,
     * groupplay, practicematch etc.
     * @return string
     */
    public function description()
    {
        return $this->description;
    }

    public function __set($variable, $value) {
        if(method_exists($this, $variable)) {
            $this->$variable = $value;
        }
    }

}