<?php
namespace ts;

interface Team
{
    /**
     * @return Player[]
     */
    public function players();

    /**
     * @return RankingSerie[]
     */
    public function rankingSeries();
}
