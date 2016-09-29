<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRutina')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idRutina), array('view', 'id'=>$data->idRutina)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('semana')); ?>:</b>
	<?php echo CHtml::encode($data->semana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreDia')); ?>:</b>
	<?php echo CHtml::encode($data->nombreDia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDia')); ?>:</b>
	<?php echo CHtml::encode($data->idDia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hora')); ?>:</b>
	<?php echo CHtml::encode($data->hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('divisorSemana')); ?>:</b>
	<?php echo CHtml::encode($data->divisorSemana); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horaIngreso')); ?>:</b>
	<?php echo CHtml::encode($data->horaIngreso); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('horaSalida')); ?>:</b>
	<?php echo CHtml::encode($data->horaSalida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentarioRutina')); ?>:</b>
	<?php echo CHtml::encode($data->comentarioRutina); ?>
	<br />

	*/ ?>

</div>