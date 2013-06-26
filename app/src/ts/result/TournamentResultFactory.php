<?php


namespace ts\result;

use ts\tournament\SimpleTournamentImpl;

class TournamentResultFactory {

    /**
     * @param $results array containg the keys: tournamentName, tournament_id, points, place
     * @return TournamentResult[]
     */
    public static function createTournamentResults($results) {
        $tournamentResults = array();
        foreach($results as $result) {
            $tournament = new SimpleTournamentImpl($result['tournament_id'], $result['tournamentName']);
            $tournamentResults[] = new SimpleTournamentResult($result['place'],$result['points'], $tournament);
        }
        return $tournamentResults;
    }
}