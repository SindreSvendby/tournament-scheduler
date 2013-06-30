<?php


namespace ts\volleyball\match\set;


class SetConverter {


    /**
     * @param $home
     * @param $away
     * @return Set|array()
     */
    private function convertSet($home, $away)  {
        return  new SetImpl($home, $away);
    }

    /**
     * @param $result array Converts a database result to a Set
     * @return Set[]
     */
    public function convertResult($result) {
        $sets = array();
        $sets['1'] = $this->convertSet($result['team1_sett1'], $result['team2_sett1']);
        $sets['2'] = $this->convertSet($result['team1_sett2'], $result['team2_sett2']);
        $sets['3'] = $this->convertSet($result['team1_sett3'], $result['team2_sett3']);
        return $sets;
    }
}