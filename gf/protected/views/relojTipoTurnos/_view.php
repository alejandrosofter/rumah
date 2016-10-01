<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipoTurno')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTipoTurno), array('view', 'id'=>$data->idTipoTurno)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreTurno')); ?>:</b>
	<?php echo CHtml::encode($data->nombreTurno); ?>
	<br />


</div>