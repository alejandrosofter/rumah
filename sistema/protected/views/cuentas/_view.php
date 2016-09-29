<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCuenta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCuenta), array('view', 'id'=>$data->idCuenta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCentroCosto')); ?>:</b>
	<?php echo CHtml::encode($data->idCentroCosto); ?>
	<br />


</div>