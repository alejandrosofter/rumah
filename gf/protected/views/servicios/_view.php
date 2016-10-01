<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStock')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idStock), array('view', 'id'=>$data->idStock)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigoBarra')); ?>:</b>
	<?php echo CHtml::encode($data->codigoBarra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentajeIva')); ?>:</b>
	<?php echo CHtml::encode($data->porcentajeIva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('min')); ?>:</b>
	<?php echo CHtml::encode($data->min); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('max')); ?>:</b>
	<?php echo CHtml::encode($data->max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoProducto')); ?>:</b>
	<?php echo CHtml::encode($data->tipoProducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipoProducto')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoProducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuenta')); ?>:</b>
	<?php echo CHtml::encode($data->idCuenta); ?>
	<br />

	*/ ?>

</div>