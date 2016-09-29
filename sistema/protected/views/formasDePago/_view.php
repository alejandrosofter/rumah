<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFormaPago')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFormaPago), array('view', 'id'=>$data->idFormaPago)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreForma')); ?>:</b>
	<?php echo CHtml::encode($data->nombreForma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoForma')); ?>:</b>
	<?php echo CHtml::encode($data->tipoForma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidadCuotas')); ?>:</b>
	<?php echo CHtml::encode($data->cantidadCuotas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('intereses')); ?>:</b>
	<?php echo CHtml::encode($data->intereses); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingresoEgreso')); ?>:</b>
	<?php echo CHtml::encode($data->ingresoEgreso); ?>
	<br />


</div>