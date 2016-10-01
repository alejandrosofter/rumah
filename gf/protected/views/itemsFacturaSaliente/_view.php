<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idItemsFacturaSaliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idItemsFacturaSaliente), array('view', 'id'=>$data->idItemsFacturaSaliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idElemento')); ?>:</b>
	<?php echo CHtml::encode($data->idElemento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreItem')); ?>:</b>
	<?php echo CHtml::encode($data->nombreItem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeItem')); ?>:</b>
	<?php echo CHtml::encode($data->importeItem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentajeIva')); ?>:</b>
	<?php echo CHtml::encode($data->porcentajeIva); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('masIva')); ?>:</b>
	<?php echo CHtml::encode($data->masIva); ?>
	<br />


</div>