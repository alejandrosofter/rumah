<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPresupuestoOrden')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPresupuestoOrden), array('view', 'id'=>$data->idPresupuestoOrden)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPresupuesto')); ?>:</b>
	<?php echo CHtml::encode($data->idPresupuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenTrabajo')); ?>:</b>
	<?php echo CHtml::encode($data->idOrdenTrabajo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />


</div>