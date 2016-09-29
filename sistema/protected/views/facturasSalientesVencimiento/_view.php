<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaVencimiento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFacturaVencimiento), array('view', 'id'=>$data->idFacturaVencimiento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaSaliente')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaSaliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaVencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fechaVencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeFacturaSaliente')); ?>:</b>
	<?php echo CHtml::encode($data->importeFacturaSaliente); ?>
	<br />


</div>