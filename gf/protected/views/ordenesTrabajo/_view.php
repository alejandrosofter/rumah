<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenTrabajo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenTrabajo), array('view', 'id'=>$data->idOrdenTrabajo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionCliente')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionEncargado')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionEncargado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoOrden')); ?>:</b>
	<?php echo CHtml::encode($data->estadoOrden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaIngreso')); ?>:</b>
	<?php echo CHtml::encode($data->fechaIngreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prioridad')); ?>:</b>
	<?php echo CHtml::encode($data->prioridad); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoOrden')); ?>:</b>
	<?php echo CHtml::encode($data->tipoOrden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	*/ ?>

</div>