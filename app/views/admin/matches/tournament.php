<?php
//print_a($tournament);
//print_a($matches);

echo "<h2>" . $tournament->name() . "</h2>";


if(!empty($matches )) {
    echo "<h3> Edit Matches </h3>";
    foreach($matches as $match) {

    }
}

echo "<h3>Add more Matches</h3>";
?>

<form action="URL" method="POST">
    Type, Team 1, Team 2, Set 1, Set 2, Set 3, WO, Comments (cards, WO comment etc)
    <input id="id" type="hidden">
    <input id="decription" type="text" value="" name="data[Tournament][price]">
    <select name="teamOne">
        <?php
        echo options_with_name($players);
        ?>
    </select>
</form>


