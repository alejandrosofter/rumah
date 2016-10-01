<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPago')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPago), array('view', 'id'=>$data->idPago)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeDinero')); ?>:</b>
	<?php echo CHtml::encode($data->importeDinero); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formaPago')); ?>:</b>
	<?php echo CHtml::encode($data->formaPago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuentaEfectivo')); ?>:</b>
	<?php echo CHtml::encode($data->idCuentaEfectivo); ?>
	<br />


</div>