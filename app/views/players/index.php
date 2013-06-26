<h2>Players</h2>
<?php
if (empty($users)):
    echo "<p>Ingen spillere registert</p>";
else:
    echo "<ul>";
    foreach ($users as $user):
        echo "<li>". display_tournament_user($user) . "</li>";
    endforeach;
    echo "</ul>";
endif;
echo $this->pagination();
?>
