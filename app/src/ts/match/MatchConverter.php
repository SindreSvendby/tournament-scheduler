<?php


namespace ts\match;

use ts\team\TeamService;
use ts\volleyball\match\BeachVolleyballMatch;
use ts\volleyball\match\BeachVolleyballMatchImpl;
use ts\volleyball\match\set\SetConverter;

class MatchConverter
{
    function __construct()
    {
        $this->teamService = new TeamService();
        $this->setConverter = new SetConverter();
    }

    /**
     * @param $results array of array's where the children array is an array representation of a match.
     * @return BeachVolleyballMatch[]
     */
    public function convertToMatches($results)
    {
        $matches = array();
        if (!empty($results)) {
            foreach ($results as $result) {
                $matches[] = $this->convertToMatch($result);
            }
        }
        return $matches;
    }

    /**
     *
     * @param $result array representation of a match
     * @return BeachVolleyballMatch[]
     */
    private function convertToMatch($result)
    {
        $match = new BeachVolleyballMatchImpl();
        $match->id = $result['id'];
        $match->description = $result['description'];
        $match->walkover = ($result['walkover'] == 1) ? true : false ;
        $match->winner = $this->convertWinnerTeam($result);
        $match->teamOne = $this->convertTeamOne($result);
        $match->teamTwo = $this->convertTeamTwo($result);
        $match->comment = $result['walkover_comment'];
        $match->result = $this->convertResult($result);
        return $match;
    }

    private function convertWinnerTeam($result)
    {
        return $this->teamService->getTeam($result['winner_id']);
    }

    private function convertTeamOne($result) {
        return $this->teamService->getTeam($result['team1_id']);
    }

    private function convertTeamTwo($result) {
        return $this->teamService->getTeam($result['team2_id']);
    }

    private function convertResult($result)
    {
        return $this->setConverter->convertResult($result);
    }


}