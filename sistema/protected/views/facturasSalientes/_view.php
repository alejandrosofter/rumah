<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaSaliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFacturaSaliente), array('view', 'id'=>$data->idFacturaSaliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numeroFactura')); ?>:</b>
	<?php echo CHtml::encode($data->numeroFactura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoFactura')); ?>:</b>
	<?php echo CHtml::encode($data->tipoFactura); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idCentroCosto')); ?>:</b>
	<?php echo CHtml::encode($data->idCentroCosto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaEstimadaCobro')); ?>:</b>
	<?php echo CHtml::encode($data->fechaEstimadaCobro); ?>
	<br />

	*/ ?>

</div>