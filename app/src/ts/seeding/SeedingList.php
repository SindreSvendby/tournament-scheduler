<?php
namespace ts\seeding;

interface SeedingList extends \Countable
{
    public function addTeam(SeedingTeam $team);
    public function seedingTeams();
}
