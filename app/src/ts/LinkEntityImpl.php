<?php


namespace ts;

use ts\LinkEntity;


class LinkEntityImpl implements LinkEntity {

    protected $id;
    protected $name;

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