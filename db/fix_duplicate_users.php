<?php
/**
-- For og fikse brukere som er dupliserte:
-- På forhånd:
-- 1. du må vite brukeriden til den som skal slettes og iden til den du skal overføre alt til.
-- 2. Antar at wp_ er wordpress prefixen (dette er den pr default)

-- Stemmer ikke 2 må du bytte ut SQLene under.
 */


$host="localhost";
$dbname="test";
$username="root";
$password="";
//$correct_user_id=6;
//$removed_user_id=7;
$tc = new UserCorrecter($host, $dbname, $username, $password);
$tc->fix_user($correct_user_id, $removed_user_id);


class UserCorrecter
{

    private $pdo;

    function __construct($host, $dbname, $username, $password)
    {
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    }


    public function fix_user($new_id, $old_id)
    {
        if (!$this->is_user_registred_in_tournament_scheduler($old_id)) {
            echo "Nothing to do, the old user is not in tournament scheduler";
        } else {
            $partners = $this->partners_that_both_have($new_id, $old_id);
            if (empty($partners)) {
                echo "bruker idene har ikke samme partner, oppdattere bare wp_playersinteams";
                $this->update_playerinteams($new_id, $old_id);
                echo "User " . $new_id . " is updated with user " . $old_id . " results";
            } else {
                echo "De deler partner. Mer komplisert oppdattering må til... ingenting gjort";
            }
        }
    }


    function run_statement($sql)
    {
        $statement = $this->pdo->query($sql);
        if ($statement != null) {
            $resultset = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $resultset;
        } else {
            return array();
        }
    }

    private function run_exec($sql)
    {
        $rows_affected = $this->pdo->exec($sql);
        return ($rows_affected > 0);
    }

    private function is_user_registred_in_tournament_scheduler($user_id)
    {
        $get_user = "SELECT *  FROM wp_playersinteam WHERE player_id =  $user_id;";
        return is_array($this->run_statement($get_user));
    }

    private function partners_that_both_have($new_id, $old_id)
    {
        $get_same_partners =
            "SELECT DISTINCT player_id
             FROM test.wp_playersinteam
             WHERE
              team_id IN
                (SELECT team_id
                 FROM test.wp_playersinteam
                 WHERE player_id  = $old_id)
              AND player_id != $old_id
              AND player_id IN (
                SELECT DISTINCT player_id
                FROM test.wp_playersinteam
                WHERE team_id IN
                  (SELECT team_id
                   FROM test.wp_playersinteam
                   WHERE player_id  = $new_id)
              AND player_id != $new_id);";
        $partners = $this->run_statement($get_same_partners);
        return $partners;
    }

    private function update_playerinteams($new_id, $old_id)
    {
        $change_partner = "UPDATE wp_playersinteam SET player_id = $new_id WHERE player_id = $old_id;";
        $this->run_exec($change_partner);
    }
}

