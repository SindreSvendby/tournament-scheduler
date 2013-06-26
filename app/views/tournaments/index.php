<div id="tournaments">
    <div class="post-heading">
        <h1>Turneringer</h1>
    </div>

    <div class="block full">
        <h3>Kommende turneringer <span class="arrows">»</span></h3>
        <table>
            <tr class="head">
                <td>Når</td>
                <td>Turnering</td>
            </tr>
            <?php
            $exist = false;
            foreach (array_reverse($objects) as $object):
                if ($object->date >= date("Y-m-d H:i:s")) {
                    $exist = true;
                    echo "<tr>";
                    $this->render_view('_item', array('locals' => array('tournament' => $object)));
                    echo "</tr>";
                }
            endforeach;
            if ($exist == false) {
                ?>
                <td colspan="2">Det er ingen kommende turneringer.</td>
            <?php } ?>
        </table>
    </div>
    <div class="block full">
        <h3>Spilte turneringer <span class="arrows">» </span></h3>
        <table>
            <tr class="head">
                <td>Når</td>
                <td>Turnering</td>
            </tr>
            <?php foreach ($objects as $object): ?>
                <?php if ($object->date < date("Y-m-d H:i:s")){ ?>
                    <tr>
                        <?php $this->render_view('_item', array('locals' => array('tournament' => $object))); ?>
                    </tr>
                <?php } ?>
            <?php endforeach; ?>
        </table>
    </div>


<?php echo $this->pagination(); ?>