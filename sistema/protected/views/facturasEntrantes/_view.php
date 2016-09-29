<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaEntrante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFacturaEntrante), array('view', 'id'=>$data->idFacturaEntrante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idProveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaVencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fechaVencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numeroFactura')); ?>:</b>
	<?php echo CHtml::encode($data->numeroFactura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
	<?php echo CHtml::encode($data->precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoFactura')); ?>:</b>
	<?php echo CHtml::encode($data->tipoFactura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCentroCosto')); ?>:</b>
	<?php echo CHtml::encode($data->idCentroCosto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iva21')); ?>:</b>
	<?php echo CHtml::encode($data->iva21); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iva105')); ?>:</b>
	<?php echo CHtml::encode($data->iva105); ?>
	<br />

	*/ ?>

</div>