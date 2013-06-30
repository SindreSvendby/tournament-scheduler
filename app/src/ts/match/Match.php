<?php


namespace ts\match;

use ts\team\TeamDTO;

interface Match {

    /**
     * @return int the id of the match
     */
    public function id();

    /**
     * @return TeamDTO
     */
    public function teamOne();

    /**
     * @return TeamDTO
     */
    public function teamTwo();

    /**
     * @return TeamDTO
     */
    public function winner();

    /**
     * @return bool true if match is won be walkover.
     */
    public function walkover();

    /**
     * @return string a comment if something spesial has happend. f.eks walkover.
     */
    public function comment();


    /**
     * This field is meant to be used to tell what kind of game it is. Like a 1/4 final, jumbofinal,
     * groupplay, practicematch etc.
     * @return string
     */
    public function description();
}