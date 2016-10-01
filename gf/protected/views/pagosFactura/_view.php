<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPagoFactura')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPagoFactura), array('view', 'id'=>$data->idPagoFactura)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaSaliente')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaSaliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPago')); ?>:</b>
	<?php echo CHtml::encode($data->idPago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estadoPagoFactura')); ?>:</b>
	<?php echo CHtml::encode($data->estadoPagoFactura); ?>
	<br />


</div>