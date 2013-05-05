<?php
/**
 * $tournament Tournament
*/
?>
<h2>Final Seeding <?php echo $tournament->name ?></h2>



<?php
if(empty($tournament->final_seeding)):
?>
    <p>Ingen lag registert</p>
<?
endif;
foreach($tournament->results as $result):
    print_a($result);
endforeach;
?>