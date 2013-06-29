<?php


namespace ts\ranking;

use ts\GenericDAO;

class RankingListDAO extends GenericDAO {

    /**
     * Retrives a rankingList from a specify serie
     * @param $serie_id
     * @return array|bool
     */
    public function serie($serie_id) {
        $wp = $this->table_prefix;
        $sql = "SELECT pit.player_id player_id, sum( r.points ) points, s.id as id
          FROM ".$wp."series s, ".$wp."tournaments t,
               ".$wp."results r, ".$wp."teams team, ".$wp."playersinteam pit
          WHERE t.serie_id = s.id
          AND t.id = r.tournament_id
          AND r.team_id = team.id
          AND pit.team_id = team.id
          AND s.id =" . $serie_id."
          AND r.points > 0
          GROUP BY player_id
          ORDER BY points DESC";
        $results = $this->fetchAll($sql);
        return $results;
    }

    public function getPlayerRankingForOneSeries($serie_id, $player_id) {
        $wp = $this->table_prefix;
        $sql = "SELECT r.place, r.points, r.tournament_id,
                t.name as tournamentName,
                s.name as sname, s.id as sid,
                pit.player_id
          FROM ".$wp."series s, ".$wp."tournaments t,
               ".$wp."results r, ".$wp."teams team, ".$wp."playersinteam pit
          WHERE t.serie_id = s.id
          AND t.id = r.tournament_id
          AND r.team_id = team.id
          AND pit.team_id = team.id
          AND s.id = " . $serie_id."
          AND pit.player_id = " . $player_id ."
          AND r.points > 0
          ORDER BY points DESC";
        return $this->fetchAll($sql);
    }
}