<div id="event-scrooler">
    <?php
    foreach ($eventsList as $e)
        echo "<div class='list-event'>" . $e["title"] . "</div>";
    ?>
</div>
<br>
<input type='checkbox' id='drop-remove' checked />
<label for='drop-remove'><?php echo Yii::t('CalModule.fullCal', 'Quitar luego de arrastrar'); ?></label>

<?php 
if(!$dialogMode)
    echo '<br>'.CHtml::link(Yii::t('CalModule.fullCal', 'Nueva Tarea'), '#',
                    array('onclick' => "createNewEvent();")).'<br>'; ?>

