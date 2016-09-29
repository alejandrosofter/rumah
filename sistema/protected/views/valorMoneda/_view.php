<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idValorMoneda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idValorMoneda), array('view', 'id'=>$data->idValorMoneda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipoMoneda')); ?>:</b>
	<?php echo CHtml::encode($data->idTipoMoneda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valorCompra')); ?>:</b>
	<?php echo CHtml::encode($data->valorCompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valorVenta')); ?>:</b>
	<?php echo CHtml::encode($data->valorVenta); ?>
	<br />


</div>