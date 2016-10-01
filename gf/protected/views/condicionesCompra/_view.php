<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCondicionCompra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCondicionCompra), array('view', 'id'=>$data->idCondicionCompra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('generaFacturaCredito')); ?>:</b>
	<?php echo CHtml::encode($data->generaFacturaCredito); ?>
	<br />


</div>