<?php
namespace ts\seeding;

class SeedingPlayer
{
    /**
     * @var int
     */
    public $points;
    /**
     * @var wordpress_user
     */
    public  $player;

    /**
     * @var int
     */
    public $rankingleague_id;

    public function __construct($result) {
        $this->player = get_userdata($result->player_id);
        $this->points = $result->points;
        $this->rankingleague_id = $result->rankingleague_id;
    }
}
