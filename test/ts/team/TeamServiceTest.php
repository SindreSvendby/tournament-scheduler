<?php

namespace ts\team;

class TeamServiceTest
{

    //TODO: fix PHPUnit and composer

    public function exist_ids_entered_exist()
    {
        $service = new TeamService();
        $result = $service->exist("4,7");
        //Forventer 20
        echo __FUNCTION__ . ": " . $result;
    }

    public function exist_ids_entered_do_not_exist()
    {
        $service = new TeamService();
        $result = $service->exist("43,425");
        //Forventer -1
        echo __FUNCTION__ . ": " . $result;

    }
}

include 'C:\xampp2\htdocs\wordpress\wp-content\plugins\tournament-scheduler\app\src\MyAutoloader.php';
$a = new TeamServiceTest();
$a->exist_ids_entered_do_not_exist();
$a->exist_ids_entered_exist();
