<?php


namespace ts\tournament;

use ts\GenericDAO;

class TournamentDAO extends GenericDAO
{
    public function get($id)
    {
        $sql = "Select * from " . $this->table_prefix . "tournaments where id = $id";
        return $this->fetchAll($sql);
    }
}