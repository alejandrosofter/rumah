<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPedido')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPedido), array('view', 'id'=>$data->idPedido)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaSaliente')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaSaliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaPedido')); ?>:</b>
	<?php echo CHtml::encode($data->fechaPedido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentarioPedido')); ?>:</b>
	<?php echo CHtml::encode($data->comentarioPedido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datos')); ?>:</b>
	<?php echo CHtml::encode($data->datos); ?>
	<br />


</div>