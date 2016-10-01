<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenTrabajoRutina')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenTrabajoRutina), array('view', 'id'=>$data->idOrdenTrabajoRutina)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreRutina')); ?>:</b>
	<?php echo CHtml::encode($data->nombreRutina); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esFacturable')); ?>:</b>
	<?php echo CHtml::encode($data->esFacturable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('esContratada')); ?>:</b>
	<?php echo CHtml::encode($data->esContratada); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duracionDias')); ?>:</b>
	<?php echo CHtml::encode($data->duracionDias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prioridad')); ?>:</b>
	<?php echo CHtml::encode($data->prioridad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionCliente')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionCliente); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionEncargado')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionEncargado); ?>
	<br />

	*/ ?>

</div>