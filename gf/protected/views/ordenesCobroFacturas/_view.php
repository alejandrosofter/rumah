<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenCobroFacturas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenCobroFacturas), array('view', 'id'=>$data->idOrdenCobroFacturas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenCobro')); ?>:</b>
	<?php echo CHtml::encode($data->idOrdenCobro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaSaliente')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaSaliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaVencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaVencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeCobroFactura')); ?>:</b>
	<?php echo CHtml::encode($data->importeCobroFactura); ?>
	<br />


</div>