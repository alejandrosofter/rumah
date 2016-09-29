<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenCobro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenCobro), array('view', 'id'=>$data->idOrdenCobro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaOrdenCobro')); ?>:</b>
	<?php echo CHtml::encode($data->fechaOrdenCobro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeAcuenta')); ?>:</b>
	<?php echo CHtml::encode($data->importeAcuenta); ?>
	<br />


</div>