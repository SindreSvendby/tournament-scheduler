<?php
if (empty($rankingList)) {
    echo "<p>Ingen rankingpoeng delt ut</p>";
} else {
    echo "<table>";
    echo "<thead><tr><td>Spiller</td><td>Poeng</td></tr></thead><tbody>";
    foreach ($rankingList as $ranking):
        echo "<tr><td>". display_tournament_user($ranking->player) ."</td><td>". display_serie_player_result_link($ranking) ."</td></tr>";
    endforeach;
    echo "</tbody></table>";
}
