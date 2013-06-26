<h2>Rankingklasser</h2>
<br>
<p class="forklaring">Se de forskjellige rankinglistene for hvert rankingklasse. Rankingpoeng deles ut pr rankingklasse.
Det vil si at rankingpoeng delt ut i Mix, ikke teller i f.eks Open Herrer, mens Open Herrer og Challenger Herrer
er en del av samme rankingklasse, så rankingpoeng delt ut i den ene turneringen vil ha innvirking på din seeding i begge klasser</p>
<?php foreach ($objects as $object): ?>

	<?php $this->render_view('_item', array('locals' => array('object' => $object))); ?>

<?php endforeach;
?>

<?php echo $this->pagination(); ?>