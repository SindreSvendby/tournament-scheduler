<?php


namespace ts\serie;


class SimpleSerieImpl implements SimpleSerie {


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