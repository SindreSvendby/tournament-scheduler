<?php

$baseUrl = get_bloginfo('url');

$html = "<form method='post' action='".$baseUrl."/tournaments/add_team/{$tournament->id}'>";
$html .= "<p class='signup'>Meld deg på:</p>";
$html .= MvcFormTagsHelper::hidden_input('tournament_id', array('value' => $tournament->id));
$html .= MvcFormTagsHelper::hidden_input('player_id1', array('value' => $current_user->ID));
$html .= "{$current_user->display_name} - ";
$html .= MvcFormTagsHelper::select_input('player_id2', array('options' => array_merge(array('-1'=>''),$availablePlayers)));
$html .= '</br><input type="submit" />';
$html .= '</p>';
$html .= '</form>';
echo $html;
?>
