<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEstadoOrden')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEstadoOrden), array('view', 'id'=>$data->idEstadoOrden)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaEstado')); ?>:</b>
	<?php echo CHtml::encode($data->fechaEstado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenTrabajo')); ?>:</b>
	<?php echo CHtml::encode($data->idOrdenTrabajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalleEstado')); ?>:</b>
	<?php echo CHtml::encode($data->detalleEstado); ?>
	<br />


</div>