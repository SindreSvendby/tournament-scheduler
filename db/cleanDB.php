<?php

namespace ts\db;

include 'PDOWrapper.php';

class DB_Cleaner extends PDOWrapper {

    private function cleanTeam(){
        return $this->delete("wp_teams");
    }

    private function cleanRankingLeagues() {
        return $this->delete("wp_rankingleagues");
    }

    private function cleanSeries() {
        return $this->delete("wp_series");
    }

    private function cleanResults() {
        return $this->delete("wp_results");
    }

    private function cleanTournaments() {
        return $this->delete("wp_tournaments");
    }

    private function cleanVenues() {
        return $this->delete("wp_venues");
    }


    private function cleanPlayersInTeam() {
        return $this->delete("wp_playersinteam");
    }

    private function cleanTournamentResponsibles() {
        return $this->delete("wp_tournament_responsibles");
    }

    private function delete($table_name) {
        $sql = "delete from ". $table_name;
        return $this->run_exec($sql);
    }

    public function cleanAllTournamentSchedulerTables() {
        $this->cleanRankingLeagues();
        $this->cleanSeries();
        $this->cleanTournaments();
        $this->cleanTournamentResponsibles();
        $this->cleanVenues();
        $this->cleanResults();
        $this->cleanTeam();
        $this->cleanPlayersInTeam();
        echo $this->pdo->errorCode();
        print_r($this->pdo->errorInfo());
    }
}

$dbC = new DB_Cleaner("localhost", "test", "root", "");
$dbC->cleanAllTournamentSchedulerTables();