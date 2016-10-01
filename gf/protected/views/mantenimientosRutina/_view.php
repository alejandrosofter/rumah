<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMantenimientoRutina')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idMantenimientoRutina), array('view', 'id'=>$data->idMantenimientoRutina)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idMantenimientoEmpresa')); ?>:</b>
	<?php echo CHtml::encode($data->idMantenimientoEmpresa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRutina')); ?>:</b>
	<?php echo CHtml::encode($data->idRutina); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />


</div>