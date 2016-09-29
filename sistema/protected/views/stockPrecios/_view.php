<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStockPrecio')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idStockPrecio), array('view', 'id'=>$data->idStockPrecio)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaStock')); ?>:</b>
	<?php echo CHtml::encode($data->fechaStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enServicios')); ?>:</b>
	<?php echo CHtml::encode($data->enServicios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTipo')); ?>:</b>
	<?php echo CHtml::encode($data->idTipo); ?>
	<br />


</div>