<?php


namespace ts\match;


class MatchServiceImpl implements MatchService {

    private static $DAO;

    function __construct() {
        if(self::$DAO == null) {
            self::$DAO = new MatchDAO();
        }
    }


    /**
     * @param $byTournamentId int a Tournament->id()
     * @return \ts\volleyball\match\BeachVolleyballMatch[]
     */
    public function matches($byTournamentId)
    {
        $results = self::$DAO->byTournamentId($byTournamentId);
        $matchConverter = new MatchConverter();
        $matches = $matchConverter->convertToMatches($results);
        return $matches;
    }


}