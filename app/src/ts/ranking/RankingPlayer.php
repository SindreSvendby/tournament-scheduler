<?php
namespace ts\ranking;

class RankingPlayer
{
    /**
     * @var int
     */
    public $points;
    /**
     * @var Object wordpress_user
     */
    public  $player;

    /**
     * @var int
     */
    public $id;

    /**
     * @param $player_id int
     * @param $points int
     * @param $id int  the id for the serie or the rankingleague the rankinglist is constructed from
     */
    public function __construct($player_id, $points, $id) {
        $this->player = get_userdata($player_id);
        $this->points = $points;
        $this->id = $id;
    }

}
