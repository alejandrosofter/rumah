<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idItemPedido')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idItemPedido), array('view', 'id'=>$data->idItemPedido)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreItem')); ?>:</b>
	<?php echo CHtml::encode($data->nombreItem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precioCompra')); ?>:</b>
	<?php echo CHtml::encode($data->precioCompra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precioVenta')); ?>:</b>
	<?php echo CHtml::encode($data->precioVenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porecentajeIva')); ?>:</b>
	<?php echo CHtml::encode($data->porecentajeIva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStock')); ?>:</b>
	<?php echo CHtml::encode($data->idStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPedido')); ?>:</b>
	<?php echo CHtml::encode($data->idPedido); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	*/ ?>

</div>