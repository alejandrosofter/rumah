<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEstadoCheque')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEstadoCheque), array('view', 'id'=>$data->idEstadoCheque)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCheque')); ?>:</b>
	<?php echo CHtml::encode($data->idCheque); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreEstado')); ?>:</b>
	<?php echo CHtml::encode($data->nombreEstado); ?>
	<br />


</div>