<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nroFactura')); ?>:</b>
	<?php echo CHtml::encode($data->nroFactura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTalonario')); ?>:</b>
	<?php echo CHtml::encode($data->idTalonario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bonificacion')); ?>:</b>
	<?php echo CHtml::encode($data->bonificacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('interes')); ?>:</b>
	<?php echo CHtml::encode($data->interes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idVendedor')); ?>:</b>
	<?php echo CHtml::encode($data->idVendedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeSaldo')); ?>:</b>
	<?php echo CHtml::encode($data->importeSaldo); ?>
	<br />

	*/ ?>

</div>