<?php


namespace ts\team;


interface Team {
    /**
     * @return Player[]
     */
    public function players();
    public function id();
    public function name();
}