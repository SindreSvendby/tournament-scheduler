<?php
namespace ts\tournament;

use ts\signup\SignupValidator;
use ts\team\TeamManager;
use ts\team\TeamService;

class TournamentResultManager
{
    private $validator;
    private $resultModel;
    private $teamService;

    public function __construct($tournamentId)
    {
        $this->validator = new SignupValidator($tournamentId);
        $this->resultModel = mvc_model("Result");
        $this->teamService = new TeamService();
    }

    public function signup($player_id1, $rest_of_the_players)
    {
        $this->validator->isValid($player_id1, $rest_of_the_players);
        $all_players = array_merge((array)$player_id1, $rest_of_the_players);
        $team_id = $this->teamService->create($all_players);
        return $this->createResult($team_id);
    }

    private function createResult($team_id)
    {
        $signedUpById = wp_get_current_user()->ID;
        $signedUpDate = date("Y-m-d H:i:s");

        $result = array(
            'team_id' => $team_id,
            'tournament_id' => $this->validator->tournament_id,
            'signedUpDate' => $signedUpDate,
            'signedUpBy' => $signedUpById
        );
        return $this->resultModel->create($result);
    }

    public function getResultList()
    {
        $resultList = $this->resultModel->find(array(
            'conditions' => array(
                'tournament_id' => $this->validator->tournament_id,
                'points >' => 0
            ),
            'order' => 'place ASC'
        ));
        return $resultList;
    }
}
