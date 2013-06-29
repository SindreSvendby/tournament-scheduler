<?php
namespace ts\rankinglist\rankingLeague;

use ts\GenericDAO;

class RankingLeagueDAO extends GenericDAO
{

    public function playerRanking($rankingleague_id, $player_id)
    {
        $sql = "SELECT pit.player_id, r.points, r.place, r.tournament_id, rl.name as rankingLeagueName,
                       rl.id as rankingLeagueId, t.name as tournamentName
                FROM
                    " . $this->table_prefix . "results r,
                    " . $this->table_prefix . "tournaments t,
                    " . $this->table_prefix . "series s,
                    " . $this->table_prefix . "rankingleagues rl,
                    " . $this->table_prefix . "playersinteam pit
                where r.tournament_id = t.id
                    and t.serie_id = s.id
                    and s.rankingleague_id = rl.id
                    and pit.team_id = r.team_id
                    and r.points != 0
                    and r.place != 0
                    and rl.id = $rankingleague_id
                    and pit.player_id = $player_id;
                    order by t.date DESC";
        return $this->fetchAll($sql);
    }

    /**
     * Returns a resultset with all the series connected to a rankingLeague
     * @param $rankingLeague_id
     * @return array, see <b>PDOStatement::fetchAll</b>
     *
     */
    public function series($rankingLeague_id) {
        $sql = "SELECT * FROM ". $this->table_prefix ."series where rankingleague_id = $rankingLeague_id";
        $statement = $this->pdo->query($sql);
        return $statement->fetchAll();
    }
}