<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuentaVenta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCuentaVenta), array('view', 'id'=>$data->idCuentaVenta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('otro')); ?>:</b>
	<?php echo CHtml::encode($data->otro); ?>
	<br />


</div>