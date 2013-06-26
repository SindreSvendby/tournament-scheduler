<h2>Matches</h2>

<?php
foreach ($objects as $tournament):
    $this->render_view('_item', array('locals' => array('object' => $tournament)));
 endforeach;
echo $this->pagination();