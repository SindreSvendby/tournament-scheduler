<?php

namespace ts\db;

include 'PDOWrapper.php';

class fix_team_names extends PDOWrapper
{
    function __construct($host, $dbname, $username, $password)
    {
        $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }

    public function fix_names()
    {
        $teams_sql = "Select * from wp_teams";
        $teams = $this->run_statement($teams_sql);
        foreach($teams as $team){
            $players_sql = "Select * from wp_playersinteam where team_id = ". $team['id'] .";";
            $players = $this->run_statement($players_sql);
            $players_id = array();
            foreach($players as $player) {
                $players_id[] = $player['player_id'];
            }
            $update_name_sql = "UPDATE wp_teams SET name = \"". implode(",",$players_id) ."\" where id = ". $team['id'] .";";
            echo $update_name_sql . "\n";
            $this->run_statement($update_name_sql);
        }

    }
}

$host="localhost";
$dbname="test";
$username="root";
$password="";
$fix_team_names = new fix_team_names($host, $dbname, $username, $password);
$fix_team_names->fix_names();
