<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStockPrecioStock')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idStockPrecioStock), array('view', 'id'=>$data->idStockPrecioStock)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStockPrecio')); ?>:</b>
	<?php echo CHtml::encode($data->idStockPrecio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStock')); ?>:</b>
	<?php echo CHtml::encode($data->idStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importePesosStock')); ?>:</b>
	<?php echo CHtml::encode($data->importePesosStock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importeDolarStock')); ?>:</b>
	<?php echo CHtml::encode($data->importeDolarStock); ?>
	<br />


</div>