<?php

echo "<h1>" . display_RankingList($rankingLeaguePlayer->type(), "rankingLeague") ."</h1>";
echo "<h3>".display_Player_link($rankingLeaguePlayer->player())." - ".$rankingLeaguePlayer->ranking()." poeng</h3>";


$tournamentResults = $rankingLeaguePlayer->tournamentResults();
if (empty($tournamentResults)) {
    echo "<p>Ingen resultater registert.</p>";
} else {
    echo "<h2>Resultater</h2>";
    echo "<ul>";
    foreach($tournamentResults as $result) {
        echo '<li class="result"><span class="tournament_name">'.display_Tournament_link($result->tournament()) .'</span> '. $result->place.".plass ". '<span class="tournament_points">' .$result->points()." poeng</span></li>";
    }
    echo "</ul>";
}