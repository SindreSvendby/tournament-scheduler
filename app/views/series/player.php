<?php

echo "<h1>". $rankingLeaguePlayer->player()->name() ." - ". $rankingLeaguePlayer->rankingLeague()->name() ."</h1>";

$tournamentResults = $rankingLeaguePlayer->tournamentResults();
if (empty($tournamentResults)) {
    echo "<p>Ingen resultater registert.</p>";
} else {
    echo "<h2>Resultater</h2>";
    echo "<ul>";
    foreach($tournamentResults as $result) {
        echo '<li class="result"><span class="tournament_name">'.$result->place.".plass ".display_Tournament_link($result->tournament()) .'</span> - <span class="tournament_points">' .$result->points()." poeng</span></li>";
    }
    echo "</ul>";
}