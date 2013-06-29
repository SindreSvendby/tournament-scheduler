<h2><?php echo $object->__name; ?></h2>
<p class="forklaring">Denne rankingklassen består av rankingpoeng oppnådd i følgende serier:
    <?php
        echo "<ul>";
        foreach($series as $serie) {
            echo "<li>" . display_Series_link($serie) . "</li>";
        }
        echo "</ul>";
    ?>
</p>

<br>
<h3>Resultatliste</h3>
<?php

if (empty($seedingList)) {
    echo "<p>Ingen rankingpoeng delt ut</p>";
} else {
    echo "<table>";
    echo "<thead><tr><td>Spiller</td><td>Poeng</td></tr></thead><tbody>";
    $place = 1;
    foreach ($seedingList as $seeding):
        echo "<tr><td>$place. " . display_tournament_user($seeding->player) ."</td><td>". display_rankingleague_player_result_link($seeding, $seeding->player->ID) . "</td></tr>";
        $place++;
    endforeach;
    echo "</tbody></table>";
}
?>
<br />
<p>
    <?php echo $this->html->link('&#8592; Se alle Rankingklasser', array('controller' => $this->name)); ?>
</p>
