<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idGasto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idGasto), array('view', 'id'=>$data->idGasto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idProveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importe')); ?>:</b>
	<?php echo CHtml::encode($data->importe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formaPago')); ?>:</b>
	<?php echo CHtml::encode($data->formaPago); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuentaEfectivo')); ?>:</b>
	<?php echo CHtml::encode($data->idCuentaEfectivo); ?>
	<br />


</div>