<?php


namespace ts\team;


class TeamService {

    private $dao;

    function __construct() {
        $this->dao = new TeamDAO();
    }

    /**
     * @param $player_ids string comma seperated string with the player id. F.eks; 1,5
     * @return int the value of the team_id, or -1 if the team do not exist.
     */
    public function exist($player_ids)
    {
        $result = $this->dao->getTeamId($player_ids);
        if (!empty($result)):
            return $result[0]['team_id'];
        else:
            return -1;
        endif;
    }
}