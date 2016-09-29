<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenPagoVencimiento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenPagoVencimiento), array('view', 'id'=>$data->idOrdenPagoVencimiento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaEntrante')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaEntrante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaEntranteVencimiento')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaEntranteVencimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />


</div>