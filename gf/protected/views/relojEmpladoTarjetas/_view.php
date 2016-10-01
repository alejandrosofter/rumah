<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEmpleadoTarjeta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idEmpleadoTarjeta), array('view', 'id'=>$data->idEmpleadoTarjeta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEmpleado')); ?>:</b>
	<?php echo CHtml::encode($data->idEmpleado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTarjeta')); ?>:</b>
	<?php echo CHtml::encode($data->idTarjeta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaTarjeta')); ?>:</b>
	<?php echo CHtml::encode($data->fechaTarjeta); ?>
	<br />


</div>