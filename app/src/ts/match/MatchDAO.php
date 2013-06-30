<?php


namespace ts\match;

use ts\GenericDAO;

class MatchDAO extends GenericDAO {

    public function byTournamentId($id) {
        $sql = "Select * from " . $this->table_prefix . "matches where tournament_id = $id";
        return $this->fetchAll($sql);
    }
}