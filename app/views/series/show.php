<h2><?php echo $object->__name; ?></h2>
<br>
<p>Denne serien viser rankingpoengen fra alle turneringene som er endel av denne serien. </p>
<?php $this->render_view('series/_rankinglist', array('locals' =>
array('rankingList' => $rankingList))); ?>

<br />
<p>
    <?php echo $this->html->link('&#8592; Se alle seriene', array('controller' => $this->name)); ?>
</p>