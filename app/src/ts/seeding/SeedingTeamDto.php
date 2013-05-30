<?php
namespace ts\seeding;

/**
 * Class SeedingTeamDao
 */
class SeedingTeamDto implements SeedingTeam {

    /**
     * @var
     */
    private $rankingPoints;
    /**
     * @var
     */
    private $teamId;

    /**
     * @param $teamId
     * @param $rankingPoints
     */
    function __construct($teamId, $rankingPoints)
    {
        $this->rankingPoints = $rankingPoints;

        $this->teamId = $teamId;
    }


    /**
     * @return mixed
     */
    public function rankingPoints()
    {
        return $this->rankingPoints;
    }

    /**
     * @return mixed
     */
    public function teamId()
    {
        return $this->teamId;
    }

}