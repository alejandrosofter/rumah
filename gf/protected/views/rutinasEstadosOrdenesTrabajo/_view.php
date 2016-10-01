<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenTrabajoRutinaEstado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenTrabajoRutinaEstado), array('view', 'id'=>$data->idOrdenTrabajoRutinaEstado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idRutina')); ?>:</b>
	<?php echo CHtml::encode($data->idRutina); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dias')); ?>:</b>
	<?php echo CHtml::encode($data->dias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nroEstado')); ?>:</b>
	<?php echo CHtml::encode($data->nroEstado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('costoTiempo')); ?>:</b>
	<?php echo CHtml::encode($data->costoTiempo); ?>
	<br />


</div>