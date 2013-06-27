<?php
namespace ts\ranking;

class RankingPlayerList implements RankingList
{
    public $seedingList = array();

    public function __construct($results)
    {
        if (!empty($results)) {
            foreach ($results as $result):
                if (is_array($result)) {
                    $this->seedingList[] = new RankingPlayer($result['player_id'], $result['points'], $result['id']);
                } else {
                    $this->seedingList[] = new RankingPlayer($result->player_id, $result->points, $result->id);
                }
            endforeach;
        }
    }
}
