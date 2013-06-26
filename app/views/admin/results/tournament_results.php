<?php
$url = MvcRouter::admin_url(array('controller' => 'tournaments', 'action' => 'edit', 'id' => $tournament->__id));
echo '<ul><li><a href="'.$url.'">Administrate Tournament</a></li>';
$url = MvcRouter::public_url(array('controller' => 'tournaments', 'action' => 'show', 'id' => $tournament->__id));
echo '<li><a href="'.$url.'">View Public Pages</a></li></ul>';

echo "<h2>" . $tournament->name . "</h2>";
echo "<h3>Results</h3>";
if (empty($results)) {
    echo "<p>Ingen lag er registert til denne turneringen</p>";
} else {
    echo "<form method='POST' action='" . $form_url . "'>";
    $numberOfTeamsSignedUp = count($results);
    echo "<table><thead><td>Team</td>";
    if($tournament->open_for_registration) {
        echo '<td>Remove</td>';
    } else {
        echo "<td>Place</td><td>Points</td>";
    }
    echo '<td>Registrert</td></thead>';
    foreach ($results as $result):
        echo '<tr>';
        echo '<td>' .display_team($result->team) . '</td>';
        if($tournament->open_for_registration) {
            echo '<td><span class="delete-result"> <a href=' . get_admin_url() . 'admin.php/?page=mvc_results-delete&id=' . $result->id . '&tournament=' . $tournament->id . '>Remove</a></span></td>';
        } else {
            echo '<input name="id[]" type="hidden" value="' . $result->id . '">';
            echo '<td><select name="place[]">';
            for ($i = 1; $i <= $numberOfTeamsSignedUp; $i++):
                if($i == $result->place):
                    echo '<option selected="selected">' . $i . '</option>';
                else:
                    echo '<option>' . $i . '</option>';
                endif;
            endfor;
            echo '</select></td>';
            echo '<td><input name="points[]" value="' . $result->points . '"></td>';

        }
        echo '<td>';
            echo 'Meldt på av ';
            $signedUpUser = get_user_by('id', $result->signedUpBy);
            echo '<span class="signedUpBy">'.$signedUpUser->display_name.'</span> ';
            echo 'den <span class="signedUpDate">'.$result->signedUpDate.'</span>';
        echo '</td>';
        echo '</tr>';
    endforeach;
    echo "</table>";
    echo "<br/> <input type='submit'>";
    echo "</form>";
}

if($tournament->open_for_registration == 1):
    $this->render_view('admin/results/_signup_teams', array('locals' =>
    array('tournament' => $tournament,
        'availablePlayers' => $availablePlayers)));
    $url = MvcRouter::admin_url(array('controller' => 'tournaments', 'action' => 'close_registration', 'id' => $tournament->__id));
    echo '<a href="'.$url.'">Close Registration</a>';
else:
    $url = MvcRouter::admin_url(array('controller' => 'tournaments', 'action' => 'open_registration', 'id' => $tournament->__id));
    echo 'Registration is closed, <a href="'.$url.'">Open Registration</a>';
endif;








