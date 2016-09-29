<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMantenimientoEmpresaVisitaRutina')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idMantenimientoEmpresaVisitaRutina), array('view', 'id'=>$data->idMantenimientoEmpresaVisitaRutina)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMantenimientoEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->idMantenimientoEmpresa); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('horaIngreso')); ?>:</b>
	<?php echo CHtml::encode($data->horaIngreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horaSalida')); ?>:</b>
	<?php echo CHtml::encode($data->horaSalida); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentarioVisita')); ?>:</b>
	<?php echo CHtml::encode($data->comentarioVisita); ?>
	<br />

	*/ ?>

</div>