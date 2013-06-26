<?php
namespace ts\team;

use ts\player\PlayerManager;

class TeamManager
{
    public  $team_id;
    private static $service;

    /**
     * @var array id of players
     */
    public $players = array();
    public $team_name;

    private function __construct($team_id, $rankingleague_id) {
        if(self::$service == null) {
            self::$service= new TeamService();
        }
        $this->rankingleague_id = $rankingleague_id;
        $team = self::$service->getTeam($team_id);
        if($team == null) {
            throw new UnexpectedValueException("The id for Team do not exist:" . $team_id);
        }

        $this->team_id = $team_id;
        $this->team_name = $team->name();
        global $wpdb;
        $results = $wpdb->get_results("Select * from " . $wpdb->prefix . "playersinteam where team_id = " . $team_id);
        foreach($results as  $result):
            $this->players[] = $result->player_id;
        endforeach;
    }

    /**
     * @param $team_id
     * @return TeamManager
     */
    public static function constructTeamByTeamId($team_id, $rankingleague_id) {
        return new TeamManager($team_id, $rankingleague_id);
    }

    /**
     * @return int
     */
    public  function getRanking() {
        $sum = 0;
        foreach($this->players as $player_id):
            $player = new PlayerManager($player_id, $this->rankingleague_id);
            $sum += $player->getRanking();
        endforeach;
        return $sum;
    }

    /**
     * @return PlayerManager[]
     */
    public function getPlayers() {
        $players = array();
        foreach($this->players as $player_id):
            $players[] = new PlayerManager($player_id);
        endforeach;
        return $players;
    }

    public function getUsers() {
        foreach($this->players as $player_id):
            $users[] = get_user_by('id', $player_id);
        endforeach;
        return $users;
    }
}
