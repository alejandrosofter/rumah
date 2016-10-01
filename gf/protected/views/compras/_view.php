<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCompra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCompra), array('view', 'id'=>$data->idCompra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaCompra')); ?>:</b>
	<?php echo CHtml::encode($data->fechaCompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaEntrante')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaEntrante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionCompra')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionCompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeDolar')); ?>:</b>
	<?php echo CHtml::encode($data->importeDolar); ?>
	<br />


</div>