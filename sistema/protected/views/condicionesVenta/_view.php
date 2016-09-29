<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCondicionVenta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCondicionVenta), array('view', 'id'=>$data->idCondicionVenta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcionVenta')); ?>:</b>
	<?php echo CHtml::encode($data->descripcionVenta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('generaFacturaCredito')); ?>:</b>
	<?php echo CHtml::encode($data->generaFacturaCredito); ?>
	<br />


</div>