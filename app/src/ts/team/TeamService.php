<?php


namespace ts\team;


class TeamService {

    private $dao;

    function __construct() {
        $this->dao = new TeamDAO();
    }

    /**
     * @param $player_ids string comma separated string with the player id. F.eks; 1,5
     * @return int the value of the team_id, or -1 if the team do not exist.
     */
    private function getTeamId($player_ids)
    {
        $result = $this->dao->getTeamId($player_ids);
        if (!empty($result)):
            return $result[0]['team_id'];
        else:
            return -1;
        endif;
    }

    /**
     * @param $id int the id of the team in the db.
     * @return Team
     */
    public  function getTeam($id) {
        $teamResultSet = $this->dao->getTeam($id);
        return new TeamDTO($teamResultSet[0]);
    }


    /**
     * See exist method for details.
     * The only difference between this method and exist is that
     * this create method create a team_id if it does not exist
     * @param $players string comma separated string with the player id. F.eks; 1,5
     * @return int the value of the team_id
     */
    public function create($players) {
        $team_id = $this->getTeamId($players);
        if($team_id  != -1 ) {
            return $team_id;
        } else {
            return $this->dao->create($players);
        }
        return $team_id;
    }
}