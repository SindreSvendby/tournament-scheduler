<?php
/**
 * Looks like we have a bug that creates a new team_id for each time a team is created,
 * even if the team has the same players, that is not the intent.
 * This script goes trough the database and;
 *
 * 1. Find the all teams that have the same players more then once
 * 2. Change the wp_result to reflect only one team_id for the team
 * 3. Deletes old the non-used team_id's in wp_players in team
 */
class TeamCorrecter
{

    private $pdo;

    function __construct($host, $dbname, $username, $password)
    {
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }


    public function fix_teams()
    {
        //team_members, team_id_min, team_ids
        $duplicate_team_info_sql = "SELECT a.team team_members, min(a.team_id) team_id_min, group_concat(a.team_id) team_ids FROM (
              SELECT group_concat(p.player_id) team, p.team_id team_id
              FROM wp_playersinteam p
              GROUP BY  p.team_id) a
          GROUP BY a.team
          HAVING count(a.team) > 1";
        $duplicate_team_info = $this->run_statement($duplicate_team_info_sql);

        foreach ($duplicate_team_info as $team_info) {
            $new_id = $team_info['team_id_min'];
            foreach(explode(",",$team_info['team_ids']) as $old_id):
                $this->update_result($new_id, $old_id);
                $this->remove_team($old_id);
            endforeach;
        }
    }

    /**
     * @param $new_id
     * @param $old_id
     * @return bool false if it fails
     */
    private function update_result($new_id, $old_id)
    {
        if ($new_id == $old_id):
            return true;
        else:
            $update_sql = "UPDATE test.wp_results r SET r.team_id = " . $new_id . " where r.team_id = " . $old_id . ";";
            return $this->run_exec($update_sql);
        endif;
    }

    private function remove_team($team_id)
    {
        $delete_sql = "delete from wp_playersinteam where team_id = $team_id";
        $this->run_exec($delete_sql);
        $delete_sql = "delete from wp_teams where team_id = $team_id";
        return $this->run_exec($delete_sql);
    }

    function run_statement($sql)
    {
        echo $sql . "\n";
        $statement = $this->pdo->query($sql);
        $resultset = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $resultset;
    }

    private function run_exec($sql)
    {
        echo $sql . "\n";
        $rows_affected = $this->pdo->exec($sql);
        return ($rows_affected > 0);
    }
}

$host="localhost";
$dbname="test";
$username="root";
$password="";
$tc = new TeamCorrecter($host, $dbname, $username, $password);
$tc->fix_teams();