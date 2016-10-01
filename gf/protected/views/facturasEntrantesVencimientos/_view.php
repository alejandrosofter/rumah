<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaVencimiento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFacturaVencimiento), array('view', 'id'=>$data->idFacturaVencimiento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaEntrante')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaEntrante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaVencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fechaVencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />


</div>