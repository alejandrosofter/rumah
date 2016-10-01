<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idOrdenPago')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idOrdenPago), array('view', 'id'=>$data->idOrdenPago)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaOrden')); ?>:</b>
	<?php echo CHtml::encode($data->fechaOrden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProveedor')); ?>:</b>
	<?php echo CHtml::encode($data->idProveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo CHtml::encode($data->estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagoAcuenta')); ?>:</b>
	<?php echo CHtml::encode($data->pagoAcuenta); ?>
	<br />


</div>