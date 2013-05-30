<?php
namespace ts\seeding;


class RankingLeagueSeedingList implements SeedingList
{
    public $teams = array();

    public function addTeam(SeedingTeam $team) {
        $this->teams[] =  $team;
    }

    public function seedingTeams()
    {
        return $this->teams;
    }

    public function count()
    {
        return count($this->teams);
    }
}
