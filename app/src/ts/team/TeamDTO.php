<?php


namespace ts\team;


class TeamDTO implements Team {

    private  $id;
    private  $name;

    function __construct($db_result) {
        $this->id = $db_result['id'];
        $this->name = $db_result['name'];
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return Player[]
     */
    public function players()
    {
        // TODO: Implement players() method.
    }

}