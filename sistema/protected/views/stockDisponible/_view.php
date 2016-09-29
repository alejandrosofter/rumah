<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStockDisponible')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idStockDisponible), array('view', 'id'=>$data->idStockDisponible)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStock')); ?>:</b>
	<?php echo CHtml::encode($data->idStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidadDisponible')); ?>:</b>
	<?php echo CHtml::encode($data->cantidadDisponible); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auxiliarStock')); ?>:</b>
	<?php echo CHtml::encode($data->auxiliarStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auxiliarDisponible')); ?>:</b>
	<?php echo CHtml::encode($data->auxiliarDisponible); ?>
	<br />


</div>