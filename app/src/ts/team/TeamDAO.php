<?php
namespace ts\team;

use ts\GenericDAO;


/**
 * Class TeamDAO
 * @package ts\team
 */
class TeamDAO extends GenericDAO
{


    /**
     * @param $team_id
     * @return array|bool false if not existing, the result if not
     */
    public function getTeam($team_id) {
        $teamResultSet = $this->fetchAll("Select * from " . $this->table_prefix . "teams where id = " . $team_id);
        //echo "TeamId: ".$team_id . "<br/>";
        //echo "Size: ".sizeof($teamResultSet). "<br/>";
        if($teamResultSet == null || sizeof($teamResultSet) != 1) {
            throw new \DomainException("Unexpected Result: " . print_r($teamResultSet));
        }
        return $teamResultSet;
    }
    public function getTeamId($player_ids)
    {
        $sql = "select * from (
                   select team_id, group_concat(p.player_id) players from ". $this->table_prefix ."playersinteam p
                   group by  team_id)  teams
                where teams.players = \"". implode(",",$player_ids) . "\"";
        return $this->fetchAll($sql);
    }

    /**
     * @param $players array the id of the players
     */
    public function create($players)
    {
        $team_id = $this->createTeam($players);
        $this->createPlayersInTeam($team_id, $players);
        return $team_id;
    }

    /**
     * @return int return the team_id from the new team
     */
    private  function createTeam($players) {
        $teamModel = mvc_model("Team");
        $team = array(
            'name' => implode(",", $players)
        );
        $teamModel->create($team);
        $id = $teamModel->insert_id;
        return $id;
    }


    /**
     * @param $team_id
     * @param $players
     * @throws \DomainException if the team generation fails
     */
    private function createPlayersInTeam($team_id, $players) {
        $expected_affected_rows = 1;
        $unexpected_problems = false;
        foreach($players as $player):
            $sql = "INSERT INTO ".$this->table_prefix."playersinteam(team_id, player_id) VALUES ($team_id, $player)";
            $affected_rows  = $this->pdo->exec($sql);
            if($affected_rows != $expected_affected_rows):
                $unexpected_problems  = true;
            endif;
        endforeach;
        if($unexpected_problems) {
            throw new \DomainException("Problems creating teams...
                            The creation of the team could be in a error stat");
        }
    }
}