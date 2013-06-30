<?php


namespace ts\tournament;


class TournamentServiceImpl implements  TournamentService {

    private static $DAO;

    function __construct() {
        if(self::$DAO == null) {
            self::$DAO = new TournamentDAO();
        }
    }

    /**
     * @param $id int the id of a tournament
     * @return SimpleTournament
     */
    public function tournament($id)
    {
        $results = self::$DAO->get($id);
        $result = $results[0];
        return new SimpleTournamentImpl($result['id'], $result['name']);
    }


}