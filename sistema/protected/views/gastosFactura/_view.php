<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idGastoFactura')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idGastoFactura), array('view', 'id'=>$data->idGastoFactura)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idGasto')); ?>:</b>
	<?php echo CHtml::encode($data->idGasto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFacturaSaliente')); ?>:</b>
	<?php echo CHtml::encode($data->idFacturaSaliente); ?>
	<br />


</div>