<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idStockTipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idStockTipo), array('view', 'id'=>$data->idStockTipo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>