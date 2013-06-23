<?php
namespace ts\team;

use ts\GenericDAO;


class TeamDAO extends GenericDAO
{

    public function getTeamId($player_ids)
    {
        $sql = "select * from (
                   select team_id, group_concat(p.player_id) players from wp_playersinteam p
                   group by  team_id)  teams
                where teams.players = \"$player_ids\"";
        return $this->fetchAll($sql);
    }
}