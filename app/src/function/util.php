<?php

/**
 * @param $team TeamManager
 * @return string html
 */
function display_team($team) {
    $output = "";
    $i = 1;
    foreach($team->getUsers() as $user):
        if(sizeof($team->getUsers())== $i) {
            $output.= display_tournament_user($user);
        } else {
            $output.= display_tournament_user($user) . " - ";
            $i++;
        }
    endforeach;
    return $output;
}

/**
 * @param $team TeamManager
 * @return string html
 *
 */
function display_team_with_seeding($team) {
    return display_team($team) . " (" . $team->getRanking() . ")";
}

/**
 * @param $user wordpress_user class... or something like that $wp_user
 * @return string html
 */
function display_tournament_user($user) {
    return "<a href=\"". site_url() . "/players/" .$user->id . "\">" . $user->display_name . "</a>";
}

/**
 * @param rankingLegue rankingLeague object
 * @return string html
 */
function display_rankingleague($rankingLegue) {
    return "<a href=\"". site_url() . "/rankingleagues/" .$rankingLegue->id . "\">" . $rankingLegue->name . "</a>";
}


/**
 * @param $tournament Object
 * @return string html link
 */
function display_tournament_result($tournament) {
    $mvcTournamentsEditResults = 'mvc_results-edit_result';
    return "<a href=\"".  admin_url("admin.php/?page=$mvcTournamentsEditResults&id=" . $tournament->id) . '">' . $tournament->name . "</a>";
}

/**
 * @param $tournament ts\tournament\SimpleTournament
 * @return string html link
 */
function display_Tournament_link($tournament) {
    return "<a href=\"". site_url() . "/tournaments/" .$tournament->id() . "\">" . $tournament->name() . "</a>";
}

function display_Series_link($series) {
    return display_link($series, "series");
}


/**
 * @param $object object the object with id and name
 * @param $path string the name of the controller
 * @return string html link
 */
function display_link($object, $path) {
    return "<a href=\"". site_url() . "/".$path ."/" .$object->id() . "\">" . $object->name() . "</a>";
}

/**
 * @param $seeding ts\seeding\SeedingPlayer
 * @return string html link
 */
function display_rankingleague_player_result_link($seeding) {
    return "<a href=\"". site_url() . "/rankingleagues/player/" .$seeding->rankingleague_id . "/?player_id=".
    $seeding->player->ID."\">" . $seeding->points . "</a>";
}

function print_a($a) {
    echo "<pre>";
        print_r($a);
    echo "</pre>";

}