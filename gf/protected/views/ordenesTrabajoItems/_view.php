<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenTrabajoItem')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenTrabajoItem), array('view', 'id'=>$data->idOrdenTrabajoItem)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item')); ?>:</b>
	<?php echo CHtml::encode($data->item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentajeIva')); ?>:</b>
	<?php echo CHtml::encode($data->porcentajeIva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStock')); ?>:</b>
	<?php echo CHtml::encode($data->idStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoItem')); ?>:</b>
	<?php echo CHtml::encode($data->estadoItem); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenTrabajo')); ?>:</b>
	<?php echo CHtml::encode($data->idOrdenTrabajo); ?>
	<br />

	*/ ?>

</div>