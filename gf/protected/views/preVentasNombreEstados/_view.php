<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPreventaEmpresaNombreEstado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idPreventaEmpresaNombreEstado), array('view', 'id'=>$data->idPreventaEmpresaNombreEstado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombreEstado')); ?>:</b>
	<?php echo CHtml::encode($data->nombreEstado); ?>
	<br />


</div>