<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaOrden')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFacturaOrden), array('view', 'id'=>$data->idFacturaOrden)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaSaliente')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaSaliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenTrabajo')); ?>:</b>
	<?php echo CHtml::encode($data->idOrdenTrabajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>