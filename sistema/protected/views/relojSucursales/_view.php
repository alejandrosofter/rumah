<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSucursal')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSucursal), array('view', 'id'=>$data->idSucursal)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreSucursal')); ?>:</b>
	<?php echo CHtml::encode($data->nombreSucursal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccionSucursal')); ?>:</b>
	<?php echo CHtml::encode($data->direccionSucursal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefonoSucursal')); ?>:</b>
	<?php echo CHtml::encode($data->telefonoSucursal); ?>
	<br />


</div>