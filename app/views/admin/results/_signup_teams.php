<?php

echo "<h3> Add Team </h3>";
$html = "<p>";
if (count($availablePlayers) < 2) {
    $html .= "Ingen nok spillere til og melde på lag";
} else {
    $baseUrl = get_bloginfo('url');

    $html .= "<form method='post' action='" . $baseUrl . "/wp-admin/admin.php?page=mvc_results-add_team&id=" . $tournament->id . "'>";
    $html .= MvcFormTagsHelper::hidden_input('tournament_id', array('value' => $tournament->id));
    $html .= MvcFormTagsHelper::select_input('player_id1', array('options' => $availablePlayers));
    $html .= " - ";
    $html .= MvcFormTagsHelper::select_input('player_id2', array('options' => $availablePlayers));
    $html .= '<input type="submit" />';
    $html .= '</form>';
}

$html .= "</p>";
echo $html;

