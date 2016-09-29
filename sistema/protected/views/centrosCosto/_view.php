<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCentroCosto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCentroCosto), array('view', 'id'=>$data->idCentroCosto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>